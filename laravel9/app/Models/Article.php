<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'stock', 'store_id'];
    // protected $guarded = ['store_id'];

    public function store(){
        return $this->belongsToMany(Store::class);
    }
}
