<?php
/*
 * @copyright Copyright (c) 2021 SaivraTechnologies (https://saivra.net/)
 *
 * This software is exclusively sold through https://saivra.net/ by the SaivraTechnologies author.
 * Downloading this product from any other sources and running it without a proper license is illegal,
 *  except the official ones linked from https://saivra.net/.
 */

function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

function input_clean($string) {
    return filter_var(trim(strip_tags($string ?? '')), FILTER_SANITIZE_SPECIAL_CHARS);
}

function query_clean($string) {
    return database()->escape_string(input_clean($string));
}

function array_query_clean($array) {
    return array_map('query_clean', $array);
}

function string_truncate($string, $maxchar) {
    $length = mb_strlen($string);
    if($length > $maxchar) {
        $cutsize = -($length-$maxchar);
        $string  = mb_substr($string, 0, $cutsize);
        $string  = $string . '..';
    }
    return $string;
}

function string_filter_alphanumeric($string) {

    $string = preg_replace('/[^a-zA-Z0-9\s]+/', '', $string);

    $string = preg_replace('/\s+/', ' ', $string);

    return $string;
}

function string_generate($length) {
    $characters = str_split('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
    $content = '';

    for($i = 1; $i <= $length; $i++) {
        $content .= $characters[array_rand($characters, 1)];
    }

    return $content;
}

function string_starts_with($needle, $haystack) {
    return substr($haystack, 0, strlen($needle)) === $needle;
}

function string_ends_with($needle, $haystack) {
    return mb_substr($haystack, -mb_strlen($needle)) === $needle;
}

function string_estimate_reading_time($string) {
    $total_words = str_word_count(strip_tags($string));

    /* 200 is the total amount of words read per minute */
    $minutes = floor($total_words / 200);
    $seconds = floor($total_words / 200 / (200 / 60));

    return (object) [
        'minutes' => $minutes,
        'seconds' => $seconds
    ];
}
