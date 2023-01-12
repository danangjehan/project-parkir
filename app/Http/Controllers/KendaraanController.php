<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    public function index(){
        return view('kendaraan.index',[
            'data' => Kendaraan::latest()->get()
        ]);
    }

    public function createView(){
        return view('kendaraan.create');
    }

    public function kendaraanStore(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tarif' => ['required', 'numeric']
        ]);

        $kendaraan = Kendaraan::create([
            'name' => $request->name,
            'tarif' => $request->tarif
        ]);

        return redirect()->route('kendaraan.index');
    }

    public function kendaraanPreview($id){
        return view('kendaraan.update',[
            'data'=> Kendaraan::find($id)
        ]);
    }

    public function kendaraanUpdate(Request $request,$id){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'tarif' => ['required', 'numeric']
        ]);

        $dataUpdate = [
            'name' => $request->name,
            'tarif' => $request->tarif,
        ];
        Kendaraan::where('id',$id)->update($dataUpdate);
        return redirect()->route('kendaraan.index');

    }
}
