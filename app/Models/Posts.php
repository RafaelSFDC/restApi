<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    use HasFactory;


    public function comments()
    {
        return $this->hasMany(Comments::class, 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
