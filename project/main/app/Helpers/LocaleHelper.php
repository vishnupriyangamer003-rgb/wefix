<?php

/**
 * Resolves a translatable DB field ("name", "short_description", ...) to the
 * current locale's column (name_ta/name_hi), falling back to name_en when
 * that locale's value is missing/empty. No Eloquent — works on any plain
 * stdClass row from DB::table(). See CLAUDE.md multi-language section.
 */

if (!function_exists('localized')) {
    function localized($row, string $field): ?string
    {
        if (!$row) {
            return null;
        }

        $locale = app()->getLocale();
        $localizedKey = $field . '_' . $locale;
        $fallbackKey = $field . '_en';

        if (!empty($row->{$localizedKey})) {
            return $row->{$localizedKey};
        }

        return $row->{$fallbackKey} ?? null;
    }
}
