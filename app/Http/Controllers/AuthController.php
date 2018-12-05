<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UserAccount;
class AuthController extends Controller
{
    public function index(){
        // Session::flush();
        return view('login');   
    }
    public function cek_data(Request $request){
        $username = $request->username;
        $password = $request->password;
        // dd($password);
        $data = User::all()->where('username',$username);
        // dd($data[0]);
        if(count($data)){
            if($password == $data[0]->password){
                Session::put('id_user', $data[0]->id_user);
                // return redirect('home');
                return 'anda login';
            }else{
                return redirect('login')->with('alert','1')->with('username',$username);
            }
        }else{
            return redirect('login')->with('alert','2');
        }
    }
    public function index2(){
        // Session::flush();
        return view('register');   
    }
    public function daftar(Request $request){
        $id_user = User::all()->MAX('id_user')+1;
        DB::table('tb_user')->insert([
            'id_user' => $id_user,
        ]);

        DB::table('tb_user_account')->insert([
            'username' => $request->username,
            'password' => $request->password,
            'id_user' => $id_user,
        ]);     
        return redirect('login')->with('login','1');
        

    }

}
