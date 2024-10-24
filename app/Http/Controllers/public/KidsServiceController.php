<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KidsServiceController extends Controller
{
    public function index() {
        return view('user.service_kids');
    }
}
