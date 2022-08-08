<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateProviderSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('provider.provider_type', 'signalwire');

        // Twilio
        $this->migrator->add('provider.accountSid', '');
        $this->migrator->add('provider.accountToken', '');
        $this->migrator->add('provider.account_apiKey', '');
        $this->migrator->add('provider.account_apiSecret', '');
        $this->migrator->add('provider.serviceSID', '');

        // Signalwire
        $this->migrator->add('provider.spaceUrl', '');
        $this->migrator->add('provider.projectId', '');
        $this->migrator->add('provider.projectToken', '');
    }
}
