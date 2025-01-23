<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganizacionController extends Controller
{
    public function index()
    {
        return view('organizaciones.index');
    }
}
