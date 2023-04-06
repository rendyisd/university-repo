<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DepositController extends Controller
{
    public function index ()
    {
        return view('deposit');
    }

    public function depositSubmit(Request $request)
    {   
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'mainAuthor' => 'required|regex:/^[a-zA-Z\s]*$/', // this regex only allows letters and whitespace
            'contAuthor' => 'nullable|regex:/^[a-zA-Z\s\n]*$/', // same but also newline
            'faculty' => 'required',
            'abstract' => 'required',
            'itemType' => 'required|max:3',
            'document' => 'required|file|mimes:pdf|max:51200' // max 50mb in size
        ]);

        // Sanitize authors name
        $validatedData['mainAuthor'] = ucwords(
                                            strtolower(
                                                preg_replace('/\s+/', ' ', trim($validatedData['mainAuthor']))
                                            )
                                        );
        
        if(!empty($validatedData['contAuthor'])){
            $temp = explode(PHP_EOL, $validatedData['contAuthor']);

            for($i = 0; $i < count($temp); $i++){
                $temp[$i] = ucwords(
                            strtolower(
                                preg_replace("/\s+/", " ", trim($temp[$i]))
                            )
                        );
            }
            $validatedData['contAuthor'] = $temp;
        }

        $newDoc = new Document();

        $newDoc->user_id = Auth::id();
        $newDoc->title = $validatedData['title'];
        $newDoc->faculty = $validatedData['faculty'];
        $newDoc->abstract = $validatedData['abstract'];
        $newDoc->item_type = $validatedData['itemType'];
        $newDoc->status = 'Pending';

        $fileName = $validatedData['document']->getClientOriginalName();
        $newFileName = date('YmdHis').'_'.$fileName;
        $newDoc->filename = $newFileName;

        $newDoc->save();
        
        $validatedData['document']->storeAs('documents/pending', $newFileName);

        $mainAuthor = Author::firstOrCreate([
            'name' => $validatedData['mainAuthor'],
        ]);
        $newDoc->author()->attach($mainAuthor->id, ['status' => 'Main']);

        if(!empty($validatedData['contAuthor'])){
            foreach($validatedData['contAuthor'] as $name){
                $contAuthor = Author::firstOrCreate([
                    'name' => $name
                ]);
                $newDoc->author()->attach($contAuthor->id, ['status' => 'Contributor']);
            }
        }
        
        return redirect()->route('your_document');
    }
}
