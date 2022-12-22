<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cgy_id', 'content', 'pic', 'sort', 'enabled'];
    public function cgy()
    {
        return $this->belongsTo(Cgy::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps()->withPivot('color');
    }
}