<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MhsController extends Controller
{
    public function index()
    {
        $result = DB::table('tbmahasiswa')
            ->leftJoin('jeniskelamin', 'jeniskelamin.id', '=', 'tbmahasiswa.idjk')
            ->leftJoin('prodi', 'prodi.id', '=', 'tbmahasiswa.idprodi')
            ->select('tbmahasiswa.id','tbmahasiswa.nim','tbmahasiswa.nama','tbmahasiswa.kelas','jeniskelamin.jk','prodi.nmprodi')
            ->orderBy('tbmahasiswa.id', 'DESC')
            ->get();

        //dd($result)

        return View("mahasiswa.tabelmhs")
            ->with('tabelmhs',$result)
        ;
        
    }

    public function create()
    {
        $result = DB::table('tbmahasiswa')
            ->leftJoin('jeniskelamin', 'jeniskelamin.id', '=', 'tbmahasiswa.idjk')
            ->leftJoin('prodi', 'prodi.id', '=', 'tbmahasiswa.idprodi')
            ->select('tbmahasiswa.id','tbmahasiswa.nim','tbmahasiswa.nama','tbmahasiswa.kelas','jeniskelamin.jk','prodi.nmprodi')
            ->orderBy('tbmahasiswa.id', 'DESC')
            ->get();

       return View("mahasiswa.formtambah")
        ->with('result',$result)
        ->with('tambah',1)
        ->with('idjk',0)
        ;
    }

    public function edit($id)
    {
        $result = DB::table('tbmahasiswa')
        ->leftJoin('jeniskelamin', 'jeniskelamin.id', '=', 'tbmahasiswa.idjk')
        ->leftJoin('prodi', 'prodi.id', '=', 'tbmahasiswa.idprodi')
        ->select('tbmahasiswa.id','tbmahasiswa.nim','tbmahasiswa.nama','jeniskelamin.jk','prodi.nmprodi')
        ->orderBy('tbmahasiswa.id',$id)
        ->get();

        $result2=DB::table('tbmahasiswa')               
        ->select('tbmahasiswa.*')
        ->where('tbmahasiswa.id',$id)
        ->first();

        return View("mahasiswa.formtambah")
        ->with('result',$result)
        ->with('master',$result2)
        ->with('tambah',0)
        ;
    }

    public function store(Request $r)
    {
        DB::table('tbmahasiswa')
            ->where ('id',$r->id)
            ->delete();

        $x=array
        (
            'nim'=>$r->nim,
            'nama'=>$r->nama,
            'idjk'=>$r->idjk,
            'idprodi'=>$r->idprodi,
        );
        DB::table('tbmahasiswa')->insertgetid($x);

        $result = DB::table('tbmahasiswa')
        ->leftJoin('jeniskelamin', 'jeniskelamin.id', '=', 'tbmahasiswa.idjk')
        ->leftJoin('prodi', 'prodi.id', '=', 'tbmahasiswa.idprodi')
        ->select('tbmahasiswa.id','tbmahasiswa.nim','tbmahasiswa.nama','jeniskelamin.jk','prodi.nmprodi')
        ->orderBy('tbmahasiswa.id',$r->id)
        ->get();

        $result2=DB::table('tbmahasiswa')               
        ->select('tbmahasiswa.*')
        ->where('tbmahasiswa.id',$r->id)
        ->first();

        return View("mahasiswa.formtambah")
        ->with('result',$result)
        ->with('master',$result2)
        ->with('tambah',0)
        ;
    }

    public function deletedatamhs($id)
    {
        DB::table('tbmahasiswa') -> where('id', $id) -> delete();

        $result = DB::table('tbmahasiswa')
        ->leftJoin('jeniskelamin', 'jeniskelamin.id', '=', 'tbmahasiswa.idjk')
        ->leftJoin('prodi', 'prodi.id', '=', 'tbmahasiswa.idprodi')
        ->select('tbmahasiswa.id','tbmahasiswa.nim','tbmahasiswa.nama','jeniskelamin.jk','prodi.nmprodi')
        ->orderBy('tbmahasiswa.id',$id)
        ->get();

        $result2=DB::table('tbmahasiswa')               
        ->select('tbmahasiswa.*')
        ->where('tbmahasiswa.id',$id)
        ->first();

        return View("mahasiswa.formtambah")
        ->with('result',$result)
        ->with('master',$result2)
        ->with('tambah',0)
        ;
    }


}