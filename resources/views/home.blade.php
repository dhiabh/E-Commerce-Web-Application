@extends('layouts.main')

@section('content')
    <div id="page">


        <aside id="fh5co-hero" class="js-fullheight">
            <div class="flexslider js-fullheight">
                <ul class="slides">
                    @foreach($articles as $article)
                    <li style="background-image:url({{ URL::to('storage/images/articles/'.$article->images()->first()->image) }});">
                        @if($loop->first)
                            <div class="overlay-gradient"></div>
                        @endif
                        <div class="container">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <span class="price">{{ $article->price }}</span>
                                        <h2>{{ $article->name }}</h2>
                                        <p>{{ $article->description }}</p>
                                        <p>
                                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-outline btn-lg">
                                                Purchase Now
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <div id="fh5co-services" class="fh5co-bg-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-credit-card"></i>
                            </span>
                            <h3>Credit Card</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-wallet"></i>
                            </span>
                            <h3>Save Money</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 text-center">
                        <div class="feature-center animate-box" data-animate-effect="fadeIn">
                            <span class="icon">
                                <i class="icon-paper-plane"></i>
                            </span>
                            <h3>Free Delivery</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                there live the blind texts. Separated they live in Bookmarksgrove</p>
                            <p><a href="#" class="btn btn-primary btn-outline">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="fh5co-product">
            <div class="container">
                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <span>Cool Stuff</span>
                        <h2>Articles.</h2>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                            provident. Odit ab aliquam dolor eius.</p>
                    </div>
                </div>
                @foreach(range(0,2) as $j)
                    @if(count($articles2)> 3*$j)
                        <div class="row">
                            @foreach(range(0,2) as $i)
                                @if(3*$j + $i + 1 <= count($articles2))
                                    <div class="col-md-4 text-center animate-box">
                                        <div class="product">
                                            <div class="product-grid" 
                                                 style="background-image:url({{ URL::to('storage/images/articles/'.$articles2[3*$j + $i]->images()->first()->image) }});">
                                                <div class="inner">
                                                    <p>
                                                        @if(Auth::id() != $articles2[3*$j + $i]->boutique->user->id || Auth::guest())
                                                            <a href="{{ route('addToPanier', $articles2[3*$j + $i]->id)}}" class="icon">
                                                                <i class="icon-shopping-cart"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('articles.show', $articles2[3*$j + $i]->id) }}" class="icon">
                                                            <i class="icon-eye"></i>
                                                        </a>

                                                    </p>
                                                </div>
                                            </div>
                                            <div class="desc">
                                                <h3><a href="single.html">{{ $articles2[3*$j + $i]->name }}</a></h3>
                                                <span class="price">${{ $articles2[3*$j + $i]->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
                <form action="{{ route('browse', 1) }}">
                    <div class="form-group row mt-2">
                        <div class="col-md-4 offset-md-5">
                            <button type="submit" class="btn btn-primary">
                                See more Products
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
