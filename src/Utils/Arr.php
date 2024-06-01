<?php

namespace App\Utils;

class Arr extends \Illuminate\Support\Arr
{
    public static function min($arr, $key, $limit = null)
    {
        $value = self::get($arr, $key);

        if (is_null($value) || !is_numeric($value) || ($limit && $limit > $value)) {
            return $limit;
        }

        return $value;
    }

    public static function max($arr, $key, $limit = null)
    {
        $value = self::get($arr, $key);

        if (is_null($value) || !is_numeric($value) || ($limit && $limit < $value)) {
            return $limit;
        }

        return $value;
    }

    public static function int($arr, $key, $default = null, $min = null, $max = null)
    {
        $value = self::get($arr, $key);

        if (is_null($value) || !is_numeric($value) || !is_int($value + 0)) {
            return $default;
        }

        if ($min && $min > $value) {
            return $min;
        }

        if ($max && $max < $value) {
            return $max;
        }

        return $value;
    }

    public static function merge($arr1, $arr2): array
    {
        return array_merge($arr1, $arr2);
    }

    public static function each(array &$arr, $closure): void
    {
        foreach ($arr as $index => $item) {
            $closure($arr[$index], $index);
        }
    }

    /**
     * @param array $values
     * @param array|null $keys
     * @return array
     */
    public static function trim(array $values, array $keys = null): array
    {
        if (empty($keys)) {
            return array_map(fn($item) => !is_numeric($item) ? trim($item) : $item, $values);
        }

        foreach ($values as $key => $item) {
            if (in_array($key, $keys) and !is_numeric($item)) {
                $values[$key] = trim($item);
            }
        }

        return $values;
    }

}
