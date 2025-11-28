<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function index()
    {
        return view('tutors.schedule'); // tutor-schedule.blade.php
    }
}
