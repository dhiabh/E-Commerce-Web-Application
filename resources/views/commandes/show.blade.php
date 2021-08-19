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
                                  	
           <hr>

        </div>
        <div class="mr-5" style="text-align: right">
            <h3><strong>Sous Total: {{ $commande->total() }}$</strong></h3>
        </div>
        <div class="d-flex">
            <button class="btn btn-success">
                <a href="/commandes/{{ $commande->id }}/edit">
                    Modifier la commande
                </a>
            </button>

            <form method="POST" action="{{ route('commandes.destroy', $commande->id) }}">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger ">Annuler la commande</button>
            </form>
        </div>
    </div>
</div>
@endsection