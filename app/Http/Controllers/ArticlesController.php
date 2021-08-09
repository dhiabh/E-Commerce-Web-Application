<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageIntervention;

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
            [BoutiqueController::class, 'index'],
            ['boutique' => $boutique]
        );
    }


    public function create($boutique_id)
    {
        return view('articles.create')->with('boutique_id', $boutique_id);
    }



    public function store(ArticleStoreRequest $request, Boutique $boutique)
    {

        $imagePath = request('image')->store('images/articles', 'public');

        $image = ImageIntervention::make(public_path("storage/{$imagePath}"));
        $image->save();

        $article = $boutique->articles()->create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        Image::create([
            'article_id' => $article->id,
            'image' => $imagePath,
        ]);

        return redirect()->route('boutiques.show', compact('boutique'));
    }


    public function show($id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return view('home');
        }

        $images = Image::where('article_id', $id)->get();

        return view('articles.show', compact('article'));
    }


    public function edit($id)
    {


        $article = Article::find($id);
        if (is_null($article)) {
            return view('home');
        }

        $this->authorize('update',$article);


        $images = Image::where('article_id', $id)->get();
        
        return view('articles.edit', compact('article'));
    }


    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return view('home');
        }

        $this->authorize('update',$article);


        $article->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description
        ]);

        return redirect()->route('articles.show', compact('article'));
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return view('/');
        }

        $this->authorize('update',$article);

        $boutique = Boutique::find($article->boutique_id);

        $images = Image::where('article_id', $article->id)->get();
        foreach ($images as $image) {
            Storage::delete('public/images/articles/' . $image->image);
        }

        $article->images()->delete();
        $article->paniers()->detach();

        $article->delete();

        $articles = $boutique->articles;


        return redirect()->route('boutiques.show', compact('boutique'));
    }

    public function addImage(ArticleStoreRequest $request, Article $article)
    {

        $imagePath = request('image')->store('images/articles', 'public');

        $image = ImageIntervention::make(public_path("storage/{$imagePath}"));
        $image->save();


        Image::create([
            'article_id' => $article->id,
            'image' => $imagePath,
        ]);

        return redirect()->back();


        
    }

    public function deleteImage(Image $image)
    {
        $image->delete();
        return redirect()->back();
    }
}
