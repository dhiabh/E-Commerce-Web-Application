@extends('layouts.main')

@section('content')
   <!-- <div class="row">
        

        @if ($articles_number == 0)
            <div class="col mx-auto bg-light text-center ">
                <div class="m-5">
                    <img src="/svg/empty-cart.png">
                </div>

                <h3 class="text-secondary"><strong>Votre panier est vide !</strong></h3>
                <h4 class="text-dark">Explorez nos catégories et découvrez nos meilleures offres!</h4>
                <a href="{{ url('/') }}" class="btn btn-primary m-4"><span class="">Commencez vos achats</span> </a>
            </div>


        @else

            <div class="col-md-9 card mx-auto mt-5">
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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($panier->articles as $article)
                                <tr>
                                    <td>
                                        <div class="d-flex">

                                            <div>
                                                <div>Vendeur : <a class="text-success" href="boutiques/{{ $article->boutique->id }}">{{ $article->boutique->name }}</a></div>
                                                <div><a class="text-success" href="articles/{{ $article->id }}">{{ $article->name }}</a></div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('paniers.update', $article->id) }}">
                                            @csrf
                                            @method("PUT")
                                            <select name="quantity{{ $article->id }}" id="quantity" class="form-select"
                                                aria-label="Default select example" onchange="this.form.submit()">

                                                @for ($i = 1; $i <= 10 ;$i++)

                                                    <option value="{{ $i }}" {{ $i == $panier->articles()
                                                        ->where('article_id', $article->id)
                                                        ->first()->pivot->quantity ? "selected" : "" }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </form>



                                    </td>

                                    <td>{{ $article->price }}$</td>

                                    <td>{{ $article->price * $panier->articles()->where('article_id', $article->id)
                                                            ->first()->pivot->quantity }}$
                                    </td>

                                    <td>
                                        <form method="POST" action="{{ route('paniers.destroy', $article->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-5">Delete</button>
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
                <div class="mr-5 d-flex" style="text-align: right">
                    <form action="{{ route('home') }}" >
                        <button class="md-6 btn btn-secondary" type="submit">POURSUIVRE VOS ACHATS</button>
                    </form>

                    <form action="{{ route('commandes.create') }}">
                        <button class="md-6 btn btn-success" type="submit">FINALISER VOTRE COMMANDE</button>
                    </form>
                    
                </div>






            </div>
        @endif
    </div>
-->
<main id="main">
    @if ($articles_number == 0)
            <div class="col mx-auto bg-light text-center ">
                <div class="m-5">
                    <img src="/svg/empty-cart.png">
                </div>

                <h3 class="text-secondary"><strong>Votre panier est vide !</strong></h3>
                <h4 class="text-dark">Explorez nos catégories et découvrez nos meilleures offres!</h4>
                <a href="{{ url('/') }}" class="btn btn-primary m-4"><span class="">Commencez vos achats</span> </a>
            </div>


        @else
    <section class="section cart__area">
        <div class="container">
            <div class="responsive__cart-area">
                <form class="cart__form">
                    <div class="cart__table table-responsive">
                        <table width="100%" class="table">
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th>UNIT PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($panier->articles as $article)
                                <tr>
                                    <td class="product__thumbnail">
                                        <a href="#">
                                            <img src="{{ URL::to('storage/images/articles/' . $article->images()->first()->image) }}" alt="">
                                        </a>
                                    </td>
                                    <td class="product__name">
                                        <a href="#">{{ $article->name }}</a>
                                        <br><br>
                                        <a href="#">{{ $article->boutique->name }}</a>
                                    </td>
                                    <td class="product__price">
                                        <div class="price">
                                            <span class="new__price">{{ $article->price }}$</span>
                                        </div>
                                    </td>
                                    <td class="product__quantity">
                                        <div class="input-counter">
                                            <div>
                                                <span class="minus-btn">
                                                    <svg>
                                                        <use xlink:href="./images/sprite.svg#icon-minus"></use>
                                                    </svg>
                                                </span>
                                                <input type="text" min="1" value="1" max="10" class="counter-btn">
                                                <span class="plus-btn">
                                                    <svg>
                                                        <use xlink:href="./images/sprite.svg#icon-plus"></use>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="product__subtotal">
                                        <div class="price">
                                            <span class="new__price">$250.99</span>
                                        </div>
                                        <a href="#" class="remove__cart-item">
                                            <svg>
                                                <use xlink:href="./images/sprite.svg#icon-trash"></use>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                               
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-btns">
                        <div class="continue__shopping">
                            <a href="/">Continue Shopping</a>
                        </div>
                        <div class="check__shipping">
                            <input type="checkbox">
                            <span>Shipping(+7$)</span>
                        </div>
                    </div>

                    <div class="cart__totals">
                        <h3>Cart Totals</h3>
                        <ul>
                            <li>
                                Subtotal
                                <span class="new__price">$250.99</span>
                            </li>
                            <li>
                                Shipping
                                <span>$0</span>
                            </li>
                            <li>
                                Total
                                <span class="new__price">$250.99</span>
                            </li>
                        </ul>
                        <a href="">PROCEED TO CHECKOUT</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @endif
    <!-- Facility Section -->
    <section class="facility__section section" id="facility">
        <div class="container">
            <div class="facility__contianer">
                <div class="facility__box">
                    <div class="facility-img__container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-airplane"></use>
                        </svg>
                    </div>
                    <p>FREE SHIPPING WORLD WIDE</p>
                </div>

                <div class="facility__box">
                    <div class="facility-img__container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-credit-card-alt"></use>
                        </svg>
                    </div>
                    <p>100% MONEY BACK GUARANTEE</p>
                </div>

                <div class="facility__box">
                    <div class="facility-img__container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                        </svg>
                    </div>
                    <p>MANY PAYMENT GATWAYS</p>
                </div>

                <div class="facility__box">
                    <div class="facility-img__container">
                        <svg>
                            <use xlink:href="./images/sprite.svg#icon-headphones"></use>
                        </svg>
                    </div>
                    <p>24/7 ONLINE SUPPORT</p>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
