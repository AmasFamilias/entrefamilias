<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;

class PostularVacante extends Component
{
    public $vacante;
    public $candidato;

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        // Verificar que el usuario está autenticado
        if (!auth()->check()) {
            abort(403, 'Debes estar autenticado para postularte a una vacante.');
        }

        // Validar que el usuario no es el propietario de la vacante
        if ($this->vacante->user_id === auth()->id()) {
            session()->flash('mensaje', 'No puedes postularte a tu propia vacante.');
            return redirect()->back();
        }

        // Validar si la fecha de cierre ya pasó a partir de la columna ultimo_dia
        if($this->vacante->ultimo_dia < now()) {
            session()->flash('mensaje', 'La fecha de postulación para este anuncio ha expirado.');
            return redirect()->back();
        }

        // Validar que el usuario no haya postulado a la vacante anteriormente
        if($this->vacante->candidatos()->where('user_id', auth()->user()->id)->count() > 0) {
            session()->flash('mensaje', 'Ya has contactado previamente en este anuncio. Por favor, revisa la sección de Conversaciones.');
            return redirect()->back();
        } 

        // Crear el Candidato a la Vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => 'POSTULADO'
        ]);

        // Crear notificación y enviar el email 
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id, $this->vacante->imagen));

        // Mostrar al Usuario un mensaje de OK
        session()->flash('mensaje', '¡Gracias por ponerte en contacto con nosotros! Pronto estaremos en comunicación contigo.');

        // Redirigir al chat
        return redirect()->route('mensajes.index', [
            'vacante' => $this->vacante->id,
            'user_id' => $this->vacante->user_id
        ]);
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
