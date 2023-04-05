<?php

namespace App\Http\Controllers;

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

        $path = storage_path('app/documents/pending').'/'.$filename;
        $file = File::get($path);

        $resp = new Response ($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);

        return $resp;
    }
}
