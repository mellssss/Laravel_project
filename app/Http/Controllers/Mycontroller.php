<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MyController extends Controller
{
    public function index()
    {
        return View("tabelmhsw");
    }

    public function create()
    {
        return View("formtambahmhsw");
    }

    public function store()
    {
        return View("tabelmhsw");
    }


}