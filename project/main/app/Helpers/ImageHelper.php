<?php

use Illuminate\Http\UploadedFile;

/**
 * Plain-function image upload/compression helpers.
 * No Eloquent, no service classes — see CLAUDE.md for why.
 * Uploads are stored at the doc root's uploads/ folder (sibling to css/js/images),
 * NOT under main/public, because Apache never routes into main/public in this app.
 */

if (!function_exists('image_helper_allowed_mimes')) {
    function image_helper_allowed_mimes(): array
    {
        return [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/webp' => 'webp',
        ];
    }
}

if (!function_exists('image_helper_upload_root')) {
    function image_helper_upload_root(): string
    {
        // main/app/Helpers -> main/app -> main -> project root (doc root)
        return realpath(__DIR__ . '/../../../') . DIRECTORY_SEPARATOR . 'uploads';
    }
}

if (!function_exists('image_helper_upload_dir')) {
    function image_helper_upload_dir(string $subfolder): string
    {
        $dir = image_helper_upload_root() . DIRECTORY_SEPARATOR . trim($subfolder, '/\\');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        return $dir;
    }
}

if (!function_exists('image_helper_random_filename')) {
    function image_helper_random_filename(string $extension): string
    {
        return bin2hex(random_bytes(16)) . '.' . $extension;
    }
}

if (!function_exists('image_helper_validate')) {
    /**
     * @return string|null Error message, or null if valid.
     */
    function image_helper_validate(UploadedFile $file, int $maxBytes = 5242880): ?string
    {
        if (!$file->isValid()) {
            return 'Upload failed, please try again.';
        }
        if ($file->getSize() > $maxBytes) {
            return 'File is too large (max ' . round($maxBytes / 1048576, 1) . ' MB).';
        }
        $mimes = image_helper_allowed_mimes();
        $mime = $file->getMimeType();
        if (!isset($mimes[$mime])) {
            return 'Only JPG, PNG, and WEBP images are allowed.';
        }
        if (@getimagesize($file->getRealPath()) === false) {
            return 'File is not a valid image.';
        }
        return null;
    }
}

if (!function_exists('image_helper_load_gd_image')) {
    /**
     * @return resource|\GdImage|false
     */
    function image_helper_load_gd_image(string $path, string $mime)
    {
        switch ($mime) {
            case 'image/jpeg':
                return @imagecreatefromjpeg($path);
            case 'image/png':
                return @imagecreatefrompng($path);
            case 'image/webp':
                return function_exists('imagecreatefromwebp') ? @imagecreatefromwebp($path) : false;
            default:
                return false;
        }
    }
}

if (!function_exists('image_helper_compress_and_store')) {
    /**
     * Validates, compresses/resizes, and stores an uploaded image under
     * uploads/{$subfolder}/, returning the path relative to the DOC ROOT
     * (e.g. "uploads/products/ab12cd34....jpg") — always render it with
     * plain asset($path), same as legacy theme images like
     * "images/shop/plants/coconut-1.webp". Every *_image/photo/path column
     * in the schema stores this doc-root-relative form so display code never
     * needs to special-case "was this uploaded or seeded".
     *
     * Randomized filenames are used everywhere (not just payment proofs) to
     * avoid collisions and to never trust client-supplied filenames.
     *
     * @throws \RuntimeException on validation failure
     */
    function image_helper_compress_and_store(
        UploadedFile $file,
        string $subfolder,
        int $maxWidth = 1600,
        int $maxHeight = 1600,
        int $quality = 80
    ): string {
        $error = image_helper_validate($file);
        if ($error !== null) {
            throw new \RuntimeException($error);
        }

        $mimes = image_helper_allowed_mimes();
        $mime = $file->getMimeType();
        $extension = $mimes[$mime];
        $filename = image_helper_random_filename($extension);
        $destination = image_helper_upload_dir($subfolder) . DIRECTORY_SEPARATOR . $filename;

        $source = image_helper_load_gd_image($file->getRealPath(), $mime);
        if ($source === false) {
            // Fall back to a plain copy if GD can't decode this image (e.g. webp
            // support missing on this PHP build) rather than losing the upload.
            $file->move(dirname($destination), $filename);
            return 'uploads/' . trim($subfolder, '/\\') . '/' . $filename;
        }

        [$origWidth, $origHeight] = [imagesx($source), imagesy($source)];
        $ratio = min(1, $maxWidth / $origWidth, $maxHeight / $origHeight);
        $newWidth = max(1, (int) round($origWidth * $ratio));
        $newHeight = max(1, (int) round($origHeight * $ratio));

        $resized = imagecreatetruecolor($newWidth, $newHeight);
        if ($mime === 'image/png') {
            imagealphablending($resized, false);
            imagesavealpha($resized, true);
        }
        imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);

        switch ($mime) {
            case 'image/jpeg':
                imagejpeg($resized, $destination, $quality);
                break;
            case 'image/png':
                // PNG quality is 0 (best) - 9 (worst compression); map 0-100 quality roughly.
                imagepng($resized, $destination, (int) round((100 - $quality) / 10));
                break;
            case 'image/webp':
                imagewebp($resized, $destination, $quality);
                break;
        }

        imagedestroy($source);
        imagedestroy($resized);

        return 'uploads/' . trim($subfolder, '/\\') . '/' . $filename;
    }
}

if (!function_exists('image_helper_delete')) {
    /**
     * @param string|null $docRootRelativePath e.g. "uploads/products/xyz.jpg"
     *   as returned by image_helper_compress_and_store(). Silently ignores
     *   paths outside uploads/ (e.g. seeded theme images under images/) so
     *   callers can pass any *_image/photo/path column value safely.
     */
    function image_helper_delete(?string $docRootRelativePath): void
    {
        if (!$docRootRelativePath || strpos($docRootRelativePath, 'uploads/') !== 0) {
            return;
        }
        $projectRoot = realpath(__DIR__ . '/../../../');
        $full = $projectRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $docRootRelativePath);
        if (is_file($full)) {
            @unlink($full);
        }
    }
}
