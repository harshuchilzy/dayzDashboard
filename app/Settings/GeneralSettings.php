<?php
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings{

    public string $timezone;
    public string $smtp_from_name;

    public static function group(): string
    {
        return 'general';
    }
}