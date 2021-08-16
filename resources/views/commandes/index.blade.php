@extends('layouts.main')

@section('content')
    <style>
        #mhdi {
            position: relative;
            left: 150px;
        }

        .col h1,
        h2,
        h3,
        h4 {
            color: #3b3b3b;
        }

        .card-body h3 {
            color: #3b3b3b;
        }

    </style>
    <div class="container mb-5">
        <div class="row mb-5">
            <div class="col mx-auto text-center ">
                <h1><strong>Mes Commandes</strong></h1>
                <h4 class="text-dark">Explorez nos catégories et découvrez nos meilleures offres!</h4>
            </div>
        </div>
        <div id="mhdi">
            <h3 style="color:#3b3b3b;"><strong>Commandes Programmées</strong></h3>
            @foreach ($commandes as $commande)
                <div class="card w-75 bg-light border-dark mb-4">
                    <div class="card-body">
                        <h3 class="card-title mb-5">
                            <strong>{{ $commande->created_at->format('d M Y - H:i:s') }}</strong>
                        </h3>
                        <div class="row d-flex">
                            <div class="col-md-3 text-nowrap">
                                <h4 class="card-text"><strong>Numéro de Commande</strong></h4>
                                <h4 class="card-text">{{ $commande->id }}</h4>
                            </div>
                            <div class="col-md-6 ml-5">
                                <h4 class="card-text"><strong>Livraison à</strong></h4>
                                <h4>{{ $commande->address }}</h4>
                            </div>
                            <div class="col-md-2 ml-auto text-center">
                                <h4><strong>Total</strong></h4>
                                <h4>${{ $commande->total() }}</h4>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="/commandes/{{ $commande->id }}" class="btn btn-primary mr-3">Voir la commande</a>
                            <form method="POST" action="{{ route('commandes.destroy', $commande->id) }}">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-primary-reverse ml-5">Annuler la commande</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
           
        </div>
    </div>
@endsection
