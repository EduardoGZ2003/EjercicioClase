<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacidadController extends Controller
{
    // Clase para añadir la vista del aviso de privacidad
    public function index()
    {
        return view('privacidad');
    }
}
