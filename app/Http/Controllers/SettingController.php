<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function settingsPage()
    {
        $timezones = $this->available_timezones();
        return inertia()->render('Settings/Settings', [
            'timezones' => $timezones
        ]);
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
