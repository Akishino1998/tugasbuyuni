<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function create_servis(){
        if(!Session::has('id_user')){
            return view('servis');
        }else{
            // dd();
            return redirect('login')->with('login','failed');
        }
        
        
    }
}
