<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Panier $panier)
    {
        $panier = auth()->user()->panier;
        $articles = $panier->articles;
        $articles_number = $articles->count();


        $total = 0;
        foreach($articles as $article)
        {
            $total += $article->price;
        }

        return view('paniers.index', compact('panier','articles', 'articles_number','total'));
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
    public function store($id)
    {
        auth()->user()->panier->articles->create([
            'panier_id' => auth()->user()->panier->id,
            'article_id' => $id
        ]);

        return redirect()->route('articles.show');
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
        //
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
