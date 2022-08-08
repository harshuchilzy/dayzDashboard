<?php
use Spatie\LaravelSettings\Settings;

class ProviderSettings extends Settings{

    public string $provider_type;
    public string $accountSid;
    public string $accountToken;
    public string $serviceSID;
    public string $account_apiKey;
    public string $account_apiSecret;
    public string $spaceUrl;
    public string $projectId;
    public string $projectToken;

    public static function group(): string
    {
        return 'provider';
    }
}