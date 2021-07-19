<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pays_id',

    ];

    public function users()
    {
        $this->hasMany(User::class);
    }

    public function pays()
    {
        $this->belongsTo(Pays::class);
    }
}
