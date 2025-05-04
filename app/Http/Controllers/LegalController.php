<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function terminosCondiciones()
    {
        return view('legal.terminos-condiciones');
    }

    public function politicaPrivacidad()
    {
        return view('legal.politica-privacidad');
    }

    public function avisoLegal()
    {
        return view('legal.aviso-legal');
    }
} 