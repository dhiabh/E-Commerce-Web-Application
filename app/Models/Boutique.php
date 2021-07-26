<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'name'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
