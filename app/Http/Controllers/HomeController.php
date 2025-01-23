<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function personas()
    {
        return view('home.seccionpersonas'); 
    }

    public function amasfamilias()
    {
        return view('home.amasfamilias'); 
    }

    public function cambiarlascosas()
    {
        return view('home.cambiarlascosas'); 
    }

    public function funcionamiento()
    {
        return view('home.funcionamiento'); 
    }

    public function __invoke(Request $request)
    {
        return view('home.index');
    }
}
