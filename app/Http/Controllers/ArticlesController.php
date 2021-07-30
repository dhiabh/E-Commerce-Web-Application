<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
       $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index($id)
    {
        $boutique = Boutique::find($id);
        return redirect()->action(
            [BoutiqueController::class, 'index'], ['boutique' => $boutique]
        );
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
        $article->panier_id = 1;
        
        if(is_null($shop_id)) {
            $categorie_name = $request->category;
            $categorie_id = Categorie::where('name', $categorie_name)->get();
            $shop_id = Boutique::where([
                ['categorie_id','=', $categorie_id],
                ['user_id', '=', Auth::id()]
            ]);
            if(is_null($shop_id)) {
                $boutique = new Boutique;
                $boutique->categorie_id = $categorie_id;
                $boutique->name = 'Boutique '.categorie_name.'de '.Auth::user()->name;
                $boutique->user_id = Auth::id();
                $boutique->save();

                $shop_id = $boutique->id;
            }
        }
        

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

        $images = Image::where('article_id', $id)->get();
        $data =  [
            'article'=> $article,
            'images' => $images
        ];

        return view('articles.show')->with($data);

    }


    public function edit($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('welcome');
        }

        $images = Image::where('article_id', $id)->get();
        $data = [
            'article' => $article,
            'images' => $images
        ];
        return view('articles.edit')->with($data);
        
    }


    public function update(ArticleStoreRequest $request, $id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('welcome');
        }
        // Add the possibility to change the boutique
        $article->name = $request->input('name');
        $article->price = $request->input('price');
        $categorie_name = $request->checkbox('category');

        $category_id = Categorie::select('id')->where('name', $categorie_name);
        $boutique_id = Boutique::select('boutique_id')->where(
            ['categorie_id', '=', $categorie_id],
            ['user_id', '=', Auth::id()]
        );
        if(is_null($boutique_id)) {
            $boutique = new Boutique;
            $boutique->categorie_id = $categorie_id;
            $boutique->user_id = Auth::id();
            $boutique->name = 'Boutique '.$categorie_name.' de '.Auth::user()->name;
            $boutique->save();
            $boutique_id = $boutique->id;
        }
        $article->boutique_id = $boutique_id;

        $article->description = $request->input('description');
        $article->quantity = $request->input('quantity');
        

        $article->save();

        if($request->hasFile('image')) {
            $image = Image::where('article_id', $id);

            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/images/articles', $filenameToStore);
            $image->image = $filenameToStore;
            $image->save();
        }

        return redirect()->action(
            [ArticlesController::class, 'show'], ['id' => $article->id]
        );

    }


    public function destroy($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return view('/');
        }
        $boutique = Boutique::find($article->boutique_id);

        $images = Image::where('article_id', $id)->get();
        foreach($images as $image) {
            Storage::delete('public/images/articles/'.$image->image);   
        }
        
        $article->images()->delete();
        $article->paniers()->detach();

        $article->delete();

<<<<<<< HEAD
        
        $article->paniers->detach();

        return view('boutiques.show')->with('boutique', $boutique);
=======
        return redirect()->action(
            [BoutiqueController::class, 'show'], ['boutique' => $boutique]
        );
>>>>>>> 8feadee447178ec582d0ddc55f6bae214e00c977

    }

    public function addImage(Request $request, $id) {
        $article = Article::find($id);
        $image = new Image;
        $image->article_id = $article->id;

        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();

        $filenameToStore = $filename.'_'.time().'_'.$extension;
        $path = $request->file('image')->storeAs('public/images/articles/', $filenameToStore);
        $image->image = $filenameToStore;
        $image->save();

        return redirect()->back();

    }

    public function deleteImage($id) {
        $image = Image::find($id);
        $article_id = $image->article_id;
        $image->delete();
        return redirect()->back();
        
    }
}
