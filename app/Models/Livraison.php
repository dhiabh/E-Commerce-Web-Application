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
        $this->hasOne(Mode_livraison::class);
    }
}
