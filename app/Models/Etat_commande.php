<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etat_commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function commandes()
    {
        $this->belongsToMany(Commande::class);
    }
}
