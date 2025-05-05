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

    public function dashClient(Request $request)
    {
        $query = Line::with([
            'models.workInstructions',
            'models.monitors'
        ]);

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $lines = $query->orderBy('type')->orderBy('name')->get();
        $types = Line::select('type')->distinct()->pluck('type');

        return view('client.dashboard', compact('lines', 'types'));
    }      
}
