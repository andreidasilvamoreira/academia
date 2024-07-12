<?php

namespace App\Utils;

class Env extends \Illuminate\Support\Env
{
    public static function name(): string
    {
        return env('APP_ENV', 'production');
    }

    public static function real(): bool
    {
        return self::prod() || self::stg();
    }

    public static function prod(): bool
    {
        return self::name() == 'production';
    }

    public static function stg(): bool
    {
        return self::name() == 'staging';
    }

    public static function dev(): bool
    {
        return self::name() == 'development';
    }

    public static function local(): bool
    {
        return self::name() == 'local';
    }

    public static function test(): bool
    {
        return self::name() == 'test';
    }
}
