<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'boutique_id',
        'name',
        'price',
        'quantity',
        'description_article'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function panier()
    {
        $this->belongsTo(Panier::class);
    }

    public function boutique()
    {
        $this->belongsTo(Boutique::class);
    }

    public function commande()
    {
        $this->belongsTo(Commande::class);
    }

}
