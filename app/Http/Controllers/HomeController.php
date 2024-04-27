<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view ('index');
    }

    public function dashboard(){
        return view ('view.dashboard');
    }

    public function codevip(){
        return view ('view.vipcode');
    }

    public function tabler(){
        return view ('view.tables');
    }

}
