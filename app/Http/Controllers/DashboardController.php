<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }    
}
