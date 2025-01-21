<?php

if (!function_exists('replaceWords')) {
    /**
     * Mengganti kata sesuai dengan word list.
     *
     * @param string $text
     * @return string
     */
    function replaceWords($text)
    {
        $wordList = [
            'asleb' => 'Assem Lebaran',
            'redcarpet' => 'Red Carpet',
        ];

        foreach ($wordList as $search => $replace) {
            $text = str_ireplace($search, $replace, $text);
        }

        return $text;
    }
}

if (!function_exists('convertToUpperCase')) {
    /**
     * Mengubah teks menjadi kapital.
     *
     * @param string $text
     * @return string
     */
    function convertToUpperCase($text)
    {
        return strtoupper($text);
    }
}
