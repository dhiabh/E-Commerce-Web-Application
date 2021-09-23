<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article_Panier_Resource;
use App\Models\Article;
use App\Models\Panier;
use Auth;
use Illuminate\Http\Request;


class PanierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['getPanier', 'getArticles_Panier','updateArticlePanier', 'destroy']]);
    }

    public function index(Panier $panier)
    {
        $panier = auth()->user()->panier;
        $articles = $panier->articles;

        $total = 0;
        foreach ($articles as $article) {
            $total += $article->price * $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity;
        }

        return view('paniers.index', compact('articles', 'panier'));
    }

    public function getPanier()
    {
        $panier = auth()->user()->panier;

        return response()->json($panier);
    }

    public function getArticles_Panier()
    {
        $panier = auth()->user()->panier;
        $articles = $panier->articles;

        return Article_Panier_Resource::collection($articles);
    }

    public function updateArticlePanier(Request $request, Article $article)
    {
        $panier = auth()->user()->panier;

        $panier->articles()->where('article_id', $article->id)->first()->pivot->update([
            'quantity' => $request->quantity,
            'total' => $request->total
        ]);

        $total = 0;
        foreach ($panier->articles as $article) {
            $total += $panier->articles()->where('article_id', $article->id)->first()->pivot->total;
        }

        $panier->update([
            'total' => $total
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }
    public function addArticle($article_id)
    {
        
            $article = Article::find($article_id);
            $boutique = $article->boutique;
            $panier = auth()->user()->panier;

            if($boutique->user->id != auth()->user()->id && !isset($panier->articles()->where('article_id', $article_id)->first()->pivot))
            {
                $total = $panier->total + $article->price;
                $nbre_articles = $panier->nbre_articles + 1;
    
                $panier->update([
                    'total' => $total,
                    'nbre_articles' => $nbre_articles
                ]);
    
                $panier->articles()->attach($article);
    
                $panier->articles()->where('article_id', $article_id)->first()->pivot->update([
                    'quantity' => 1,
                    'total' => $article->price
                ]);
            }
            

            return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $panier = auth()->user()->panier;
        $articles = $panier->articles;
        $articles_number = $articles->count();
        $quantity = $request->{'quantity' . $id};

        $panier->articles()->where('article_id', $id)->first()->pivot->update([
            'quantity' => $quantity,
            'total' => $article->price * $quantity
        ]);

        $total = 0;
        foreach ($articles as $article) {
            $total += $article->price * $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity;
        }

        $panier->update([
            'total' => $total
        ]);

        return redirect()->route('paniers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::delete("delete from article_panier where article_id = ".$id." and panier_id = ".auth()->user()->panier->id);
        $panier = auth()->user()->panier;

        $panier->update([
            'nbre_articles' => $panier->nbre_articles - 1,
            'total' => $panier->total - $panier->articles()->where('article_id', $id)->first()->pivot->total
        ]);

        $panier->articles()->detach($id);

        return redirect()->back();
    }
}
