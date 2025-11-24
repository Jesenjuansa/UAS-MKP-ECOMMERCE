<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function index()
    {
        return view('users.schedule'); // tutor-schedule.blade.php
    }
}
