<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'mode_payment_id',
        'facture_id',
        'montant_payment',
        'statut_payment',
        'date_payment'
    ];

    public function facture()
    {
        return $this->belongsTo(Facture::class);
    }

    public function mode_payment()
    {
        return $this->belongsTo(Mode_payment::class);
    }
}
