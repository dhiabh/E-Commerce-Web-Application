<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CommandeController;

use App\Models\Article;
use App\Models\Image;
use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Panier;

use App\Http\Requests\ArticleStoreRequest;

class ArticlesController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth', ['except' => ['index', 'show', 'browse']]);
    }

    public function browse($n)
    {
        $articles = Article::all();
        return view('articles.index', compact('articles', 'n'));
    }


    public function create($boutique_id)
    {
        return view('articles.create')->with('boutique_id', $boutique_id);
    }



    public function store(ArticleStoreRequest $request, $boutique_id)
    {
        $shop_id = $boutique_id;
        $article = new Article;
        $image = new Image;
        
        $article->name = $request->name;
        $article->price = $request->price;
        $article->description = $request->description;
        $article->quantity = $request->quantity;
        
        
        $article->boutique_id = $shop_id;
        $boutique = Boutique::find($shop_id);
        
        $article->save();
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = $request->file('image')->storeAs('public/images/articles', $fileNameToStore);

        $image->article_id = $article->id;
        $image->image = $fileNameToStore;

        $image->save();

        return redirect()->action(
            [BoutiqueController::class, 'show'], ['boutique'=> $boutique]
        );
        
    }


    public function show($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('welcome');
        }

        return view('articles.show')->with('article', $article);
    }


    public function edit($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('home');
        }

        $this->authorize('belongsToUser', $article);

        return view('articles.edit', compact('article'));        
    }


    public function update(ArticleStoreRequest $request, $id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('welcome');
        }

        $this->authorize('belongsToUser', $article);

        $article->name = $request->input('name');
        $article->price = $request->input('price');
        $article->description = $request->input('description');
        $article->quantity = $request->input('quantity');

        $article->save();

        return redirect()->action(
            [ArticlesController::class, 'show'], ['id' => $article->id]
        );

    }


    public function destroy($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('home');
        }

        $this->authorize('belongsToUser', $article);

        $boutique = Boutique::find($article->boutique_id);

        $images = Image::where('article_id', $id)->get();
        foreach($images as $image) {
            Storage::delete('public/images/articles/'.$image->image);   
        }
        
        $article->images()->delete();
        $paniers = Panier::all();
        foreach($paniers as $panier){
            $panier->articles()->detach($article->id);
            // also works: $article->paniers()->detach($panier->id);
        }
        //Doesn't work :$article->paniers()->detach();

        $article->delete();

        
        $article->paniers->detach();

        return view('boutiques.show')->with('boutique', $boutique);
        return redirect()->action(
            [BoutiqueController::class, 'show'], ['boutique' => $boutique]
        );

    }

    public function addImage(Request $request, $id) {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('home');
        }

        if(!($request->hasFile('image'))) {
            $images = Image::where('article_id', $id)->get();
            $data = [
                'images' => $images,
                'article' => $articles
            ];
            return view('articles.edit')->with($data);
        }

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();

        $filenameToStore = str_slug($filename.'_'.time().'.'.$extension);

        $path = $request->file('image')->storeAs('public/images/articles/', $filenameToStore);

        $image = new Image;
        $image->article_id = $id;
        $image->image = $filenameToStore;
        $image->save();

        return redirect()->back();

    }

    public function deleteImage($id) {
        $image = Image::find($id);
        if(is_null($image)) {
            return view('home');
        }

        $image->delete();
        Storage::delete('public/images/articles/'.$image->image);
        return redirect()->back();  
    }
}
