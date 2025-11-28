<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class requestTutorsController extends Controller
{
    public function index()
    {
        return view('tutors.request'); // tutor-requests.blade.php
    }
}
