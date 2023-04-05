<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class ApprovementController extends Controller
{
    public function index (){
        $pendingDocuments = Document::where('status', 'Pending')->get();

        return view('approvement', ['documents' => $pendingDocuments]);
    }
}
