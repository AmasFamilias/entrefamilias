<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipioController extends Controller
{
    public function index()
    {
        return view('principios.index');
    }
}
