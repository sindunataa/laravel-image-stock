<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'image', 
        'address',
    ];

    public function galery()
    {
        return $this->hasMany(Galery::class, 'author_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class, 'article_id');
    }
    
}
