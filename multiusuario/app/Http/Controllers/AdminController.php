<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // view com a tela principal do admin
       return view("admin");
    }
}
