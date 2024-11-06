<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicBlogController extends Controller
{
    function index() {
        return view('user.blog');
    }
    function show() {
        return view('user.showBlog');
    }

    
}
