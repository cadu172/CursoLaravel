<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function __construct() {
        $this->middleware("auth:admin-web");
    }
    //
    public function index() {
        return view("home-admin");
    }
}
