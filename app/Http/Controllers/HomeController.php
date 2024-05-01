<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        return view ('index');
    }

    public function dashboard(){
        $user = Auth::guard('admins')->user();
        return view ('view.dashboard');
    }

    public function superadmin(){
        $user = Auth::guard('admins')->user();
        return view  ('master.superadmin');
    }

    public function codevip(){
        return view ('view.vipcode');
    }

    public function tabler(){
        return view ('view.tables');
    }

<<<<<<< HEAD
=======
    public function struktur(){
        return view ('view.strukturorganisasi');
    }

>>>>>>> 438ad34 (update)
}
