<?php

namespace App\Models;

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

    
    public function paniers()
    {
        return $this->belongsToMany(Panier::class);
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class);
    }

    public function commande()
    {
        return $this->belongsToMany(Commande::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
