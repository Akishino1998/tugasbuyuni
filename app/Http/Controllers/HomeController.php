<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Elektronik;
use App\User;
use App\OrderServis;
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
        

        $data2 = OrderServis::all()->MAX('id_order_servis');
        $data_user = User::all()->where('id_user',$id_user)->first();
        // dd($data_user->alamat);
        DB::table('tb_order_servis_address')->insert([
                'id_transaksi' => $data2,
                'alamat' => $data_user->alamat,
                'no_rumah' => $data_user->no_rumah,
                'rt' => $data_user->rt,
                'rw' => $data_user->rw,
                'provinsi' => $data_user->provinsi,
                'kabupaten' => $data_user->kabupaten,
                'kecamatan' => $data_user->kecamatan,
                'kelurahan' => $data_user->kelurahan,
                'kode_pos' => $data_user->kode_pos,
                'longtitude' => $data_user->longtitude,
                'latitude' => $data_user->latitude,
        ]); 
        // return $request;
        if($jemput == 'Ya' || $antar == 'Ya'){
            // return redirect('lokasi-jemput-antar');
        } 
    }
    public function set_lokasi(){

        return view('set_lokasi');
    }
}
