<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fspController extends Controller
{
    public function index(){
        return view('fsp.index');
    }
}
