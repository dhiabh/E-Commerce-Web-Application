@extends('layouts.main')

@section('content')
 <!--
    <main id="main">
        @if ($panier->nbre_articles == 0)
            <div class="col mx-auto bg-light text-center ">
                <div class="my-5 py-5">
                    <img src="/svg/empty-cart.png">
                </div>

                <h3 class="text-secondary"><strong>Your Card is Empty !</strong></h3>
                <h4 class="text-dark">Explore our categories and discover our best offers!</h4>
                <a href="{{ url('/') }}" class="btn btn-primary m-5"><span class="___class_+?28___">Start Shopping</span> </a>
            </div>


        @else
            <section class="section cart__area">
                <div class="container">
                    <div class="responsive__cart-area">
                        <div class="cart__form">
                            <div class="cart__table table-responsive">
                                <table width="100%" class="table">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>NAME</th>
                                            <th>UNIT PRICE</th>
                                            <th>QUANTITY &nbsp;</th>
                                            <th>TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($panier->articles as $article)
                                            <tr>
                                                <td class="product__thumbnail">
                                                    <img
                                                        src="{{ URL::to('storage/images/articles/' . $article->images()->first()->image) }}">
                                                </td>
                                                <td class="product__name">
                                                    <a
                                                        href="{{ route('articles.show', $article->id) }}">{{ $article->name }}</a>
                                                    <br><br>
                                                    Store: <a href="#">{{ $article->boutique->name }}</a>
                                                </td>
                                                <td class="product__price">
                                                    <div class="price">
                                                        <span class="new__price">{{ $article->price }}$</span>
                                                    </div>
                                                </td>
                                                <td class="product__quantity">
                                                    <form method="POST"
                                                        action="{{ route('paniers.update', $article->id)  }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="quantity{{ $article->id }}" id="quantity"
                                                            class="form-select" aria-label="Default select example"
                                                            onchange="this.form.submit()">

                                                            @for ($i = 1; $i <= 10; $i++)
                                                                <option value="{{ $i }}"
                                                                    {{ $i ==
$panier->articles()->where('article_id', $article->id)->first()->pivot->quantity
    ? 'selected'
    : '' }}>
                                                                    {{ $i }}</option>
                                                            @endfor
                                                        </select>
                                                    </form>
                                                </td>
                                                <td class="product__subtotal">
                                                    <div class="price d-flex">
                                                        <span
                                                            class="new__price">{{ $panier->articles()->where('article_id', $article->id)->first()->pivot->total }}$</span>
                                                        <form method="POST"
                                                            action="{{ route('paniers.destroy', $article->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button href="#" class="btn btn-light remove__cart-item">
                                                                <svg>
                                                                    <use xlink:href="./images/sprite.svg#icon-trash"></use>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
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

                            </div>

                            <div class="cart__totals">
                                <h3>Total: {{ $panier->total }}$</h3>

                                <a href="{{ route('commandes.create') }}">PROCEED TO CHECKOUT</a>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    </main>
-->
<div id="app">
    <panier-index></panier-index>
</div>

@endsection
