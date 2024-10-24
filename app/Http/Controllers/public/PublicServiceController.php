<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicServiceController extends Controller
{
    public function adultService() {
        return view('user.service_adult');
    }
    public function childService() {
        return view('user.service_child');
    }
    public function show() {
        return view('user.showService');
    }
}
