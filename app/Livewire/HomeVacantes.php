<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Models\Categoria;
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
        $categorias = Categoria::whereHas('vacantes', function ($query) {
            $query->whereDate('ultimo_dia', '>', now());
        })->get();

        if (!$this->termino && !$this->categoria) {
            // Home sin filtros: 3 vacantes por categoría
            $vacantesPorCategoria = [];

            foreach ($categorias as $categoria) {
                $vacantesPorCategoria[$categoria->id] = Vacante::with('categoria')
                    ->where('categoria_id', $categoria->id)
                    ->whereDate('ultimo_dia', '>', now())
                    ->latest()
                    ->take(4)
                    ->get();
            }

            $paginacion = null;
        } else {
            // Filtrar con búsqueda o categoría
            $paginacion = Vacante::with('categoria')
                ->when($this->termino, function ($query) {
                    $query->where('titulo', 'LIKE', "%" . $this->termino . "%")
                        ->orWhere('entidad', 'LIKE', "%" . $this->termino . "%");
                })
                ->when($this->categoria, function ($query) {
                    $query->where('categoria_id', $this->categoria);
                })
                ->whereDate('ultimo_dia', '>', now())
                ->paginate(10);

            $vacantesPorCategoria = [];
        }

        return view('livewire.home-vacantes', [
            'categorias' => $categorias,
            'vacantesPorCategoria' => $vacantesPorCategoria,
            'paginacion' => $paginacion
        ]);
    }

}
