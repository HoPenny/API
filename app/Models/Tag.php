<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'link', 'type', 'sort', 'enabled'];
    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }
}
