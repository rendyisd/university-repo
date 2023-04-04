<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use app\Models\Document;
use Illuminate\Support\Facades\Auth;

class PendingController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userDocuments = $user->document;

        return view('pending', ['documents' => $userDocuments]);
    }
}
