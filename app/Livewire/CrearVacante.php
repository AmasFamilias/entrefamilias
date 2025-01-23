<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\User;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $categoria_id;
    public $entidad;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $orgexistentes = [];
    public $selectedOrganizacion;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'categoria_id' => 'required',
        'entidad' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'nullable|image|max:5120',
    ];

    public function mount()
    {
        // Asigna el nombre del usuario autenticado
        $this->entidad = auth()->user()->name;

        // Consulta las organizaciones asociadas
        $this->orgexistentes = auth()->user()->organizaciones()->get();

        // Selecciona la primera organización por defecto
        $this->selectedOrganizacion = $this->orgexistentes->first()->id ?? null;
    }


    public function crearVacante()
    {
        $datos = $this->validate();

        //Almacenar la Imagen
        if ($this->imagen){
            $imagen = $this->imagen->store('public/vacantes');
            $datos['imagen'] = $nombre_imagen = str_replace('public/vacantes/','',$imagen);
        }
        
        
        //Crear la Vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'categoria_id' => $datos['categoria_id'],
            'entidad' => $datos['entidad'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        //Crear un mensaje
        session()->flash('mensaje', 'La Oportunidad se publicó Correctamente');

        //Redireccionar al Usuario
        return redirect()->route('vacantes.index');
    }
    public function render()
    {
        //Consultar DB
        $categorias = Categoria::all();
        
        //Ver agenda
        return view('livewire.crear-vacante', [
            'categorias' => $categorias
        ]);
    }
}
