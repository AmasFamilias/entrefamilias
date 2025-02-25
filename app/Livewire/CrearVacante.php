<?php
namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use App\Models\Categoria;
use App\Models\TipoAnuncio;
use App\Models\User;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    use WithFileUploads;

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
    
    public $orgexistentes = [];

    // Agregar mensajes personalizados
    protected $messages = [
        'imagen.image' => 'El archivo debe ser una imagen válida',
        'imagen.mimes' => 'Solo se permiten formatos: JPEG, JPG o PNG',
        'imagen.max' => 'La imagen no debe superar los 3MB',
    ];


    protected $rules = [
        'titulo' => 'required|string',
        'selectedOrganizacion' => 'nullable|integer|exists:organizacion,id',
        'descripcion' => 'required',
        'descrip_larga' => 'required', 
        'presencial' => 'required|in:0,1',
        'virtual' => 'required|in:0,1,2',
        'evento' => 'required|in:0,1',
        'fecha_evento' => 'nullable|date',
        'categoria_id' => 'required',
        'tipoanuncio_id' => 'required',
        'ultimo_dia' => 'required|date',
        'etiquetas' => 'array|max:8',
        'etiquetas.*' => 'string|max:20',
        'nuevaEtiqueta' => 'nullable|string|max:20',
        'imagen' => 'nullable|image|max:3072|mimes:jpeg,png,jpg',
        'enlace' => 'nullable|string|max:255|url', 
        'lugar' => 'nullable|string|max:255', 
    ];

    public function mount()
    {
        $this->entidad = auth()->user()->name;
        $this->orgexistentes = auth()->user()->organizaciones()->get();
        $this->selectedOrganizacion = $this->orgexistentes->first()->id ?? null;
    }

    public function crearVacante()
    {
        $datos = $this->validate();

        // Convertir organizacion_id a null si está vacío
        $organizacionId = !empty($datos['selectedOrganizacion']) 
        ? (int)$datos['selectedOrganizacion'] 
        : null;


        // Almacenar la imagen
        if ($this->imagen) {
            $imagen = $this->imagen->store('public/vacantes');
            $datos['imagen'] = $nombre_imagen = str_replace('public/vacantes/','',$imagen);
        } else {
            $datos['imagen'] = null;
        }

        // Guardar la vacante en la base de datos
        Vacante::create([
            'titulo' => $datos['titulo'],
            'entidad' => $this->entidad,
            'organizacion_id' => $organizacionId,
            'descripcion' => $datos['descripcion'],
            'descrip_larga' => $datos['descrip_larga'],
            'presencial' => $datos['presencial'],
            'virtual' => $datos['virtual'],
            'evento' => $datos['evento'],
            'fecha_evento' => $datos['fecha_evento'] ?? null,
            'categoria_id' => $datos['categoria_id'],
            'tipoanuncio_id' => $datos['tipoanuncio_id'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'etiquetas' => !empty($this->etiquetas) ? json_encode($this->etiquetas) : json_encode([]), 
            'imagen' => $datos['imagen'],
            'enlace' => $datos['enlace'] ?? null,
            'lugar' => $datos['lugar'] ?? null, 
            'user_id' => auth()->id(),
        ]);
        
       //Crear un mensaje
       session()->flash('success', 'Tu anuncio se publicó Correctamente');

       //Redireccionar al Usuario
       return redirect()->route('vacantes.index');
    }

    // Eventos para el Contenedor de Imagenes
    public function eliminarImagen()
    {
        $this->imagen = null; // Borra la imagen seleccionada
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

    public function render()
    {
        return view('livewire.crear-vacante', [
            'categorias' => Categoria::all(),
            'tiposanuncios' => TipoAnuncio::all(),
        ]);
    }
}
