<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = false;


    public function comments()
    {
        return $this->hasMany(Comment::class,'article_id','id');
    }

    public function likes()
    {
        return $this->belongsTo(Like::class,'article_id','id');
    }
}
