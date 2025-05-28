<?php

if (!function_exists('convertCurrency')) {
    function convertCurrency($amount, $from, $to)
    {
        $converter = app('currency');
        return $converter->convert($amount, $from, $to);
    }
}
