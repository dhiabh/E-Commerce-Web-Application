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
                        <h1><strong>Votre Commande</strong></h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($articles as $article)
                <div class="d-flex">
                    <div><img style="width: 40%" src="{{ URL::to('/storage/images/articles/'.$article->images()->first()->image) }}" alt=""></div>
                    <div>
                        <div>{{ $article->name }}</div>
                        <div>{{ $article->price }}$</div>
                        <div>Quantité</div>
                    </div>
                </div>
                <hr>
                @endforeach
                
               
               <div class="text-dark"><strong>Sous Total: {{ $facture->total_ht }}$</strong></div>
               <div class="text-dark"><strong>Frais Livraison: {{ $livraison->mode_livraison->frais }}$</strong></div>
               <hr>

            </div>
            <div class="mr-5" style="text-align: right">
                <h3><strong>Total TTC: {{ $facture->total_ttc }}$</strong></h3>
            </div>
            <div>
                <button class="btn btn-success"><a href="{{ route('payments.create', $facture) }}">Continuer</a></button>
            </div>



        </div>
    </div>
@endsection
