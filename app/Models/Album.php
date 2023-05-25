<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'status', 
        'description'
        ];
    
    public function galery()
    {
        return $this->hasMany(Galery::class, 'album_id');
    }

}
