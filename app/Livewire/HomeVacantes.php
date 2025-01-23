<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public $termino;
    public $categoria;

    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
    }
    
    public function render()
    {
        // $vacantes = Vacante::all();

        $vacantes = Vacante::when($this->termino, function($query)
        {
            $query->where('titulo','LIKE',"%". $this->termino . "%");   
        })
        ->when($this->termino, function ($query) {
            $query->orWhere('entidad','LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function($query)
        {
            $query->where('categoria_id',$this->categoria);
        })
        ->whereDate('ultimo_dia','>',now())
        ->paginate(10);

        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
} 
