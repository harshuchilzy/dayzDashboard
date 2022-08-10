<?php

namespace App\Http\Controllers;

use DateTimeZone;
use GeneralSettings;
use Illuminate\Http\Request;
use ProviderSettings;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    private $generalSettings;

    public function __construct(GeneralSettings $generalSettings, ProviderSettings $providerSettings)
    {
        $this->settings = $generalSettings;
        $this->providerSettings = $providerSettings;
    }

    public function settingsPage(Request $request)
    {
        $providers = $request->input('providers');
        if($providers){
            $settings = $this->providerSettings;
            return inertia()->render('Settings/ProviderSettings', [
                'settings' => $settings
            ]);
        }

        $timezones = $this->available_timezones();
        $settings = $this->settings;
        $roles = Role::pluck('name', 'id');
        return inertia()->render('Settings/GeneralSettings', [
            'timezones' => $timezones,
            'settings' => $settings,
            'roles' => $roles
        ]);
    }

    public function updateSettings(Request $request)
    {
        $inputs = $request->all();

        if($inputs['settingType'] == 'providers'){
            foreach($inputs as $key => $input){
                if(!empty($input)){
                    $this->providerSettings->{$key} = $input;
                }
            }
            $this->providerSettings->save();
        }
        elseif($inputs['settingType'] == 'general'){
            foreach($inputs as $key => $input){
                if(!empty($input)){
                    $this->settings->{$key} = $input;
                }
            }
            $this->settings->save();
        }
        return redirect()->route('settings')->with('success', 'Settings updated successfully.');
    }

    function available_timezones() {
        $timezones = [];
    
        foreach (timezone_identifiers_list() as $timezone) {
            $datetime = new \DateTime('now', new DateTimeZone($timezone));
            $timezones[] = [
                'sort' => str_replace(':', '', $datetime->format('P')),
                'offset' => $datetime->format('P'),
                'name' => str_replace('_', ' ', implode(', ', explode('/', $timezone))),
                'timezone' => $timezone,
            ];
        }
    
        usort($timezones, function($a, $b) {
            return $a['sort'] - $b['sort'] ?: strcmp($a['name'], $b['name']);
        });
    
        return $timezones;
    }
    
    
}