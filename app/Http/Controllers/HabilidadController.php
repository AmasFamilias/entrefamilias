<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HabilidadController extends Controller
{
    public function index()
    {
        return view('habilidades.index');
    }
}
