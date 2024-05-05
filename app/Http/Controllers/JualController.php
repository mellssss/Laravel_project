<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class JualController extends Controller
{
    public function index()
    {
        $result = DB::table('jual')
            ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'jual.idpelanggan')
            ->leftJoin('mutasi', 'mutasi.nobukti', '=', 'jual.nobukti')
            ->leftJoin('tbbarang', 'tbbarang.id', '=', 'mutasi.idbarang')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbbarang.idsatuan')
            ->select('jual.id',
            'jual.nobukti',
            'jual.tgl',
            'tbpelanggan.nama as namapelanggan',
            'jual.idpelanggan',
            'tbbarang.nama as namabarang',
            'tbsatuan.nama as namasatuan',
            'tbbarang.idsatuan',
            'mutasi.id as idjualdetail',
            'mutasi.idbarang',
            'mutasi.qty',
            'mutasi.hrgjual',
                DB::raw('SUM(mutasi.qty * mutasi.hrgjual) as total'))
            ->groupBy('jual.nobukti')
            ->orderBy('jual.id', 'DESC')
            ->get();

        //dd($result)

        return View("jual.tabeljual")
            ->with('tabeljual',$result)
        ;
        
    }

    public function create()
    {   
        $str_time = date('ymdHis');
        $nobukti = "PJ". "$str_time";

        //query detail
        $result = DB::table('jual')
            ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'jual.idpelanggan')
            ->leftJoin('mutasi', 'mutasi.nobukti', '=', 'jual.nobukti')
            ->leftJoin('tbbarang', 'tbbarang.id', '=', 'mutasi.idbarang')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbbarang.idsatuan')
            ->select('jual.id',
            'jual.nobukti','jual.tgl', 
            'tbpelanggan.nama as namapelanggan',
            'jual.idpelanggan',
            'tbbarang.nama as namabarang',
            'tbsatuan.nama as namasatuan',
            'tbbarang.idsatuan',
            'mutasi.id as idjualdetail',
            'mutasi.idbarang',
            'mutasi.qty',
            'mutasi.hrgjual', 
                DB::raw('SUM(mutasi.qty * mutasi.hrgjual) as total'))
            ->where('jual.nobukti',$nobukti)
            ->get();

        //query master
        $result2=DB::table('jual')               
        ->select('jual.*')
        ->where('jual.nobukti',$nobukti)
        ->first();

        return View("jual.formtambah")
        ->with('master',$result2)
        ->with('result',$result)
        ->with('tambah',1)
        ->with('nobukti',$nobukti)
        ->with('idpelanggan',0)
        ;              
    }

    public function edit($id)
    {
        //query detail
        $result = DB::table('jual')
            ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'jual.idpelanggan')
            ->leftJoin('mutasi', 'mutasi.nobukti', '=', 'jual.nobukti')
            ->leftJoin('tbbarang', 'tbbarang.id', '=', 'mutasi.idbarang')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbbarang.idsatuan')
            ->select ('jual.id',
            'jual.nobukti',
            'jual.tgl', 
            'tbpelanggan.nama as namapelanggan',
            'jual.idpelanggan',
            'tbbarang.nama as namabarang',
            'tbsatuan.nama as namasatuan',
            'tbbarang.idsatuan',
            'mutasi.id as idjualdetail',
            'mutasi.idbarang',
            'mutasi.qty','mutasi.hrgjual', 
             DB::raw('SUM(mutasi.qty * mutasi.hrgjual) as total'))
            ->where('jual.id', $id)
            ->get();

        //query master
        $result2=DB::table('jual')               
        ->select('jual.*')
        ->where('jual.id',$id)
        ->first();

        return View("jual.formtambah")
        ->with('master',$result2)
        ->with('result',$result)
        ->with('tambah',0)
        ;
    }

    public function store(Request $r) 
    {  
        DB::table('jual')
            ->where ('nobukti',$r->nobukti)
            ->delete();

        $x=array
        (
            'nobukti'=>$r->nobukti,
            'tgl'=>$r->tgl,
            'idpelanggan'=>$r->idpelanggan,
            'ket'=>$r->ket
            
        );
        DB::table('jual')->insertgetid($x);
        
        $y=array
        (
            'nobukti'=>$r->nobukti,
            'idbarang'=>$r->idbarang,
            'qty'=>$r->qty,
            'hrgjual'=>$r->hj
            
        );
        DB::table('mutasi')->insertgetid($y);
        
        $result = DB::table('jual')
            ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'jual.idpelanggan')
            ->leftJoin('mutasi', 'mutasi.nobukti', '=', 'jual.nobukti')
            ->leftJoin('tbbarang', 'tbbarang.id', '=', 'mutasi.idbarang')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbbarang.idsatuan')
            ->select('jual.id',
            'jual.nobukti',
            'jual.tgl', 
            'tbpelanggan.nama as namapelanggan',
            'jual.idpelanggan',
            'tbbarang.nama as namabarang',
            'tbsatuan.nama as namasatuan',
            'tbbarang.idsatuan',
            'mutasi.id as idjualdetail',
            'mutasi.idbarang',
            'mutasi.qty',
            'mutasi.hrgjual')
            ->where('jual.nobukti',$r ->nobukti)
            ->get();

        //query master
        $result2=DB::table('jual')               
        ->select('jual.*')
        ->where('jual.nobukti',$r ->nobukti)
        ->first();

        return View("jual.formtambah")
        ->with('master',$result2)
        ->with('result',$result)
        ->with('tambah',0)
        ->with('nobukti', $r ->nobukti)
        ;
    }

    public function deletejual($nobukti)
    {
        DB::table('jual') -> where('nobukti', $nobukti) -> delete();

        $result = DB::table('jual')
        ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'jual.idpelanggan')
        ->leftJoin('mutasi', 'mutasi.nobukti', '=', 'jual.nobukti')
        ->leftJoin('tbbarang', 'tbbarang.id', '=', 'mutasi.idbarang')
        ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbbarang.idsatuan')
        ->select('jual.id',
        'jual.nobukti',
        'jual.tgl',
        'tbpelanggan.nama as namapelanggan',
        'tbbarang.nama as namabarang',
        'mutasi.qty',
        'mutasi.hrgjual')
        ->where('jual.nobukti', $nobukti)
        ->get();

        return View("jual.tabeljual")
        ->with('tabeljual',$result)
        ;
    }

    public function deletejualdetail($idjualdetail)
    {
        $nobukticari = DB :: table('mutasi')
            ->where('id', $idjualdetail)
            ->first();

            $nobukti = $nobukticari -> nobukti;

            DB :: table('mutasi')
            ->where('id',$idjualdetail) 
            ->delete();

        //query detail
        $result = DB::table('jual')
            ->leftJoin('tbpelanggan', 'tbpelanggan.id', '=', 'jual.idpelanggan')
            ->leftJoin('mutasi', 'mutasi.nobukti', '=', 'jual.nobukti')
            ->leftJoin('tbbarang', 'tbbarang.id', '=', 'mutasi.idbarang')
            ->leftJoin('tbsatuan', 'tbsatuan.id', '=', 'tbbarang.idsatuan')
            ->select('jual.id',
            'jual.nobukti',
            'jual.tgl',
            'tbpelanggan.nama as namapelanggan',
            'jual.idpelanggan',
            'tbbarang.nama as namabarang',
            'tbsatuan.nama as namasatuan',
            'tbbarang.idsatuan',
            'mutasi.id as idjualdetail',
            'mutasi.idbarang',
            'mutasi.qty',
            'mutasi.hrgjual')
           ->where('jual.nobukti', $nobukti)
            ->get();

        //query master
        $result2=DB::table('jual')               
        ->select('jual.*')
        ->where('jual.nobukti',$nobukti)
        ->first();

        return View("jual.formtambah")
        ->with('master',$result2)
        ->with('result',$result)
        ->with('tambah',0)
        ;   
    }

}