<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicDoctorController extends Controller
{
    function show() {
        return view('user.doctor');
    }
}