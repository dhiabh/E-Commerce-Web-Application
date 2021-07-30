<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie_id',
        'user_id',
        'name'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleted(function($boutique){
            $boutique->articles()->delete();
        });
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
