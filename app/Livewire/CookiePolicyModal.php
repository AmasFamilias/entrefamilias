<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class CookiePolicyModal extends Component
{
    public $showModal = false;

    public function openCookiePolicy()
    {
        $this->showModal = true;
    }

    public function hideModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.cookie-policy-modal');
    }
}
 