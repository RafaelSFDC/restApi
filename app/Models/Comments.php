<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $foreignKey = 'post_id';

    protected $fillable = [
        'content',
        'post_id',
        'user_id',
    ];

    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
