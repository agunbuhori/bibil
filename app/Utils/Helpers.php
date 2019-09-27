<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class Helpers
{
    
    public static function menus($role, $parent)
    {
        $parent = ($parent == 'null') ? '`parent` is null' : "`parent` = '$parent'";
        return DB::select("select `id`, `routes`, `params`, `name`, `icons`, `childs`, `parent` from `menus` where `roles` = ? AND $parent", [$role]);
    }

}
