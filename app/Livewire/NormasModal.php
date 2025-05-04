<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class NormasModal extends Component
{
    protected $listeners = ['abrirNormas' => 'mostrarNormas', 'verNormas' => 'verNormas'];

    public $showModal = false;
    public $redirectTo = null;
    public $esInformacion = false;

    public function mount()
    {
        // Aquí puedes usar session o localStorage desde JS, veremos eso luego
    }

    public function mostrarNormas($ruta)
    {
        if (!Cookie::has('normas_aceptadas')) {
            $this->redirectTo = $ruta;
            $this->esInformacion = false;
            $this->showModal = true;
        } else {
            return redirect()->to($ruta);
        }
    }

    public function verNormas()
    {
        $this->esInformacion = true;
        $this->showModal = true;
    }

    public function aceptarNormas()
    {
        if (!$this->esInformacion) {
            Cookie::queue('normas_aceptadas', true, 525600); // 1 año
        }
        $this->showModal = false;
        if ($this->redirectTo) {
            return redirect()->to($this->redirectTo);
        }
    }

    public function render()
    {
        return view('livewire.normas-modal');
    }
}
