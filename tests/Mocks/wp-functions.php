<?php
// phpcs:ignore

if (!function_exists('apply_filters')) {
    function apply_filters($filter, $value)
    {
        return $value;
    }
}
if (!function_exists('__')) {
    function __($value)
    {
        return $value;
    }
}
if (!function_exists('is_wp_error')) {
    function is_wp_error($thing)
    {
        return is_a($thing, WP_Error::class);
    }
}

if (! function_exists('absint')) {
    function absint($maybeint)
    {
        return abs(intval($maybeint));
    }
}
