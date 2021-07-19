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
        $this->belongsTo(Categorie::class);
    }

    public function articles()
    {
        $this->hasMany(Article::class);
    }
}
