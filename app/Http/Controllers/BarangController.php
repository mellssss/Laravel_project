<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class BarangController extends Controller
{
    public function index()
    {
        $result= DB::table('tbbarang') 
            ->leftjoin ('tbsatuan','tbsatuan.id','=','tbbarang.idsatuan')
            ->select('tbbarang.*','tbsatuan.nama as namasatuan')
            ->orderby('tbbarang.id',)
            ->get();
        //dd($result);
        return View("tabel")
            ->with('isi','barang.daftarbrg')
            ->with('tabelbarang',$result)
        ;
        
    }

    public function create()
    {
        return View("form")
        ->with('isi','barang.formtambahbrg');
    }

    public function edit($id)
    {
        return View("barang.formedit")
        ->with('idcari',$id)
        ;
    }

    public function store(Request $r)
    {
        $x=array
        (
            'kode'=>$r->kode,
            'nama'=>$r->nama,
            'idsatuan'=>$r->idsatuan,
            'sawal'=>$r->sawal,
            'hb'=>$r->hb,
            'hj'=>$r->hj
        );
        DB::table('tbbarang')->insertgetid($x);

        return redirect('barang');
    }

    public function show(Request $r) {
        $x=array (
            'kode'=>$r->kode,
            'nama'=>$r->nama,
            'idsatuan'=>$r->idsatuan,
            'sawal'=>$r->sawal,
            'hb'=>$r->hb,
            'hj'=>$r->hj
        );
        DB::table('tbbarang')->where('id',$r->id)->update($x);
        return redirect('barang');
        
    }

}

