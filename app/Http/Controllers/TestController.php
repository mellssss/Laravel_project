<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TestController extends Controller
{
    public function index(){
        echo "<br>Test Controller.";
    }

    public function blade(){
        return View('index');
        }
    
   public function tambah(){
        return view('tambah');
   }

   public function prosestambah( Request $r){
        $nilaiA=$r->a;
        $nilaiB=$r->b;
        $hasil=$nilaiA + $nilaiB;
        //dd($r);

        return view('tambah')
            ->with('nilA',$nilaiA)
            ->with('nilB',$nilaiB)
            ->with('hasil',$hasil)
         ;               
    }

    public function kali(){
        return view('kali');
   }

   public function proseskali( Request $r){
        $nilaiA=$r->vara;
        $nilaiB=$r->varb;
        $hasil=$nilaiA*$nilaiB;
        //dd($r);

        return view('kali')
            ->with('nilA',$nilaiA)
            ->with('nilB',$nilaiB)
            ->with('hasil',$hasil)
         ;               
    }

    public function satuan(){
        $result= DB::table('tbsatuan') 
        ->select('tbsatuan.*')
        ->get();
    //dd($result);
        return View("dftarsatuan")
        ->with('tabelsatuan',$result)
    ;
   }

   
}
