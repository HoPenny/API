<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cgy extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'pic', 'sort'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}