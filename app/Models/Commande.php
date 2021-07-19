<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commandes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'livraison_id',
        'nbre_articles',
        'total_amount',
        'date_commande'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function articles()
    {
        $this->hasMany(Article::class);
    }

    public function etats_commande()
    {
        $this->belongsToMany(Etat_commande::class);
    }
}
