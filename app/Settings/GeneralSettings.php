<?php
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings{

    public string $timezone;

    public static function group(): string
    {
        return 'general';
    }
}