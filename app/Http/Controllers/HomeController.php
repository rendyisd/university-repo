<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Document;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $documents = Document::where('status', '=', 'Accepted')->get();
        $authors = Author::withCount(['documents' => function($query) {
                                        $query->where('documents.status', '=', 'Accepted');
                                    }])
                            ->orderByDesc('documents_count')
                            ->get();

        return view('home', ['documents' => $documents, 'authors' => $authors]);
    }
}
