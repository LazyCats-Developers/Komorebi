<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login(){
        return view('login');
    }

    public function main(){
        return view('pages.index');
    }
}
