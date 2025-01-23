<?php

namespace App\Livewire;

use App\Models\Avatar;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class AvatarGenerador extends Component
{
    use WithFileUploads;

    public $avatarUrl;
    public $avatarStyles = [];

    public function mount()
    {
        // Generar URL de varios estilos usando DiceBear
        $this->avatarStyles = [
            ['name' => 'avataaars', 'url' => 'https://avatars.dicebear.com/api/avataaars/example.svg'],
            ['name' => 'bottts', 'url' => 'https://avatars.dicebear.com/api/bottts/example.svg'],
            ['name' => 'male', 'url' => 'https://avatars.dicebear.com/api/male/example.svg'],
        ];
    }

    public $paginaActual = 1;

    public function paginaAnterior()
    {
        if ($this->paginaActual > 1) {
            $this->paginaActual--;
        }
    }

    public function paginaSiguiente()
    {
        $this->paginaActual++;
    }

    public function generarAvatar($style)
    {
        // Generar una URL con un ID aleatorio para el estilo seleccionado
        $randomId = uniqid();
        $this->avatarUrl = "https://avatars.dicebear.com/api/{$style}/{$randomId}.svg";
    }

    public function guardarAvatar()
    {
        $user = auth()->user();
        
        // Descargar la imagen SVG y convertirla a un archivo local si es necesario
        $imageContents = file_get_contents($this->avatarUrl);
        $fileName = 'avatars/' . $user->id . '.svg';
        Storage::disk('public')->put($fileName, $imageContents);

        // Guardar la URL o la ruta del avatar en la tabla de usuarios
        $user->update(['avatar' => $fileName]);
        
        session()->flash('message', '¡Avatar guardado exitosamente!');
    }

    public function render()
    {
        return view('livewire.avatar-generador');
    }

    
}
