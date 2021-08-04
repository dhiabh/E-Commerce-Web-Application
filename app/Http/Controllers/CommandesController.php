<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\LivraisonController;
use App\Models\Commande;
use App\Models\Panier;
use Illuminate\Support\Facades\DB;

class CommandesController extends Controller
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
        //$panier = Panier::find($panier_id);
        //$articles = $panier->articles;
        $panier = auth()->user()->panier;
        return view('commandes.create',compact('panier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        
        $panier = auth()->user()->panier;

        $commande = new Commande;

        $commande->user_id = Auth::id();
        $commande->nom = $request->input("nom");
        $commande->prenom = $request->input("prenom");
        $commande->tel = $request->input("tel");
        $commande->address = $request->input("addresse");
        $commande->region = $request->input("region");
        $commande->ville = $request->input("ville");
        $commande->date_commande = Carbon::now();
        $commande->save();

        $articles = $panier->articles;

        $commande->articles()->sync($articles);

        

       
        

        return redirect()->route('livraisons.create');
        
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
