@extends('layouts.main')

@section('content')

    @extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="card order_table my-5  mx-auto py-4">
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
                        <h1><strong>Your Order</strong></h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach ($commande->articles as $article)
                    <div class="d-flex">
                        <div><img style="width: 150px"
                                src="{{ URL::to('/storage/images/articles/' . $article->images()->first()->image) }}"
                                alt=""></div>
                        <div class="mx-auto my-auto">
                            <div>Product: <strong>{{ $article->name }}</strong></div>
                            <div>Price: <strong>{{ $article->price }}$</strong></div>
                            <div>Qty:
                                <strong>{{ $commande->articles()->where('article_id', $article->id)->first()->pivot->quantity }}</strong>
                            </div>
                            <div>Subtotal:
                                <strong>{{ $commande->articles()->where('article_id', $article->id)->first()->pivot->total }}$</strong>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>
            <div class="mr-5 mb-3">
                <h3><strong>Total: {{ $commande->total }}$</strong></h3>
            </div>
            <br>
            <div class="d-flex">

                <a class="btn btn-success" href="/commandes/{{ $commande->id }}/edit">
                    Edit Address Informations
                </a>


                <form method="POST" action="{{ route('commandes.destroy', $commande->id) }}">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger ml-5">Delete Order</button>
                </form>
            </div>





        </div>
    </div>
@endsection
