@extends('layouts.main')

@section('content')
    <!-- Hero -->
    <div class="hero">
        <div class="glide" id="glide_1">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($articles as $article)
                        <li class="glide__slide">
                            <div class="hero__center">
                                <div class="hero__left">
                                    <span>Products Made For You With Love!</span>
                                    <h1>{{ $article->name }}</h1>
                                    <p>{{ $article->description }}</p>
                                    <a href="{{ route('articles.show', $article->id) }}"><button
                                            class="hero__btn">SHOP NOW</button></a>
                                </div>
                                <div class="hero__right">
                                    <div class="hero__img-container">
                                        <img class="banner_01"
                                            src="{{ URL::to('storage/images/articles/' . $article->images()->first()->image) }}"
                                            alt="banner2" />
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                @for ($i = 0; $i < $articles->count(); $i++)
                    <button class="glide__bullet" data-glide-dir="={{ $i }}"></button>

                @endfor
            </div>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                    <svg>
                        <use xlink:href="./images/sprite.svg#icon-arrow-left2"></use>
                    </svg>
                </button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                    <svg>
                        <use xlink:href="./images/sprite.svg#icon-arrow-right2"></use>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Main -->
    <main id="main">
        <div class="container">


            <!-- Latest Products -->
            <section class="section latest__products" id="latest">
                <div class="title__container">
                    <div class="section__title active" data-id="Latest Products">
                        <span class="dot"></span>
                        <h1 class="primary__title">Our Products</h1>
                    </div>
                </div>
                <div class="container" data-aos="fade-up" data-aos-duration="1200">
                    <div class="glide" id="glide_3">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides latest-center">
                                @foreach ($articles2 as $article)
                                    <li class="glide__slide">
                                        <div class="product">
                                            <div class="product__header">
                                                <img src="{{ URL::to('storage/images/articles/' . $article->images()->first()->image) }}"
                                                    alt="product">
                                            </div>
                                            <div class="product__footer">
                                                <h3>{{ $article->name }}</h3>
                                                <div class="product__price">
                                                    <h4>{{ $article->price }}$</h4>
                                                </div>
                                                @can('belongsToUser', $article)
                                                    <a href="{{ route('articles.show', $article->id) }}"><button type="submit"
                                                            class="product__btn">View Your own
                                                            Product</button></a>
                                                @else
                                                    @if (!Auth::user() || !count(Auth::user()->panier->articles->where('id', $article->id)))
                                                        <a href="{{ route('addToPanier', $article->id) }}"><button
                                                                type="submit" class="product__btn">Add To
                                                                Cart</button></a>
                                                    @else
                                                        <form method="POST"
                                                            action="{{ route('paniers.destroy', $article->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#"><button type="submit" class="product__btn">Remove from
                                                                    Cart</button></a>
                                                        </form>
                                                    @endif
                                                @endcan

                                            </div>
                                            <ul>
                                                <li>
                                                    <a data-tip="Quick View" data-place="left"
                                                        href="{{ route('articles.show', $article->id) }}">
                                                        <svg>
                                                            <use xlink:href="./images/sprite.svg#icon-eye"></use>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-arrow-left2"></use>
                                </svg>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <svg>
                                    <use xlink:href="./images/sprite.svg#icon-arrow-right2"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            @if (Auth::user())
                <div id="app">
                    <articles-index></articles-index>
                </div>
            @else
                <div id="app">
                    <articles-index></articles-index>
                </div>
            @endif



        </div>
        <!-- PopUp -->
        <div class="popup hide__popup">
            <div class="popup__content">
                <div class="popup__close">
                    <svg>
                        <use xlink:href="./images/sprite.svg#icon-cross"></use>
                    </svg>
                </div>
                <div class="popup__left">
                    <div class="popup-img__container">
                        <img class="popup__img" src="./images/popup.jpg" alt="popup">
                    </div>
                </div>
                <div class="popup__right">
                    <div class="right__content">
                        <h1>Get Discount <span>30%</span> Off</h1>
                        <p>Sign up to our newsletter and save 30% for you next purchase. No spam, we promise!
                        </p>
                        <form action="#">
                            <input type="email" placeholder="Enter your email..." class="popup__form">
                            <a href="#">Subscribe</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endsection
