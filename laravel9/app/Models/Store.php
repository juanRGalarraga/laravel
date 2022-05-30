<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Store extends Model
{
    use HasFactory;

    public function article(){
        return $this->hasMany(Article::class);
    }
}
