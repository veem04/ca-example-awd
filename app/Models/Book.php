<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function authors(){
        return $this->belongsToMany(Author::class);
    }
}
