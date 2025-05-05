<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Line;
use App\Models\Monitor;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function dashAdmin()
    {
        return view('admin.dashboard');
    }

    public function dashClient()
    {
        $lines = Line::with([
            'models.workInstructions',
            'models.monitors' // ← relación inversa, monitores por modelo
        ])->get();
        return view('client.dashboard', compact('lines'));
    }

    
}
