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
        $data = UserAccount::all()->where('username',$username)->first();
        $data2 = UserAccount::all()->where('username',$username)->COUNT('username');
        
        if($data2 >= 1){
            if($password == $data->password){
                $data3 = User::all()->where('id_user',$data->id_user)->first();
                Session::put('id_user', $data->id_user);
                Session::put('nama', $data3->nama_depan);
                // return redirect('home');
                return redirect('home')->with('login','success');
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
        $cek = UserAccount::all()->where('username',$request->username);
        // dd($cek);
        if(count($cek)==0){
            $id_user = User::all()->MAX('id_user')+1;
            DB::table('tb_user')->insert([
                'id_user' => $id_user,
                'nama_depan' => $request->username,
            ]);

            DB::table('tb_user_account')->insert([
                'username' => $request->username,
                'password' => $request->password,
                'id_user' => $id_user,
            ]);     
            return redirect('login')->with('login','1');
        }else{
            return redirect('register')->with('register','failed');
        }
    }
    public function bio(){
        if(Session::has('id_user')){
        
            $id_user = Session::get('id_user');
            $data = User::all()->where('id_user',$id_user)->first();
            // dd($data->id_user);
            return view('biodata',compact('data'));
        }else{
            // dd();
            return redirect('login')->with('login','failed');
        }
        
    }
    public function update_bio(Request $request){
        $id_user = Session::get('id_user');
        DB::table('tb_user')
            ->where('id_user', $id_user)
            ->update(['nama_depan' => $request->nama_depan]);
        return $id_user;
    }

}
