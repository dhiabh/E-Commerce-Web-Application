<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Panier;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Models\Image;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class PanierController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index(Panier $panier)
    {
        $panier = auth()->user()->panier;
        $articles = $panier->articles;
        $articles_number = $articles->count();


        $total = 0;
        foreach($articles as $article)
        {
            $total += $article->price * $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity;
        }


        return view('paniers.index', compact('articles', 'articles_number','total','panier'));
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
    public function store(Request $request) {

    }
    public function addArticle($article_id)
    {
        $panier = Auth::user()->panier;
        $article = Article::find($article_id);
        

        $panier->articles()->attach($article);

        $panier->articles()->where('article_id', $article_id)->first()->pivot->update([
            'quantity' => 1
        ]);

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
        
        $panier = auth()->user()->panier;
        $articles = $panier->articles;
        $articles_number = $articles->count();
        $quantity = $request->{'quantity' . $id};

        $panier->articles()->where('article_id', $id)->first()->pivot->update([
            'quantity' => $quantity
        ]);

        $total = 0;
        foreach($articles as $article)
        {
            $total += $article->price * $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity;
        }
        
        return redirect()->route('paniers.index',compact('panier', 'articles_number','total','quantity'));
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
        auth()->user()->panier->articles()->detach($id);

        return redirect()->route('paniers.index')->with('message', 'Article supprimé du panier avec succés');
       
    }
}
