<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MenuTalentos extends Component
{
    public $tieneTalentos;

    protected $listeners = ['talentosActualizados' => 'actualizarEstado'];

    public function mount()
    {
        $this->actualizarEstado();
    }

    public function actualizarEstado()
    {
        $this->tieneTalentos = Auth::user()->talentos()->exists();
    }
    
    public function render()
    {
        return view('livewire.menu-talentos');
    }
} 
