<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Nation extends Model
{
    use HasFactory;


    public function user(){
        return $this->hasOne(User::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }

    public function posts(){
        return $this->hasManyThrough(Post::class,User::class);
    }


}
