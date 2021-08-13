<?php

namespace App\Models;

use App\Http\Controllers\ArticlesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'boutique_id',
        'name',
        'price',
        'quantity',
        'description'
    ];


    protected static function boot()
    {
        parent::boot();

        static::deleted(function($article){
            $article->images()->delete();
        });
    }
    
    public function paniers()
    {
        return $this->belongsToMany(Panier::class)->withPivot('quantity');
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class);
    }

    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('quantity');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
