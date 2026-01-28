<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'categorie_id',
        'quantity',
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
