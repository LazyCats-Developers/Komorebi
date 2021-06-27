<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login(){
        return view('login');
    }

    public function signup(){
        return view('signup');
    }

    public function main(){
        return view('pages.index');
    }

    public function sales(){
        return view('pages.sales');
        
    }

    public function shopping(){
        return view('pages.shopping');
    }

    
    public function inventory(){
        return view('pages.inventory');
    }

    public function cashflow(){
        return view('pages.cashflow');
    }

    public function modules(){
        return view('pages.modules');
    }
}
