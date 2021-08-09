<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture;
use App\Models\Livraison;
use App\Models\Mode_livraison;
use Carbon\Carbon;
use App\Models\Panier;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as ImageIntervention;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $commande = Commande::latest('id')->first();
        $modes_livraison = Mode_livraison::all();
        return view('mode_livraison.create',compact('modes_livraison'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commande = Commande::latest('id')->first();
        
        $livraison = Livraison::create([
            'mode_livraison_id' => $request->mode_livraison_id,
            'date_livraison' => Carbon::now()
        ]);
        $articles = $commande->articles;

        $total = 0;

        foreach($articles as $article)
        {
            $total += $article->price * $commande->articles()->where('article_id', $article->id)->first()->pivot->quantity;
        }

        $frais_livraison = $livraison->mode_livraison->frais;

        $facture = Facture::create([
            'commande_id' => $commande->id,
            'date_facture' => Carbon::now(),
            'base_ht' => $total,
            'tva' => 0,
            'remise' => 0,
            'total_ht' => $total,
            'total_ttc' => $total + $frais_livraison,
        ]);

        return view('factures.index',compact('articles','livraison', 'facture','commande'));
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
        //
    }
}
