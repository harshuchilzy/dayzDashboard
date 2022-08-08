<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.timezone', 'Europe/Amsterdam');
        $this->migrator->add('general.smtp_host', '');
        $this->migrator->add('general.smtp_port', '');
        $this->migrator->add('general.smtp_username', '');
        $this->migrator->add('general.smtp_password', '');
        $this->migrator->add('general.smtp_encryption', 'ssl');
        $this->migrator->add('general.smtp_from_name', 'DayZ Solutions');
        $this->migrator->add('general.smtp_from_address', 'info@dayzsolutions.com');

        $this->migrator->add('general.enable_recording', 'false');
        $this->migrator->add('general.limit_outgoing_calls', 'false');
        $this->migrator->add('general.limit_outgoing_sms', 'false');
        $this->migrator->add('general.fallback_number', '');
    }
}
