<?php

namespace App\Utils;

class Str extends \Illuminate\Support\Str
{
    public static function uuid() {
        $data = random_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public static function has($value, $needle): bool
    {
        return strpos($value, $needle) !== false;
    }

    public static function code($size = 6): string
    {
        $limit = str_pad('', $size, '9', STR_PAD_LEFT);
        return str_pad(rand(0, $limit), $size, '0', STR_PAD_LEFT);
    }

    public static function dotted($value)
    {
        return $value;
    }

    public static function capital($value)
    {
        return $value;
    }

    public static function clean($value)
    {
        return $value;
    }

    public static function numbers($value)
    {
        return preg_replace('/[^0-9]/', '', (string)$value);
    }

    public static function letters($value)
    {
        return $value;
    }

    public static function symbols($value)
    {
        return $value;
    }

    /**
     * @param $string
     * @return mixed
     */
    public static function safeUtf8(string $string)
    {
        if (preg_match('%^(?:
              [\x09\x0A\x0D\x20-\x7E]            # ASCII
            | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
            | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
            | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
            | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
            | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
            | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
        )*$%xs', $string)) {
            return $string;
        } else {
            return iconv('CP1252', 'UTF-8', $string);
        }
    }

    /**
     * @param String $personName
     * @return array{string,string}
     */
    public static function extractName(String $personName): array
    {
        $parts = explode(' ', $personName, 2);
        return [$parts[0], $parts[1] ?? ''];
    }
}