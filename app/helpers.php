<?php

if (!function_exists('array_map_assoc')) {
    function array_map_assoc(callable $f, array $a)
    {
        return array_column(array_map($f, array_keys($a), $a), 1, 0);
    }
}

if (!function_exists('get_avatar')) {
    function get_avatar($model)
    {
        return empty($model) ? '' :
            empty($model->avatar) ? Gravatar::src($model->email) : $model->avatar;
    }
}

if (!function_exists('get_thumbnail')) {
    function get_thumbnail($model)
    {
        return empty($model) ? '' :
            empty($model->thumbnail) ? Gravatar::src($model->id) : $model->thumbnail;
    }
}