<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function documents()
    {
        return $this->belongsToMany(Document::class);
    }

    public function documentsAccepted()
    {
        return $this->belongsToMany(Document::class)
                    ->where('documents.status', '=', 'Accepted');
    }
}
