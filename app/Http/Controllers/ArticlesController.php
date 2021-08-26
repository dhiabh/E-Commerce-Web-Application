<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ImageIntervention;



use App\Http\Controllers\BoutiqueController;
use App\Http\Controllers\CommandeController;

use App\Models\Article;
use App\Models\Image;
use App\Models\Boutique;

use App\Models\Panier;

use App\Http\Requests\ArticleStoreRequest;

use App\Helpers\compareImages;
use App\Http\Resources\ArticlesResource;

class ArticlesController extends Controller
{

    public function __construct() {
       $this->middleware('auth', ['except' => ['index', 'show', 'browse', 'search', 'getArticles']]);
    }

    public function getArticles()
    {
        $articles = Article::all();

        return ArticlesResource::collection($articles);
    }

    public function create($boutique_id)
    {
        return view('articles.create')->with('boutique_id', $boutique_id);
    }


    public function store(ArticleStoreRequest $request, Boutique $boutique)
    {
               
        $filenameWithExt = str_slug(request('image')->getClientOriginalName());
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = request('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = request('image')->storeAs('/public/images/articles', $fileNameToStore);

        $article = $boutique->articles()->create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
        ]);

        Image::create([
            'article_id' => $article->id,
            'image' => $fileNameToStore,
        ]);

        return redirect()->route('boutiques.show', compact('boutique'));
    }


    public function show($id) {
        $article = Article::find($id);
        if (is_null($article)) {
            return redirect()->route('home');
        }

        $images = Image::where('article_id', $id)->get();

        return view('articles.show', compact('article'));
    }

    public function browse($input = null) {
        $articles = Article::where('id', '>', -1)->simplePaginate(9);
        $count = count(Article::all());
        $fromBrowse = true;
        return view('articles.index', compact('articles', 'count', 'fromBrowse'));
    }

    public function search(Request $request) {

        $biens = collect();
        $produits = Article::all();

        if($request->has('image')) {

            $validated = $request->validate([
                'image' => 'image'
            ]);

            $filenameWithExt = str_slug(request('image')->getClientOriginalName());
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = request('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'_'.Auth::id().'.'.$extension;
    
            $path = request('image')->storeAs('/public/images/search', $fileNameToStore);
            
            $class = new compareImages;
            foreach($produits as $produit) {
                $images = $produit->images;
                foreach($images as $image) {
                    $imageArticlePath = 'storage/images/articles/'.$image->image;
                    if($class->compare($imageArticlePath, 'storage/images/search/'.$fileNameToStore) < 10) {
                        $biens->push($produit);
                        break;
                    }
                }
            }
            $count = count($biens);
            $articles = $biens->paginate(9);
            Storage::disk('local')->delete('public/images/search/'.$fileNameToStore);
            return view('articles.index', compact('articles', 'count'));
        }
        $validated = $request->validate(['inlineFormInput' => 'required']);
        $input = $request->input('inlineFormInput');

        $input_words = explode(' ', $input);
        $firstTime = true;
        $didYouMean = $input;


        foreach($produits as $produit) {
            $flag = false;
            $produit_words = explode(' ', $produit->name);

            foreach($produit_words as $produit_word) {
                foreach($input_words as $input_word) {
                    if($this->real_resemblance($produit_word, $input_word) >= 75){
                        if($firstTime) {
                            $didYouMean = strtolower($produit_word);
                            $firstTime = false;    
                        }
                        $biens->push($produit);
                        $flag = true;
                        break;
                    } 
                }
                if($flag) {
                    break;
                }
            }   
        }

        $count = count($biens);
        $articles = $biens->paginate(9);
        if(isset($didYouMean))
        {
            return view('articles.index', compact('articles', 'input', 'count', 'didYouMean'));

        }
        return view('articles.index', compact('articles', 'input', 'count'));


    }


    public function edit($id)
    {
        $article = Article::find($id);
        if(is_null($article)) {
            return redirect()->route('home');
        }

        $boutiques = auth()->user()->boutiques;

        $this->authorize('belongsToUser', $article);

        return view('articles.edit', compact('article', 'boutiques'));        
    }


    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            return redirect()->route('home');
        }

        $this->authorize('belongsToUser',$article);

        $article->update([
            'boutique_id' => $request->boutique_id,
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
        if(is_null($article)) {
            return redirect()->route('home');
        }

        $this->authorize('belongsToUser', $article);

        $boutique = Boutique::find($article->boutique_id);

        $images = Image::where('article_id', $article->id)->get();
        foreach ($images as $image)
        {
            $deleted = Storage::disk('public')->delete($image->image);
        }

        //$article->images()->delete();    we did in boot method in the model
        $paniers = Panier::all();
        foreach($paniers as $panier){
            $panier->articles()->detach($article->id);
            // also works: $article->paniers()->detach($panier->id);
        }
        //Doesn't work :$article->paniers()->detach();

        $article->delete();

        $articles = $boutique->articles;

        return redirect()->route('boutiques.show', compact('boutique'));
    }

    // Handling addtional image import and image deletion

    public function addImage(Request $request, Article $article) {
        $validated = $request->validate([
            'image' => 'image'
        ]);

        $filenameWithExt = str_slug(request('image')->getClientOriginalName());
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = request('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = request('image')->storeAs('/public/images/articles', $fileNameToStore);
        Image::create([
            'article_id' => $article->id,
            'image' => $fileNameToStore, 
        ]);

        return redirect()->back();        
    }

    public function deleteImage($id) {
        $image = Image::find($id);
        if(is_null($image)) {
            return redirect()->route('home');
        }

        $image->delete();
        Storage::disk('public')->delete('images/articles/'.$image->image);
        return redirect()->back();  
    }



    // Helper functions 

    public function resemblance($word1, $word2) {
        $word1_letters = str_split(strtolower($word1));
        $word2_letters = str_split(strtolower($word2));
        $count_letters = count($word1_letters);
        $resemblance = 0;
        foreach(range(0, $count_letters - 1) as $p) {
            if($word1_letters[$p] == $word2_letters[$p]) {
                $resemblance = $resemblance + 1;
            }
        }
        $resemblance = ($resemblance/$count_letters)*100;
        return $resemblance;
    }

    public function real_resemblance($word1, $word2) {
        $word1_letters = str_split($word1);
        $word2_letters = str_split($word2);
        $count1 = count($word1_letters);
        $count2 = count($word2_letters);
        $resemblance = 0;

        if($count1 > $count2) {
            return $this->real_resemblance($word2, $word1);
        }


        $k = 0;
        while($k + $count1 -1 < $count2) {
            $sub_word2 = substr($word2, $k, $count1);
            /*if($count1 <= 2.6*count(strsplit($sub_word2)) {
                return 0;
            } 
            */          
            if($resemblance < $this->resemblance($word1, $sub_word2)) {
                $resemblance = $this->resemblance($word1, $sub_word2);
            }
            $k = $k + 1;
        }
        return $resemblance;

    }
}
