<?php

namespace App\Http\Controllers;

use App\Models\Tenant;

class HomeController extends Controller
{
    public function index()
    {
        $tenants = Tenant::orderBy('name', 'asc')->get();
        return view('home', compact('tenants'));
    }
}