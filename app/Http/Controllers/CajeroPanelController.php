<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CajeroPanelController extends Controller
{
    public function index()
    {
        return view('cajero.panel'); // Asegúrate que esta vista exista
    }
}
