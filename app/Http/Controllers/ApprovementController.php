<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovementController extends Controller
{
    public function index (){
        return view('approvement');
    }
}
