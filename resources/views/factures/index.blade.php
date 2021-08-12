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
                    <div><img style="width: 150px" src="{{ URL::to('/storage/'.$article->images()->first()->image) }}" alt=""></div>
                    <div class="ml-5">
                        <div>{{ $article->name }}</div>
                        <div>{{ $article->price }}$</div>
                        <div>Qté: {{ $commande->articles()->where('article_id', $article->id)->first()->pivot->quantity }}</div>
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
                <button class="btn btn-success">
                    <a href="{{ route('payments.create', $facture) }}">
                        Continuer
                    </a>
                </button>

                <button class="btn btn-danger">
                    <a href="{{ url('dynamic_pdf/pdf') }}" target="_blank">
                        Imprimer votre Facture
                    </a>
                </button>
            </div>



        </div>
    </div>
@endsection
