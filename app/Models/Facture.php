<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'commande_id',
        'date_facture',
        'base_ht',
        'tva',
        'remise',
        'total_ht',
        'total_ttc',

    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
