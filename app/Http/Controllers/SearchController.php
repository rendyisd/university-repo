<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function facultyView()
    {
        return view('browse_faculty');
    }

    public function yearView()
    {
        // $years = DB::table('documents')
        //                     ->where('status', '=', 'Accepted')
        //                     ->selectRaw('DISTINCT YEAR(published_date) as year')->get();
        
        $years = Document::where('status', '=', 'Accepted')
                            ->selectRaw('YEAR(published_date) as year')
                            ->distinct()
                            ->orderBy('year', 'desc')
                            ->pluck('year')
                            ->toArray();

        return view('browse_year', ['years' => $years]);
    }

    public function typeView()
    {
        return view('browse_type');
    }

    public function facultyBrowse(Request $request, $faculty)
    {
        $facultyShort = [
            'feco' => 'Faculty of Economics',
            'flaw' => 'Faculty of Law',
            'feng' => 'Faculty of Engineering',
            'fmed' => 'Faculty of Medicine',
            'fagr' => 'Faculty of Agriculture',
            'fedu' => 'Faculty of Education and Educational Science',
            'fsoc' => 'Faculty of Social and Politic Science',
            'fmat' => 'Faculty of Mathematics and Natural Science',
            'focs' => 'Faculty of Computer Science',
            'foph' => 'Faculty of Public Health',
        ];

        if(!array_key_exists($faculty, $facultyShort)){
            abort(404, 'Faculty does not exist!');
        }

        $documents = Document::where('status', '=', 'Accepted')
                                ->where('faculty', '=', $faculty)
                                ->get();
        return view('browse', ['documents' => $documents, 'browseTitle' => $facultyShort[$faculty]]);
    }

    public function typeBrowse(Request $request, $type)
    {
        $itemType = [
            'ug' => 'Undergraduate Thesis',
            'ms' => 'Master Thesis',
            'phd' => 'Doctoral Dissertation',
        ];

        if(!array_key_exists($type, $itemType)){
            abort(404, 'Type does not exist!');
        }

        $documents = Document::where('status', '=', 'Accepted')
                                ->where('item_type', '=', $type)
                                ->get();

        return view('browse', ['documents' => $documents, 'browseTitle' => $itemType[$type]]);
    }

    public function yearBrowse(Request $request, $year)
    {
        $documents = Document::where('status', '=', 'Accepted')
                                ->whereRaw('YEAR(published_date) ='. $year)
                                ->get();

        return view('browse', ['documents' => $documents, 'browseTitle' => $year]);
    }

    public function homeSearch(Request $request)
    {
        $searchType = $request->get('type');
        $searchQuery = $request->get('q');

        $browseTitle = "Unknown query";

        if($searchType === 'title'){
            $documents = Document::where('status', '=', 'Accepted')
                                    ->where('title', 'like', '%'.$searchQuery.'%')->get();
            
            $browseTitle = 'Showing documents with the title "' . $searchQuery . '"';

        }
        elseif($searchType === 'author'){
            $authors = Author::where('name', 'like', '%'.$searchQuery.'%')->get();

            $documents = collect();

            foreach($authors as $author){
                $documents = $documents->merge($author->documentsAccepted()->get());
            }

            $browseTitle = 'Showing documents from author "' . $searchQuery . '"';
        }
        
        return view('browse', ['documents' => $documents, 'browseTitle' => $browseTitle]);
    }
}
