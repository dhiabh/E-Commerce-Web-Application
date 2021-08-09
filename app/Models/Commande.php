<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'tel',
        'address',
        'region',
        'ville',
        'date_commande'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withPivot('quantity');
    }

    public function etats_commande()
    {
        return $this->belongsToMany(Etat_commande::class);
    }

    public function livraisons()
    {
        return $this->belongsToMany(Livraison::class);
    }

    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
}
