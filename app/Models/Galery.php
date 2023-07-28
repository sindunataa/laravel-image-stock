<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'status', 
        'image', 
        'description', 
        'album_id',
        'author_id',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

}
