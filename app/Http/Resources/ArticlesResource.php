<?php

namespace App\Http\Resources;

use App\Models\Panier;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ArticlesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (Auth::user()) {
            $user = Auth::user();
            $panier = $user->panier;
            //$user = User::find(2);
            //$panier = Panier::find(2);
            $boutique = $this->boutique;
            return [
                'id'        => $this->id,
                'boutique_id' => $this->boutique_id,
                'name' => $this->name,
                'price' => $this->price,
                'quantity' => $this->quantity,
                'description' => $this->description,
                'image' => "storage/images/articles/" . $this->images()->first()->image,
                'category' => $this->boutique->categorie->id,
                'panier' => $user->boutiques->where('id', $boutique->id)->first() ? 2 : ($panier->articles()->where('article_id', $this->id)->first() ? 1 : 0)
            ];
        }

        $boutique = $this->boutique;
        return [
            'id'        => $this->id,
            'boutique_id' => $this->boutique_id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'image' => "storage/images/articles/" . $this->images()->first()->image,
            'category' => $this->boutique->categorie->id,
        ];
    }
}
