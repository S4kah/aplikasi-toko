<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardKepalatokoController extends Controller
{
    public function index()
    {
        return view("dasboard-kepalatoko");
    }
}
