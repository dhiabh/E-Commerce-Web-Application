@extends('layouts.main')

@section('content')
<div class="row">
    <div class="card mx-auto">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="card-header text-center">
            <div class="row">
                <div class="col">
                    <h1><strong>Commande N° {{ $commande->id }}</strong></h1>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($commande->articles as $article)
            <div class="d-flex">
                <div><img style="width: 150px" src="{{ URL::to('/storage/images/articles/'.$article->images()->first()->image) }}" alt=""></div>
                <div class="ml-5">
                    <div>{{ $article->name }}</div>
                    <div>{{ $article->price }}$</div>
                    <div>Qté: {{ $commande->articles()->where('article_id', $article->id)->first()->pivot->quantity }}</div>
                </div>
            </div>
            <hr>
            @endforeach
                       
           <div class="text-dark"><strong>Sous Total: ${{ $commande->articles()->sum('price') }}$</strong></div>
           <div class="text-dark">
           		<strong>Frais Livraison: $1200</strong>
           		</div>
           	
           <hr>

        </div>
        <div class="mr-5" style="text-align: right">
            <h3><strong>Total TTC: {{ $commande->articles()->sum('price') }}$</strong></h3>
        </div>
        <div>
            <button class="btn btn-success">
                <a href="/commandes/{{ $commande->id }}/edit">
                    Modifier la commande
                </a>
            </button>

            <button class="btn btn-danger">
                <a href="#" target="_blank">
                    Annuler la commande
                </a>
            </button>
        </div>
    </div>
</div>
@endsection