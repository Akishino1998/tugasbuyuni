<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ModelView_Servis;
use App\User;
use App\OrderServis;
use App\OrderServisAddress;
use App\Kurir;
use DateTime;
class AdminController extends Controller
{
    public function index(){
        $data = ModelView_Servis::all()->where('status','Pending');
        $data_kurir = Kurir::all();
        // dd($data_kurir);
        $pending = OrderServis::all()->where('status','Pending')->COUNT('id_order_servis');
        $accept = OrderServis::all()->where('status','Accept')->COUNT('id_order_servis');
        $jemput = OrderServis::all()->where('status','Penjemputan')->COUNT('id_order_servis');
        // dd($pending);
        return view('admin.index', compact('data', 'data_kurir','pending','accept','jemput'));
    }
    public function show($id_order, $id_user){
        $id_user = $id_user;
        $id_order = $id_order;
        $data = OrderServis::all()->where('id_order_servis',$id_order)->first();
        // return $data->jemput;
        if($data->jemput == 'Ya'){
            $data_address = OrderServisAddress::all()->where('id_transaksi',$id_order)->first();
            return $data_address->latitude."|".$data_address->longtitude."|".$data_address->no_hp_penerima."|".$id_order;

        }else{
            if($data->kelengkapan == ""){
                //kelengkapan kosong
            }else{

            }
        }
        return $id_order;
    }
    public function addkurir(Request $request){
        // dd($request);
        $id_order = $request->id_tx;
        $now = new DateTime();
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        DB::table('tb_order_servis_address')
            ->where('id_transaksi', $id_order)
            ->update([
                'id_kurir' => $request->kurir
        ]);
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'status' => 'Penjemputan',
                'id_admin' => $id_admin,
                'tanggal_penjemputan' => $now,
        ]);
        return $request;
    }
    public function addkelengkapan(Request $request){
        $text = $request->kelengkapan;
        $id_order = $request->id_tx2;
        // $id_admin = Session::get('id_admin');
        $id_admin = '1';
        $now = new DateTime();
        DB::table('tb_order_servis')
            ->where('id_order_servis', $id_order)
            ->update([
                'kelengkapan' => $text,
                'id_admin' => $id_admin,
                'status' => 'Accept',
                'tanggal_masuk' => $now,
        ]);
        return $request;
    }
    public function addteknisi(){
        
    }
    public function reload_notif(){
        $pending = OrderServis::all()->where('status','Pending')->COUNT('id_order_servis');
        $accept = OrderServis::all()->where('status','Accept')->COUNT('id_order_servis');
        $jemput = OrderServis::all()->where('status','Penjemputan')->COUNT('id_order_servis');
        // dd($pending);
        return $pending."|".$accept."|".$jemput;
    }
    public function servis_pending(){
        $data = ModelView_Servis::all()->where('status','Pending');
        $data_kurir = Kurir::all();
        return view('admin.pending', compact('data', 'data_kurir'));
    }
    public function servis_penjemputan(){
        $data = ModelView_Servis::all()->where('status','Penjemputan');
        $data_kurir = Kurir::all();
        return view('admin.penjemputan', compact('data', 'data_kurir'));
    }
    public function servis_masuk(){
        $data = ModelView_Servis::all()->where('status','Accept');
        $data_kurir = Kurir::all();
        return view('admin.servis_masuk', compact('data', 'data_kurir'));
    }
    public function servis_proses(){
        $data = ModelView_Servis::all()->where('status','Proses');
        $data_kurir = Kurir::all();
        return view('admin.servis_proses', compact('data', 'data_kurir'));
    }
}
