<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use WisdomDiala\Countrypkg\Models\State;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'num_tel',
        'num_tel_2',
        'adresse',
        'state_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->panier()->create();
        });
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function panier() 
    {
        return $this->hasOne(Panier::class);
    }

    public function boutiques() 
    {
        return $this->hasMany(Boutique::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
