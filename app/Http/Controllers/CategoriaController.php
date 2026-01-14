<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function show(Categoria $categoria)
    {
        // Asegurar que la categoría se carga con todos sus campos
        $categoria->loadMissing('vacantes');
        
        // Usar los helpers para obtener las URLs seguras de cabecera e icono
        // Estos helpers validan, sanitizan y mapean automáticamente basándose en la descripción
        // si los campos en la BD están vacíos
        
        return view('categorias.show', compact('categoria'));
    }
}
