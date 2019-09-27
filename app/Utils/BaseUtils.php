<?php

namespace App\Utils;

abstract class BaseUtils
{

    protected static function tagSelectDB($data, $key, $val, $selected = null)
    {
        $result = '';
        foreach ($data as $value) {
            if ($value->$key == $selected) {
                $result .= '<option value="' . $value->$key . '" selected>' . $value->$val . '</option>';
            } else {
                $result .= '<option value="' . $value->$key . '">' . $value->$val . '</option>';
            }
        }
        return $result;
    }

    protected static function tabSpan($data, $name = false, $bg = 'blue')
    {
        $result = '';
        foreach ($data as $value) {
            $text    = ($name) ? $value->$name : $value ;
            $result .= '<span class="label bg-' . $bg . '">' . $text . '</span> ';
        }
        return $result;
    }
    
}
