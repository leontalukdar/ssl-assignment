<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoreBoardController extends Controller
{
    public function index()
    {
        return view('scoreboard');
    }
}
