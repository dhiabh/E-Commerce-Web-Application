@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="card show_table mt-5 mb-5 mx-auto py-4">
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
                    <h2 class="mr-5 pr-5"><u>Category</u></h2>
                    <h3 class="text-right mx-5 px-5"><strong>{{ $boutique->categorie->name }}</strong></h3>
                    @can('belongsToUser', $boutique)
                        <a href="{{ route('boutiques.edit', $boutique->id) }}" class="ml-5 btn btn-success px-4">Edit</a>
                    @endcan
                </div>
                @if (count($articles))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <h2><u>Products</u></h2>
                            </tr>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity Available</th>
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

                @can('belongsToUser', $boutique)
                    <div class="d-flex">
                        <a href="{{ route('boutiques.articles.create', $boutique->id) }}" class="btn btn-success px-4"> 
                            Add Product
                        </a>
                        <form method="POST" action="{{ route('boutiques.destroy', $boutique->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ml-5 px-4">Delete this Store</button>
                        </form>
                    </div>
                @endcan



            </div>
        </div>
    </div>
@endsection
