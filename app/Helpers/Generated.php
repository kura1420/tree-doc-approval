<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Generated 
{

    public static function buildTree($table, $elements, $parentId = NULL)
    {
        $allCount = DB::table($table)->count();
        $filterCount = count($elements);

        $tree = [];
        foreach ($elements as $key => $element) {
            if ($allCount > $filterCount) {
                $element->parent = NULL;
            }

            if ($element->parent == $parentId) {
                $children = self::buildTree($table, $elements, $element->id);
               
                if ($children) {
                    $element->children = $children;
                }

                $tree[] = $element;
            }
        }

        return $tree;
    }

}