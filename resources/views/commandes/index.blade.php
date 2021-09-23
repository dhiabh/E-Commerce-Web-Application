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
        @if (!$commandes->count())
            <div class="col mx-auto text-center my-5 ">
                <img src="/svg/jumia.svg">
                <p></p>
                <h1>No Orders yet</h1>
                <a class="btn btn-primary mt-4" href="/">Start Shopping</a>
            </div>

        @else
            <div class="row mb-5">
                <div class="col mx-auto text-center my-5 ">
                    <h1><strong>My Orders</strong></h1>
                    <h4 class="text-dark">Explore our categories and discover our best offers!</h4>
                </div>
            </div>
            <div id="mhdi">
                <h3 style="color:#3b3b3b;"><strong>Scheduled Orders:</strong></h3>
                @foreach ($commandes as $commande)
                    <div class="card w-75 bg-light border-dark mb-4">
                        <div class="card-body">
                            <h3 class="card-title mb-5">
                                <strong>{{ $commande->created_at->format('d M Y - H:i:s') }}</strong>
                            </h3>
                            <div class="row d-flex">
                                <div class="col-md-3 text-nowrap">
                                    <h4 class="card-text">Order ID: <strong>{{ $commande->id }}</strong></h4>
                                </div>
                                <div class="col-md-6 ml-5">
                                    <h3 class="card-text">Address: <strong>{{ $commande->address }}</strong></h3>
                                </div>
                                <div class="col-md-2 ml-auto text-center">
                                    <h3>Total: <strong>{{ $commande->total }}$</strong></h3>
                                </div>
                            </div>
                            <div class="d-flex mt-4">
                                <a href="/commandes/{{ $commande->id }}" class="btn btn-primary mr-3">Check your Order</a>
                                <form method="POST" action="{{ route('commandes.destroy', $commande->id) }}">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger ml-5">Delete Order</button>
                                </form>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
@endsection
