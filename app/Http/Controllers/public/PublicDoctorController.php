<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Dokterr;
use App\Models\kontak;
use Illuminate\Http\Request;

class PublicDoctorController extends Controller
{
    function index() {
        $dokterList = Dokterr::all();
        $contacts = kontak::all();

        return view('user.doctor', compact('dokterList','contacts'));
    }
}
