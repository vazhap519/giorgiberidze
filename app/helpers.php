<?php

if (! function_exists('safe_number')) {
    function safe_number($value)
    {
        return number_format($value);
    }
}