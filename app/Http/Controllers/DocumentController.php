<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;


class DocumentController extends Controller
{
    public function documentControlView()
    {
        $documents = Document::where('status', '=', 'Accepted')->get();

        return view('document_control', ['documents' => $documents]);
    }

    public function editView(Request $request)
    {
        $documentId = $request->get('id');

        $document = Document::find($documentId);

        return view('edit', ['document' => $document]);
    }

    public function editSubmit(Request $request)
    {
        $documentId = $request->get('id');

        $document = Document::find($documentId);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'mainAuthor' => 'required|regex:/^[a-zA-Z\s]*$/', // this regex only allows letters and whitespace
            'contAuthor' => 'nullable|regex:/^[a-zA-Z\s\n]*$/', // same but also newline
            'faculty' => 'required',
            'abstract' => 'required',
            'itemType' => 'required|max:3',
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

        $document->title = $validatedData['title'];
        $document->faculty = $validatedData['faculty'];
        $document->abstract = $validatedData['abstract'];
        $document->item_type = $validatedData['itemType'];

        $document->save();

        $authors = $document->author; // Author before detaching

        $document->author()->detach(); // Detached every author of this document

        $mainAuthor = Author::firstOrCreate([
            'name' => $validatedData['mainAuthor'],
        ]);
        $document->author()->attach($mainAuthor->id, ['status' => 'Main']);

        if(!empty($validatedData['contAuthor'])){
            foreach($validatedData['contAuthor'] as $name){
                $contAuthor = Author::firstOrCreate([
                    'name' => $name
                ]);
                $document->author()->attach($contAuthor->id, ['status' => 'Contributor']);
            }
        }

        // Delete author with no document
        foreach($authors as $author){
            if($author->documents()->count() === 0){
                $author->delete();
            }
        }

        return redirect()->route('metadata.accepted', ['id' => $document->id]);

    }

    public function deleteDocument(Request $request)
    {
        $documentId = $request->get('id');
        $document = Document::find($documentId);

        Storage::disk('accepted_docs')->delete($document->filename); // Delete from storage

        $authors = $document->author;

        $document->author()->detach();

        $document->delete();

        foreach($authors as $author){
            if($author->documents()->count() === 0){
                $author->delete();
            }
        }

        return redirect()->route('docControl');
    }

    public function pending(Request $request, $filename)
    {
        abort_if(
            !Storage::disk('pending_docs')->exists($filename),
            404,
            'Document does not exist.'
        );

        $file = Storage::disk('pending_docs')->get($filename);

        $resp = new Response ($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);

        return $resp;
    }

    public function accepted(Request $request, $filename)
    {
        abort_if(
            !Storage::disk('accepted_docs')->exists($filename),
            404,
            'Document does not exist.'
        );

        $file = Storage::disk('accepted_docs')->get($filename);

        $resp = new Response ($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);

        return $resp;
    }

    public function approveDecision(Request $request)
    {
        $documentId = $request->doc_id;
        $isAccepted = $request->decision === 'accept' ? true : false;

        $relatedDocument = Document::find($documentId);

        if(!$isAccepted){
            Storage::disk('pending_docs')->delete($relatedDocument->filename);
            $relatedDocument->update([
                'status' => 'Rejected'
            ]);
        }
        else{
            Storage::disk('accepted_docs')->put($relatedDocument->filename, Storage::disk('pending_docs')->get($relatedDocument->filename));
            Storage::disk('pending_docs')->delete($relatedDocument->filename);
            
            $relatedDocument->update([
                'published_date' => now()->format('Y-m-d'),
                'status' => 'Accepted'
            ]);
        }
        return redirect()->route('approvement');
    }
}
