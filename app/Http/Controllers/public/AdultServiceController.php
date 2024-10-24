<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdultServiceController extends Controller
{
    public function index() {
        return view('user.service_adult');
    }
}
