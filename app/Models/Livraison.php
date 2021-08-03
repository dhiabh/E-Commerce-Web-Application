<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode_livraison_id',
        'date_livraison'
    ];

    public function mode_livraison()
    {
        return $this->belongsTo(Mode_livraison::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);

    }

}
