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
                        <h1><strong>{{ $boutique->name }}</strong></h1>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="align-items-baseline d-flex mb-5">
                    <h3 class="mr-5 pr-5"><u>Catégorie</u></h3>
                    <h4 class="text-right mx-5 px-5"><strong>{{ $boutique->categorie->name }}</strong></h4>
                    <a href="{{ route('boutiques.edit', $boutique->id) }}" class="ml-5 btn btn-success">Edit</a>
                </div>
                @if (count($articles))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <h3><u>Articles</u></h3>
                            </tr>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantité Disponible</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}">
                                            {{ $article->name }}
                                        </a>
                                    </td>
                                    </a>
                                    <td>{{ $article->price }}$</td>
                                    <td>{{ $article->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif


                <div class="d-flex">
                    <a href="{{ route('boutiques.articles.create', $boutique->id) }}" class="btn btn-success"> Ajouter un
                        Article
                    </a>
                    <form method="POST" action="{{ route('boutiques.destroy', $boutique->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger ml-5">Supprimer ce Boutique</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
@endsection
