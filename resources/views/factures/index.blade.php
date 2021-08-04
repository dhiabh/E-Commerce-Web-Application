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
                <div class="d-flex">
                    <div>Article Image</div>
                    <div>
                        <div>Article Name</div>
                        <div>Article Price</div>
                        <div>Quantité</div>
                    </div>
                </div>
               <hr>
               <div>Sous Total</div>
               <div>Frais Livraison</div>
               <hr>
               <div>Total TTC</div>

            </div>
            <div class="mr-5" style="text-align: right">
                <h3><strong>Total TTC: $</strong></h3>
            </div>
            <div>
                <button class="btn btn-success">
                    <a href="{{ route('payments.create', $facture) }}">
                        Continuer
                    </a>
                </button>
            </div>



        </div>
    </div>
@endsection
