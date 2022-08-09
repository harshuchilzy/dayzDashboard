<?php
use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings{

    public string $timezone;
    public string $smtp_from_name;
    public string $fallback_number;

    public static function group(): string
    {
        return 'general';
    }
}