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
        // Sanitizar y validar término de búsqueda
        if ($termino) {
            $termino = strip_tags($termino);
            $termino = trim($termino);
            $termino = substr($termino, 0, 100); // Limitar longitud máxima
        }
        
        // Validar categoría es numérica si se proporciona
        if ($categoria && !is_numeric($categoria)) {
            $categoria = null;
        }
        
        $this->termino = $termino ?: null;
        $this->categoria = $categoria ? (int)$categoria : null;
    }

    public function render()
    {
        $categorias = Categoria::whereHas('vacantes', function ($query) {
            $query->whereDate('ultimo_dia', '>', now());
        })->get();

        // Sanitizar término antes de usar en consulta
        $terminoSanitizado = null;
        if ($this->termino) {
            $terminoSanitizado = strip_tags($this->termino);
            $terminoSanitizado = trim($terminoSanitizado);
            $terminoSanitizado = substr($terminoSanitizado, 0, 100); // Limitar longitud
        }

        if (!$terminoSanitizado && !$this->categoria) {
            // Home sin filtros: 4 vacantes por categoría
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
                ->when($terminoSanitizado, function ($query) use ($terminoSanitizado) {
                    $query->where('titulo', 'LIKE', "%" . $terminoSanitizado . "%")
                        ->orWhere('entidad', 'LIKE', "%" . $terminoSanitizado . "%");
                })
                ->when($this->categoria, function ($query) {
                    $query->where('categoria_id', (int)$this->categoria);
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
