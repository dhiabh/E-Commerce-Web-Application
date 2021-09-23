<div style="margin-top: 100px" class="row d-flex">
    <div class="container d-flex">
        @foreach ($articles as $article)
                        
                            <div class="product mx-5">
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
                                        <a data-tip="Quick View" data-place="left" href="{{ route('articles.show', $article->id) }}">
                                            <svg>
                                                <use xlink:href="{{ URL::to('images/sprite.svg#icon-eye') }}"></use>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        
                    @endforeach
    </div>
</div>
