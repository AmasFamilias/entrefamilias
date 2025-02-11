<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class MostrarVacantes extends Component
{
    public function eliminarVacante(Vacante $vacante)
    {
        if (Gate::allows('delete', $vacante)){
            // Eliminar imagen si existe
            if($vacante->imagen) {
                Storage::delete('public/vacantes/' . $vacante->imagen);            
            } 

            // Eliminar candidatos y sus CVs
            if($vacante->candidatos->isNotEmpty()) {
                foreach($vacante->candidatos as $candidato) {
                    if($candidato->cv) {
                        Storage::delete('public/cv/' . $candidato->cv);
                    }
                }
            }
            
            $vacante->delete();
            
            // Opcional: Mostrar notificación de éxito
            $this->dispatch('notify', 'Oportunidad eliminada correctamente');
        }
    }

    public function render()
    { 
        $vacantes = Vacante::with('candidatos')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(5);

        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
