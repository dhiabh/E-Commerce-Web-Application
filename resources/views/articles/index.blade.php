@extends('layouts.main')

@section('content')
    <div id="page">
        <div id="fh5co-product">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <span>ARTISANAUX</span>
                        <h2>Articles.</h2>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                            provident. Odit ab aliquam dolor eius.</p>
                    </div>
                </div>

                <div class="row d-flex">
                    @foreach ($articles as $article)
                        <div class="col-md-4 text-center animate-box">
                            <div class="product">
                                <div class="product-grid"
                                    style="background-image:url({{ URL::to('storage/' . $article->images()->first()->image) }});">
                                    <div class="inner">
                                        <p>
                                            @cannot('belongsToUser', $article)
                                                <a href="{{ route('addToPanier', $article->id) }}" class="icon"><i
                                                        class="icon-shopping-cart"></i></a>

                                            @endcannot
                                            <a href="{{ route('articles.show', $article->id) }}" class="icon">
                                                <i class="icon-eye"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3>
                                        <a href="{{ route('articles.show', $article->id) }}">
                                            {{ $article->name }}
                                        </a>
                                    </h3>
                                    <span class="price">${{ $article->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <nav aria-label="Page navigation example" style="text-align: center;">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{ $articles->links() }}
                        </div>
                    </div>
                </nav>


            </div>
        </div>
    </div>

@endsection
