<?php

namespace App\Livewire; 

use App\Models\Mensaje;
use Livewire\Component;
use App\Models\Candidato;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Insignias extends Component
{
    public $insignias = [];
    public $modo;
    public $selectedInsignia = null;
    public $propietario;

    public function mount($modo = 'perfil', $propietario_id = null)
    {
        $this->modo = $modo;

        // Determinar qué usuario usar: autenticado o propietario de la vacante
        $user = $modo === 'perfil' ? Auth::user() : User::find($propietario_id);

        if (!$user) {
            $this->insignias = [];
            return;
        }

        $vacantesPublicadas = $user->vacantes()->count(); 

        $this->insignias = [
            [
                'nombre' => 'activo',
                'descripcion' => 'Tu perfil está en movimiento, ¡Ya has sido contactado!',
                'activo' => $user->candidatos()->exists(),
            ],
            [
                'nombre' => 'anunciador',
                'descripcion' => 'Eres un gran comunicador, tus anuncios están llamando la atención.',
                'activo' => $vacantesPublicadas > 1,
            ],
            [
                'nombre' => 'conversador',
                'descripcion' => 'Tu habilidad para conversar brilla, ¡Sigues interactuando con otros!',
                'activo' => Mensaje::where('sender_id', $user->id)->count() >= 5,
            ],
            [
                'nombre' => 'pro',
                'descripcion' => 'Tu perfil refleja tu profesionalismo, ¡Estás listo para destacar!',
                'activo' => $this->perfilCompleto($user),
            ],
            [
                'nombre' => 'bronce',
                'descripcion' => '¡Primeros pasos en el éxito! Has publicado varias oportunidades.',
                'activo' => $vacantesPublicadas >= 5,
            ],
            [
                'nombre' => 'plata',
                'descripcion' => 'Tu impacto crece, ¡Has compartido muchas oportunidades valiosas!',
                'activo' => $vacantesPublicadas >= 10,
            ],
            [
                'nombre' => 'oro',
                'descripcion' => 'Eres una referencia en la Plataforma, ¡Tu trayectoria brilla con oro!',
                'activo' => $vacantesPublicadas >= 20,
            ],
        ];
    }

    private function perfilCompleto($user)
    {
        $camposCompletos = collect([
            $user->name,
            $user->email,
            $user->rol,
            $user->direccion,
            $user->movil,
            $user->profile_image,
            $user->nameuser,
            $user->sobremi,
        ])->every(fn ($campo) => !empty($campo));

        $habilidades = $user->habilidades()->exists();
        $talentos = $user->talentos()->exists();
        $principios = $user->principios()->exists();

        return $camposCompletos && $habilidades && $talentos && $principios;
    }

    public function verInsignia($insignia)
    {
        $this->selectedInsignia = $insignia;
    }

    public function cerrarModal()
    {
        $this->selectedInsignia = null;
    }

    public function render()
    {
        return view('livewire.insignias');
    }
}
