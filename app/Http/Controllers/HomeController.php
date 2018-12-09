<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Elektronik;
use App\User;
use App\OrderServis;
use App\OrderServisAddress;
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
                'no_hp_penerima' => $data_user->no_hp,
        ]); 
        // return $request;
        Session::put('id_order', $data2);
        if($jemput == 'Ya' || $antar == 'Ya'){

            return redirect('lokasi-jemput-antar');
        } 
        return redirect('list-servis');
    }
    public function set_lokasi(){
        $id_order = Session::get('id_order');
        $id_user = Session::get('id_user');
        // dd($id_order);
        $data_address = OrderServisAddress::all()->where('id_transaksi', $id_order)->first();
        // dd($data_address->id);
        $shares = DB::table('tb_user')
            ->where('tb_user.id_user',$id_user)
            ->select('no_hp')
            ->get()
            ->first();
        return view('set_lokasi', compact('data_address','shares'));
    }
    public function update_lokasi(Request $request){
        // dd($request);
        $id_order = Session::get('id_order');
        $id_user = Session::get('id_user');
        
        // dd($id_order);
        DB::table('tb_order_servis_address')
            ->where('id_transaksi', $id_order)
            ->update([
                'alamat' => $request->alamat,
                'no_rumah' => $request->no_rumah,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'kode_pos' => $request->kode_pos,
                'longtitude' => $request->longtitude,
                'latitude' => $request->latitude,
                'no_hp_penerima' => $request->no_hp_penerima
            ]);
            // $no_hp = $request->no_hp_penerima;
            $no_hp = '+6285828949395';
            // return $no_hp[0] ;
            if( $no_hp[0] == '0'){
                $no_hp= substr_replace($no_hp,'62',0,1);
                // return $no_hp;
            }else if($no_hp[0] == '+'){
                $no_hp= substr_replace($no_hp,'62',0,3);
                // return $no_hp;
            }

            $data_elektronik = OrderServis::all()->where('id_order_servis',$id_order)->first();
            $elektronik = Elektronik::all()->where('id_elektronik',$data_elektronik->id_elektronik)->first();
            // return $elektronik;
            $my_apikey = "9KJS7UCBSXI0EE3P1DGU"; 
            $destination = $no_hp; 
            $message = "Servis telah masuk dalam list kami. Selanjutnya info tentang servisan akan melalui ini. Servis ".$elektronik->nama_elektronik.". Merk : ".$data_elektronik->merk.". Seri : ".$data_elektronik->seri.". Kerusakan : ".$data_elektronik->kerusakan; 
            $api_url = "http://panel.apiwha.com/send_message.php"; 
            $api_url .= "?apikey=". urlencode ($my_apikey); 
            $api_url .= "&number=". urlencode ($destination); 
            $api_url .= "&text=". urlencode ($message); 
            $my_result_object = json_decode(file_get_contents($api_url, false));
            
            return redirect('list-servis'); 
            // return redirect("https://wa.me/6285828949593?text=I'm%20interested%20in%20your%20car%20for%20sale");
    } 
    public function list_servis(){
        $id_order = Session::get('id_order');
        $id_user = Session::get('id_user');
        $data_elektronik = OrderServis::all()->where('id_user',$id_user);
        $elektronik = Elektronik::all()->where('id_elektronik',$data_elektronik[0]->id_elektronik);
        // dd($elektronik); 
        $shares = DB::table('tb_elektronik')
            ->where('tb_elektronik.id_elektronik','tb_order_servis.id_elektronik')
            ->select('nama_elektronik')
            ->get();
        // dd($elektronik);
        return view('list_servis', compact('data_elektronik'));
    }
}
