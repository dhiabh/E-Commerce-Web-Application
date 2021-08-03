<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\LivraisonsController;
use App\Models\Commande;

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
    public function create($articles)
    {
        return view('commandes.create')->with('articles', $articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $articles)
    {
        $commande = new Commande;

        $commande->user_id = Auth::id();
        $commande->nom = $request->input("name");
        $commande->prenom = $request->input("prenom");
        $commande->tel = $request->input("tel");
        $commande->address = $request->input("addresse");
        $commande->region = $request->input("region");
        $commande->ville = $request->input("ville");
        $commande->date_commande = Carbon::now();
        $commande->save();

        foreach($articles as $article) {
            $commande->articles->create([
            'commande_id' => $commande->id,
            'article_id' => $article->id,
            ]);
        }

        return redirect()->action(
            [LivraisonsController::class, 'create'],
            ['commande'=> $commande]
        );
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
