<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class CookieBanner extends Component
{
    public $show = false;
    public $preferences = [
        'essential' => true,
        'analytics' => false,
        'marketing' => false,
        'functional' => false
    ];
    public $showPreferences = false;

    public function mount()
    {
        $this->show = !request()->cookie('cookie_consent');

        if ($consent = request()->cookie('cookie_preferences')) {
            $this->preferences = json_decode($consent, true);
        }
    }

    public function togglePreferences()
    {
        $this->showPreferences = !$this->showPreferences;
    }

    public function acceptAll()
    {
        $this->preferences = [
            'essential' => true,
            'analytics' => true,
            'marketing' => true,
            'functional' => true
        ];
        $this->savePreferences();
    }

    public function rejectAll()
    {
        $this->preferences = [
            'essential' => true,
            'analytics' => false,
            'marketing' => false,
            'functional' => false
        ];
        $this->savePreferences();
    }

    public function acceptSelected()
    {
        $this->savePreferences();
    }

    public function savePreferences()
    {
        Cookie::queue('cookie_preferences', json_encode($this->preferences), 60 * 24 * 365);
        Cookie::queue('cookie_consent', 'given', 60 * 24 * 365);

        $this->show = false;
        $this->showPreferences = false;

        $this->dispatch('cookiePreferencesUpdated', preferences: $this->preferences);
    }

    public function render()
    {
        return view('livewire.cookie-banner');
    }
}
