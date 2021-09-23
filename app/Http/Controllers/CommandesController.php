<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\LivraisonController;
use App\Models\Commande;
use App\Models\Panier;

class CommandesController extends Controller
{

    public function index()
    {
        $commandes = Auth::user()->commandes;
        return view('commandes.index', compact('commandes'));
    }


    public function create()
    {
        return view('commandes.create');
    }


    public function store(Request $request )
    {
        
        $panier = auth()->user()->panier;

        $articles = $panier->articles;

        $commande = new Commande;

        $commande->user_id = Auth::id();
        $commande->total = $panier->total;
        $commande->nbre_articles = $panier->nbre_articles;
        $commande->nom = $request->input("nom");
        $commande->prenom = $request->input("prenom");
        $commande->tel = $request->input("tel");
        $commande->address = $request->input("addresse");
        $commande->region = $request->input("region");
        $commande->ville = $request->input("ville");
        $commande->date_commande = Carbon::now();
        $commande->save();

        
        $commande->articles()->sync($articles);
        
        foreach($articles as $article)
        {
            $commande->articles()->where('article_id', $article->id)->first()->pivot->update([
                'quantity' => 
                    $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity,
                'total' =>
                    $panier->articles()->where('article_id', $article->id)->first()->pivot->total
            ]); 
                                        
        }

        
        
        
        return view('livraisons.create');
        
    }


    public function show($id)
    {
        $commande = Commande::find($id);
        if(is_null($commande)) {
            return redirect()->route('home');
        }
        return view('commandes.show')->with('commande', $commande);
    }


    public function edit($id)
    {
        $commande = Commande::find($id);
        if(is_null($commande)) {
            return redirect()->route('home');
        }
        return view('commandes.edit', compact('commande'));
    }


    public function update(Request $request, $id)
    {
        $commande = Commande::find($id);
        if(is_null($commande)) {
            return redirect()->route('home');
        }

        $commande->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'address' => $request->addresse,
            'region' => $request->region,
            'ville' => $request->ville  
        ]);

        return redirect()->route('commandes.show', $commande->id);
    }


    public function destroy($id)
    {
        $commande = Commande::find($id);
        if(is_null($commande)) {
            return redirect()->route('home');
        }
        $commande->articles()->detach();
        $commande->livraisons()->detach();
        $commande->delete();
        return redirect()->route('commandes.index');
    }
}
