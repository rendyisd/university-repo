<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'faculty',
        'abstract',
        'item_type',
        'filename',
        'published_date',
        'status',
    ];

    public function author()
    {
        return $this->belongsToMany(Author::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resolveFaculty()
    {
        $faculty = [
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

        return $faculty[$this['faculty']] ?? 'Unknown';
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
