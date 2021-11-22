<?php

function menu($menu, $v = false, $parent = null)
{

    $s = "";

    if ($v) {
        $style = "display: block;";
    } else {
        $style = "display: inline;";
    }

    $parent = $parent ? '&parent=' . $parent : '';

    foreach ($menu as $key => $val) {

        $s .= "<span style='{$style}; margin: 0 30px;list-style-type: none;'>"
            . "<a style='text-decoration: none; cursor: pointer;' href='
                {$_SERVER['PHP_SELF']}?page={$key}{$parent}'>{$val['name']}</a>"
            . "</span>";
    }

    return $s;
}
