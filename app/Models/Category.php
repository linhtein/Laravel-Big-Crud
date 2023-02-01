<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    public function post(){
        // return $this->hasOne(Post::class)->ofMany('user_id','min');
        return $this->hasOne(Post::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
