<?php

use Illuminate\Support\Facades\DB;

/**
 * Small query-builder utilities. Illuminate\Database\Query\Builder (what
 * DB::table() returns) has no firstOrFail() — that's an Eloquent Builder
 * method — so admin CRUD controllers use this instead.
 */

if (!function_exists('db_find_or_404')) {
    function db_find_or_404(string $table, $id, string $key = 'id')
    {
        $row = DB::table($table)->where($key, $id)->first();

        if (!$row) {
            abort(404);
        }

        return $row;
    }
}
