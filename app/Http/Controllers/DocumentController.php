<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;


class DocumentController extends Controller
{
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
