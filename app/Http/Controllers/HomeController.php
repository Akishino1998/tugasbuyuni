<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Elektronik;
use DateTime;
class HomeController extends Controller
{
    public function index(){
        return view('index');
    }
    public function create_servis(){
        if(Session::has('id_user')){
            $data = Elektronik::all();
            return view('servis', compact('data'));
        }else{
            // dd();
            return redirect('login')->with('login','failed');
        }
    }
    public function set_servis(Request $request){
        $id_admin = '1';
        $id_user = Session::get('id_user');
        $id_elektronik = $request->id_elektronik;
        $now = new DateTime();
        // dd($request);
        $jemput = 'Tidak';
        $antar = 'Tidak';
        if($request->jemput){
            $jemput = 'Ya';
        }
        if($request->antar){
            $antar = 'Ya';
        }
        // return ;
        DB::table('tb_order_servis')->insert([
                'merk' => $request->merk,
                'seri' => $request->seri,
                'kerusakan' => $request->kerusakan,
                'penyebab' => $request->penyebab,
                // 'id_admin' => $id_admin,
                'id_user' => $id_user,
                'id_elektronik' => $id_elektronik,
                'tanggal_masuk' => $now->format('Y-m-d'),
                'jemput' => $jemput,
                'antar' => $antar,
                'catatan' => $request->catatan,

            ]);   
    }
}
