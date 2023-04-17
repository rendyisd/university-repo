<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function facultyView()
    {
        return view('browse_faculty');
    }

    public function yearView()
    {
        return view('browse_year');
    }

    public function typeView()
    {
        return view('browse_type');
    }
}
