<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiketMasuk;
use App\Models\TiketKeluar;
use App\Models\Kendaraan;

class TiketKeluarController extends Controller
{
    public function index(){
        return view('tiket-keluar.index');
    }

    public function cari(Request $request){
     
        $data = TiketMasuk::where('unique_character',$request['tiket'])->where('status',true)->first();
        if(empty($data)){
            return redirect()->route('tiket-keluar.index')->with('failure', 'Nomor tiket tidak ditemukan');
        }
        return redirect()->route('tiket-keluar.preview',['id' => $data->id]);
    }

    public function preview($id){
        $data = TiketMasuk::where('id',$id)->first();
        return view('tiket-keluar.preview',[
            'data' => $data,
            'kendaraan' => Kendaraan::latest()->get()
        ]);
    }

    public function store(Request $request){
        

        $dataTiketMasuk = TiketMasuk::where('unique_character',$request->tiket)->first();
        $dataKendaraan = Kendaraan::where('name',$request->kendaraan_nama)->first();        
        Tiketkeluar::create([
            'tiket_id' => $dataTiketMasuk->id,
            'durasi' => (float) str_replace(" Jam","",$request->durasi),
            'kendaraan_id' => $dataKendaraan->id,
            'bayar' => $request->tarif
        ]);


        TiketMasuk::where('id',$dataTiketMasuk->id)->update([
            'status' => false
        ]);

        return redirect()->route('tiket-keluar.index');

    }
}
