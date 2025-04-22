<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('client.dashboard');
    }
}
