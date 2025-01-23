<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TalentoController extends Controller
{
    public function index()
    {
        return view('talentos.index');
    }
}
