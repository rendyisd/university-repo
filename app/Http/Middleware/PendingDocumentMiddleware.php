<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Document;

class PendingDocumentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $filename = request('filename');
        $user = $request->user();

        if(!$user){
            abort(403, 'Unauthorized access');
        }

        $document = Document::where('filename', $filename)->first();

        if($user->role == 'Admin' || $user->id == $document->user_id){
            return $next($request);
        }

        abort(403, 'Unauthorized access');
    }
}
