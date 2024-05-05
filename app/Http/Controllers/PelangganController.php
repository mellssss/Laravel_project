<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class PelangganController extends Controller
{
    public function index()
    {
        $result= DB::table('tbpelanggan')
        ->get();
        //dd($result);
        return View("pelanggan.daftarplnggan")
        ->with('tabelpelanggan',$result)
    ;
    }

    public function create()
    {
        return View("pelanggan.formtambahplggn");
    }

    public function edit($id)
    {
        return View("pelanggan.formedit")
        ->with('idcari',$id)
        ;
    }

    public function store(Request $r)
    {
        $x=array
        (
            'kode'=>$r->kode,
            'nama'=>$r->nama,
            'alamat'=>$r->alamat,
            'hp'=>$r->hp,
            
        );
        DB::table('tbpelanggan')->insertgetid($x);

        return redirect('pelanggan');
    }


}

