<?php

/**
 * Cache-busted asset URLs for the doc-root css/js/images folders (see
 * CLAUDE.md — asset() resolves against the project root, not main/public).
 * Appends the file's actual mtime as a ?v= query string so browsers fetch a
 * fresh copy whenever the file changes, instead of serving a stale cached
 * version of e.g. js/cart.js indefinitely.
 */

if (!function_exists('asset_v')) {
    function asset_v(string $relativePath): string
    {
        $absolutePath = dirname(base_path()) . '/' . ltrim($relativePath, '/');
        $version = is_file($absolutePath) ? filemtime($absolutePath) : time();

        return asset($relativePath) . '?v=' . $version;
    }
}
