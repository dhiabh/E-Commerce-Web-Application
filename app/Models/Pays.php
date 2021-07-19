<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    protected $fillable = [
        'pays_code',
        'name'
    ];

    public function villes()
    {
        $this->hasMany(Ville::class);
    }
}
