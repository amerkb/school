<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(SubjectsCategorie::class, 'subject_category_id');
    }


}
