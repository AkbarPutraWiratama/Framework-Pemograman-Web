<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtsController extends Controller
{
    public function index()
    {
        return view('uts.index');
    }

    public function pemrogramanWeb()
    {
        return view('uts.pemrograman_web');
    }

    public function database()
    {
        return view('uts.database');
    }
}
