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
        $this->belongsTo(Facture::class);
    }

    public function mode_payment()
    {
        $this->belongsTo(Mode_payment::class);
    }
}
