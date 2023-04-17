<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Document;

class MetadataController extends Controller
{
    //
    public function index (){
        $docId = request('id');

        $documents = Document::where('status', '=', 'Accepted')->get();
        $authors = Author::withCount(['documents' => function($query) {
                                        $query->where('documents.status', '=', 'Accepted');
                                    }])
                            ->orderByDesc('documents_count')
                            ->get();

        $document = Document::find($docId);

        return view('metadata', ['currentDocument' => $document, 'documents' => $documents, 'authors' => $authors]);
    }
}
