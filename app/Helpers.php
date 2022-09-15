<?php
if (!function_exists('get_setting')) {
    function get_setting($key)
    {
        return \App\Models\AboutUs::value($key);
    }
}

