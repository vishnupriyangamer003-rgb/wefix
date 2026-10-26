<?php

use Illuminate\Support\Facades\DB;

/**
 * Shared self-referencing category tree builder — used by the public header
 * mega-menu (active only) and the ktgadmin category tree manager (all rows).
 */

if (!function_exists('category_tree')) {
    function category_tree(bool $onlyActive = true)
    {
        $query = DB::table('categories')->orderBy('sort_order');
        if ($onlyActive) {
            $query->where('status', 1);
        }
        $categories = $query->get();

        $grouped = $categories->groupBy(function ($category) {
            return $category->parent_id === null ? 'root' : $category->parent_id;
        });

        $buildChildren = function ($parentKey) use (&$buildChildren, $grouped) {
            return $grouped->get($parentKey, collect())->map(function ($category) use ($buildChildren) {
                $category->children = $buildChildren($category->id);
                return $category;
            })->values();
        };

        return $buildChildren('root');
    }
}

if (!function_exists('category_and_descendant_ids')) {
    /**
     * BFS over the self-referencing categories table to collect a category's
     * id plus every descendant id, at any depth.
     */
    function category_and_descendant_ids(int $categoryId): array
    {
        $ids = [$categoryId];
        $frontier = [$categoryId];

        while (!empty($frontier)) {
            $children = DB::table('categories')->whereIn('parent_id', $frontier)->pluck('id')->all();
            $children = array_diff($children, $ids);
            if (empty($children)) {
                break;
            }
            $ids = array_merge($ids, $children);
            $frontier = $children;
        }

        return $ids;
    }
}

if (!function_exists('category_flattened_options')) {
    /**
     * Flattens the full category tree into a depth-indented option list for
     * <select> dropdowns, e.g. "Dwarf", "— Orange", "— Yellow".
     *
     * @param int[] $excludeIds ids to omit (and their descendants) — used when
     *   editing a category so it can't become its own parent.
     */
    function category_flattened_options(array $excludeIds = []): array
    {
        $options = [];

        $walk = function ($categories, $depth) use (&$walk, &$options, $excludeIds) {
            foreach ($categories as $category) {
                if (in_array($category->id, $excludeIds, true)) {
                    continue;
                }
                $options[] = (object) [
                    'id' => $category->id,
                    'label' => str_repeat('— ', $depth) . $category->name_en,
                ];
                $walk($category->children, $depth + 1);
            }
        };

        $walk(category_tree(false), 0);

        return $options;
    }
}
