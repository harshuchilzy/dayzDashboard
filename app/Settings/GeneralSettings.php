<?php
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings{

    public string $timezone;
    public string $smtp_from_name;
    public string $fallback_number;
    public string $default_role;

    public static function group(): string
    {
        return 'general';
    }
}