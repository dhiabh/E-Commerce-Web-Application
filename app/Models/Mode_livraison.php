<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mode_livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'frais'
    ];

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
}
