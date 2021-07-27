<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Boutique;
use App\Models\Categorie;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('boutiques.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Boutique::create([
            'user_id' => auth()->user()->id,
            'categorie_id' => $request->categorie_id,
            'name' => $request->name
        ]);

        return redirect()->route('users.index')->with('message','Boutique créé avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Boutique $boutique)
    {
        $articles = Article::all()->where('boutique_id',$boutique->id);
        return view('boutiques.show',compact('boutique','articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Boutique $boutique)
    {
        $categories = Categorie::all();
        return view('boutiques.edit',compact('boutique','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boutique $boutique)
    {
        $boutique->update([
            'categorie_id' => $request->categorie_id,
            'name' => $request->name
        ]);

        return redirect()->route('users.index')->with('message','Informations mises à jour avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
