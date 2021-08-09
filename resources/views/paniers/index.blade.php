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
                        <h1><strong>Votre Panier ({{ $articles_number }}
                                {{ $articles_number > 1 ? 'articles' : 'article' }})</strong></h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">

                    <thead>

                        <tr>
                            <th scope="col">ARTICLE</th>
                            <th scope="col">QUANTITÉ</th>
                            <th scope="col">PRIX UNITAIRE</th>
                            <th scope="col">SOUS-TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panier->articles as $article)
                            <tr>
                                <td>
                                    <div class="d-flex">

                                        <div>
                                            <div>Vendeur : {{ $article->boutique->name }} </div>
                                            <div>{{ $article->name }}</div>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <form method="POST" action="{{ route('paniers.update', $article->id) }}">
                                        @csrf
                                        @method("PUT")
                                        <select name="quantity{{ $article->id }}" id="quantity" class="form-control"
                                            aria-label="Default select example" onchange="this.form.submit()">
                                            
                                                @for ($i = 1; $i < $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                                    <option value="{{ $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity }}" selected>{{ $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity }}</option>
                                                
                                                @for ($i = $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity + 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor

                                            

                                        </select>
                                    </form>



                                </td>

                                <td>{{ $article->price }}$</td>
                                
                                <td>{{ $article->price * $panier->articles()->where('article_id', $article->id)->first()->pivot->quantity }}$</td>
             
                                <td>
                                    <form method="POST" action="{{ route('paniers.destroy', $article->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger ml-5">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
            <div class="mr-5" style="text-align: right">
                <h3><strong>Total TTC: {{ $total }}$</strong></h3>
            </div>
            <div>

            </div>
            <div class="mr-5" style="text-align: right">
                <button class="md-6 btn btn-secondary"><a href="{{ url('/') }}">POURSUIVRE VOS ACHATS</a></button>
                <button class="md-6 btn btn-success"><a href="{{ route('commandes.create') }}">FINALISER VOTRE
                        COMMANDE</a></button>
            </div>



        </div>
    </div>


@endsection
