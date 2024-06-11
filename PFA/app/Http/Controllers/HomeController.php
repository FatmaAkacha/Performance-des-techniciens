<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'title' => 'Bienvenue à Notre Application',
            'description' => 'Une solution innovante pour gérer vos tâches efficacement.'
        ]);
    }
}

