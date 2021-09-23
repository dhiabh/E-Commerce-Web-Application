<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article_Panier_Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'boutique' => $this->boutique,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->paniers()->where('panier_id', 6)->first()->pivot->quantity,
            'total' => $this->paniers()->where('panier_id', 6)->first()->pivot->total,
            'description' => $this->description,
            'image' => "storage/images/articles/". $this->images()->first()->image,
        ];
    }
}
