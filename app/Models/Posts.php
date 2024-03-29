<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id',
        'category_id',
        'status'
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Categories::class);
    }
}
