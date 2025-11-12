<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // The actual file is resources/views/landing/landing.blade.php
        // so render it with the view name 'landing.landing'.
        return view('landing.landing');
    }
}
