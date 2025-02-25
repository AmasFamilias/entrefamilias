<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\TipoAnuncio;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarVacante extends Component 
{
    use WithFileUploads;

    public Vacante $vacante;
    public $vacante_id;
    public $titulo;
    public $entidad;
    public $selectedOrganizacion;
    public $descripcion;
    public $descrip_larga;
    public $presencial;
    public $lugar;
    public $virtual;
    public $enlace;
    public $evento;
    public $fecha_evento;
    public $categoria_id;
    public $tipoanuncio_id;
    public $ultimo_dia;
    public $nuevaEtiqueta = '';
    public $etiquetas = [];
    public $imagen;
    public $imagen_nueva;
    public $orgexistentes;

    protected $rules = [
        'titulo' => 'required|string',
        'selectedOrganizacion' => 'nullable|integer|exists:organizacion,id',
        'descripcion' => 'required',
        'descrip_larga' => 'required',
        'presencial' => 'required|in:0,1',
        'lugar' => 'nullable|string|max:255',
        'virtual' => 'required|in:0,1,2',
        'enlace' => 'nullable|string|max:255|url|required_if:virtual,1,2',
        'evento' => 'required|in:0,1',
        'fecha_evento' => 'nullable|date',
        'categoria_id' => 'required',
        'tipoanuncio_id' => 'required',
        'ultimo_dia' => 'required|date',
        'etiquetas' => 'array|max:8',
        'etiquetas.*' => 'string|max:20',
        'imagen_nueva' => 'nullable|image|max:3072|mimes:jpeg,png,jpg',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante; 
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->entidad = $vacante->entidad;
        $this->selectedOrganizacion = $vacante->organizacion_id;
        $this->descripcion = $vacante->descripcion;
        $this->descrip_larga = $vacante->descrip_larga;
        $this->presencial = (string) $vacante->presencial;
        $this->lugar = $vacante->presencial === 1 ? ($vacante->lugar ?? '') : ''; 
        $this->virtual = (string) $vacante->virtual; 
        $this->enlace = ($vacante->virtual == 1 || $vacante->virtual == 2) ? ($vacante->enlace ?? '') : '';
        $this->evento = $vacante->evento;
        $this->fecha_evento = $vacante->fecha_evento ? Carbon::parse($vacante->fecha_evento)->format('Y-m-d') : null;
        $this->categoria_id = $vacante->categoria_id;
        $this->tipoanuncio_id = $vacante->tipoanuncio_id;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->etiquetas = is_array($vacante->etiquetas) ? $vacante->etiquetas : json_decode($vacante->etiquetas, true) ?? [];
        $this->imagen = $vacante->imagen;
        $this->entidad = auth()->user()->name;
        $this->orgexistentes = auth()->user()->organizaciones()->get();
        $this->selectedOrganizacion = $this->vacante->organizacion_id ?: '';
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        $vacante = Vacante::findOrFail($this->vacante_id);
        $vacante->update([
            'titulo' => $datos['titulo'],
            'entidad' => $this->entidad,
            'organizacion_id' => !empty($datos['selectedOrganizacion']) ? $datos['selectedOrganizacion'] : null,
            'descripcion' => $datos['descripcion'],
            'descrip_larga' => $datos['descrip_larga'],
            'presencial' => $datos['presencial'],
            'lugar' => $datos['lugar'] ?? null,
            'virtual' => $datos['virtual'],
            'enlace' => $datos['enlace'] ?? null,
            'evento' => $datos['evento'],
            'fecha_evento' => $datos['fecha_evento'] ?? null,
            'categoria_id' => $datos['categoria_id'],
            'tipoanuncio_id' => $datos['tipoanuncio_id'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'etiquetas' => json_encode($this->etiquetas),
            'imagen' => $datos['imagen'] ?? $vacante->imagen,
        ]);

        session()->flash('mensaje', 'El Anuncio se actualizó Correctamente');
        return redirect()->route('vacantes.index');
    }

    public function updatedPresencial()
    {
        if ($this->presencial == '1' && empty($this->lugar)) {
            $this->lugar = $this->vacante->lugar ?? '';
        }
    }

    public function updatedEvento()
    {
        if ($this->evento == '1') {
            $this->fecha_evento = $this->vacante->fecha_evento ? Carbon::parse($this->vacante->fecha_evento)->format('Y-m-d') : '';
        }
    }

    public function updatedVirtual($value)
    {
        if ($value == '0') {
            $this->enlace = ''; 
        }
    }

    // Eventos para el Contenedor de Imagenes
    public function eliminarImagen()
    {
        $this->imagen_nueva = null;
    }

    // Evento si la Imagen es actualizada
    public function updatedImagen()
    {
        // Forzar la persistencia de etiquetas al subir una imagen
        $this->etiquetas = array_filter($this->etiquetas);
        $this->validateOnly('imagen'); 
    }

    //EVentos para el Contenedor de Etiquetas
    public function agregarEtiqueta()
    {
        $this->nuevaEtiqueta = trim($this->nuevaEtiqueta);

        if (!empty($this->nuevaEtiqueta) && count($this->etiquetas) < 8) {
            $this->etiquetas[] = $this->nuevaEtiqueta;
            $this->dispatch('input-reset'); 
        }

        $this->reset('nuevaEtiqueta'); 
    }

    public function updatedNuevaEtiqueta()
    {
        if ($this->nuevaEtiqueta === '') {
            $this->reset('nuevaEtiqueta'); // Garantiza que se limpie bien
        }
    }

    public function eliminarEtiqueta($index)
    {
        unset($this->etiquetas[$index]);
        $this->etiquetas = array_values($this->etiquetas); // Reindexar array
    }
    //Fin de Eventos para el Contenedor de Etiquetas

    public function render()
    {
        return view('livewire.editar-vacante', [
            'categorias' => Categoria::all(),
            'tiposanuncios' => TipoAnuncio::all(),
        ]);
    }
}
