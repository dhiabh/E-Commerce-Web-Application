<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ArticleStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        
        
        if(Route::currentRouteName() == "boutiques.articles.store")
        {
            return [
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'description' => 'required',
                'image' => ['required', 'image']
            ];
        }elseif(Route::currentRouteName() == "images.upload"){
            
            return [
                'image' => ['required', 'image']
            ];
        }

    }
}
