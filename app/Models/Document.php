<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'faculty',
        'abstract',
        'item_type',
        'filename',
        'status',
    ];

    public function author()
    {
        return $this->belongsToMany(Author::class);
    }

    public function resolveItemType()
    {
        $itemType = [
            'ug' => 'Undergraduate Thesis',
            'ms' => 'Master Thesis',
            'phd' => 'Doctoral Dissertation',
        ];

        return $itemType[$this['item_type']] ?? 'Unknown';
    }
}
