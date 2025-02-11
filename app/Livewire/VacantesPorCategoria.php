<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;
use App\Models\Vacante;

class VacantesPorCategoria extends Component
{
    use WithPagination;

    public Categoria $categoria;

    public function mount(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function render()
    {
        $vacantes = Vacante::where('categoria_id', $this->categoria->id)
            ->where('ultimo_dia', '>=', now())
            ->paginate(12);

        return view('livewire.vacantes-por-categoria', [
            'vacantes' => $vacantes
        ]);
    }
}
