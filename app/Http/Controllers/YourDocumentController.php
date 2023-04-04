<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use app\Models\Document;
use Illuminate\Support\Facades\Auth;

class YourDocumentController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userDocuments = $user->document;

        return view('your_document', ['documents' => $userDocuments]);
    }
}
