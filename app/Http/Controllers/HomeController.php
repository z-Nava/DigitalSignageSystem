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

    public function showMonitorContent(Request $request)
    {
        $token = $request->get('token');
        $monitor = Monitor::where('token', $token)->first();

        if (!$monitor || !$monitor->productModel) {
            return response()->view('client.no_content', [], 404);
        }

        $instructions = $monitor->productModel->workInstructions;

        return view('client.display', compact('monitor', 'instructions'));
    }
}
