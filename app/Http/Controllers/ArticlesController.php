<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Image;
use App\Models\Boutique;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Panier;

class ArticlesController extends Controller
{

    public function index($boutique_id)
    {
        $boutique = Boutique::find($boutique_id);
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
        
        $article->name = $request->input('name');
        $article->price = $request->input('price');
        $article->description = $request->input('description');
        $article->quantity = $request->input('quantity');
        
        if(!$shop_id) {
            $categorie_name = $request->checkbox('category');
            $categorie_id = Categorie::where('name', $categorie_name)->get();
            $shop_id = Boutique::where([
                ['categorie_id','=', $categorie_id],
                ['user_id', '=', Auth::id()]
            ]);
            if(!$shop_id) {
                $boutique = new Boutique;
                $boutique->categorie_id = $categorie_id;
                $boutique->name = 'Boutique '.categorie_name.'de '.Auth::user()->name;
                $boutique->user_id = Auth::id();
                $boutique->save();

                $shop_id = $boutique->id;
            }
        }
        

        $article->boutique_id = $shop_id;
        
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
            [BoutiqueController::class, 'show'], ['id'=> $article->boutique_id]
        );
        
    }


    public function show($id)
    {
        $article = Article::find($id);
        if(!$article) {
            return view('welcome');
        }

        $images = Image::where('article_id', $id)->get();
        $data =  {
            'article'=> $article,
            'images' => $images
        };

        return view('articles.show')->with($data);

    }


    public function edit($id)
    {
        $article = Article::find($id);
        if(!$article) {
            return view('welcome');
        }

        $images = Image::where('article_id', $id);
        $data = {
            'article' => $article,
            'images' => $images
        }
        return view('articles.edit')->with($data);
        
    }


    public function update(ArticleStoreRequest $request, $id)
    {
        $article = Article::find($id);
        if(!$article) {
            return view('welcome');
        }
        // Add the possibility to change the boutique
        $article->name = $request->input('name');
        $article->price = $request->input('price');
        $categorie_name = $request->checkbox('category');

        $category_id = Categorie::select('id')->where('name', $categorie_name);
        $boutique_id = Boutique::select('boutique_id')->where(
            ['categorie_id', '=', $categorie_id],
            ['user_id', '=' Auth::id()]
        );
        if(!$boutique_id) {
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
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $path = $request->file('image')->storeAs('public/images/articles', $fileNameToStore);
            $image->image = $fileNameToStore;
            $image->save();
        }

        return redirect()->action(
            [ArticlesController::class, 'show'], ['id' => $article->id]
        );

    }


    public function destroy($id)
    {
        $article = Article::find($id);
        if(!$article) {
            return view('articles.index');
        }
        $boutique = Boutique::find($article->boutique_id);

        $image = Image::where('article_id', $id)->get();
        $commande = Commande::where('article_id', $id)->get();
        $panier = Panier::where('article_id', $id)->get();
        

        Storage::delete('public/images/articles/'.$image->image);
        $image->delete();
        $commande->delete();
        $panier->delete();
        $article->delete();

        return view('boutiques.show')->with('boutique', $boutique);

    }
}
