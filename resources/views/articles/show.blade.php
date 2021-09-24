@extends('layouts.main')

@section('content')
    <style>
        h1 {
            font-size: 4rem;
        }

    </style>
    
    <main id="main">
        <div class="container">
            <!-- Products Details -->
            <section class="section product-details__section">
                <div class="product-detail__container align-items-center">
                    <div class="product-detail__left">
                        <div class="details__container--left">
                            <div class="product__pictures">
                                @foreach ($article->images as $image)
                                    <div class="pictures__container">
                                        <img class="picture"
                                            src="{{ URL::to('storage/images/articles/' . $image->image) }}"
                                            id="{{ $image->image }}" />
                                    </div>
                                @endforeach


                            </div>
                            <div class="product__picture" id="product__picture">
                                <div class="picture__container">
                                    <img src="{{ URL::to('storage/images/articles/' . $article->images()->first()->image) }}"
                                        id="pic" />
                                </div>
                            </div>
                            <div class="zoom" id="zoom"></div>
                        </div>

                        <div class="product-details__btn">
                            @cannot('belongsToUser', $article)

                                @if (!Auth::user() || !count(Auth::user()->panier->articles->where('id', $article->id)))
                                    <a class="mx-auto" href="{{ route('addToPanier', $article->id) }}"><button
                                            class="product__btn">Add To
                                            Cart</button></a>
                                @else
                                    <form method="POST" action="{{ route('paniers.destroy', $article->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a class="mx-auto"><button type="submit" class="product__btn px-5 py-auto">Remove
                                                from
                                                Cart</button></a>
                                    </form>
                                @endif
                            @endcannot
                            <a class=" mx-auto"
                                href="{{ route('boutiques.show', $article->boutique->id) }}"><button
                                    class="product__btn">Go to Store</button>

                            </a>
                        </div>
                    </div>

                    <div class="product-detail__right px-auto">
                        <div class="product-detail__content">
                            <h1>{{ $article->name }}</h1>
                            <div class="price">
                                <span class="new__price">{{ $article->price }}$</span>
                            </div>

                            <p>
                                {{ $article->description }}
                            </p>
                            <h3>HandArtist: <a class="text-dark"
                                    href="{{ route('users.show', $article->boutique->user->id) }}">{{ $article->boutique->user->prenom }}
                                    {{ $article->boutique->user->nom }}</a></h3>
                            <div class="d-flex">
                                @can('belongsToUser', $article)
                                    <a href="/articles/{{ $article->id }}/edit" class="btn btn-success mr-3 px-5 ">
                                        Edit
                                    </a>
                                    <a href="{{ route('articles.delete', $article->id) }}" class="btn btn-danger  ml-3 px-5">
                                        Delete this product
                                    </a>
                                @endcan
                            </div>

                        </div>
                    </div>
                </div>

                <div class="product-detail__bottom">
                    <div class="title__container tabs">

                        <div class="section__titles category__titles ">
                            <div class="section__title detail-btn active" data-id="description">
                                <span class="dot"></span>
                                <h1 class="primary__title">Description</h1>
                            </div>
                        </div>

                        <div class="section__titles">
                            <div class="section__title detail-btn" data-id="reviews">
                                <span class="dot"></span>
                                <h1 class="primary__title">Reviews</h1>
                            </div>
                        </div>

                        <div class="section__titles">
                            <div class="section__title detail-btn" data-id="shipping">
                                <span class="dot"></span>
                                <h1 class="primary__title">Shipping Details</h1>
                            </div>
                        </div>
                    </div>

                    <div class="detail__content">
                        <div class="content active" id="description">
                            <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque
                                diam
                                dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis
                                drostique des
                                commodo pharetras loremos.Donec pretium egestas sapien et mollis.
                            </p>
                            <h2>Sample Unordered List</h2>
                            <ul>
                                <li>Comodous in tempor ullamcorper miaculis</li>
                                <li>Pellentesque vitae neque mollis urna mattis laoreet.</li>
                                <li>Divamus sit amet purus justo.</li>
                                <li>Proin molestie egestas orci ac suscipit risus posuere loremous</li>
                            </ul>
                            <h2>Sample Ordered Lista</h2>
                            <ol>
                                <li>Comodous in tempor ullamcorper miaculis</li>
                                <li>Pellentesque vitae neque mollis urna mattis laoreet.</li>
                                <li>Divamus sit amet purus justo.</li>
                                <li>Proin molestie egestas orci ac suscipit risus posuere loremous</li>
                            </ol>
                            <h2>Sample Paragraph Text</h2>
                            <p>Praesent vestibulum congue tellus at fringilla. Curabitur vitae semper sem, eu convallis est.
                                Cras
                                felis
                                nunc commodo eu convallis vitae interdum non nisl. Maecenas ac est sit amet augue pharetra
                                convallis nec
                                danos dui. Cras suscipit quam et turpis eleifend vitae malesuada magna congue. Damus id
                                ullamcorper
                                neque. Sed vitae mi a mi pretium aliquet ac sed elit. Pellentesque nulla eros accumsan quis
                                justo at
                                tincidunt lobortis denimes loremous. Suspendisse vestibulum lectus in lectus volutpat, ut
                                dapibus purus
                                pulvinar. Vestibulum sit amet auctor ipsum.</p>
                        </div>
                        <div class="content" id="reviews">
                            <h1>Customer Reviews</h1>
                            <div class="rating">
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-star-full') }}"></use>
                                </svg>
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-star-full') }}"></use>
                                </svg>
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-star-full') }}"></use>
                                </svg>
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-star-full') }}"></use>
                                </svg>
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-star-empty') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="content" id="shipping">
                            <h3>Returns Policy</h3>
                            <p>You may return most new, unopened items within 30 days of delivery for a full refund. We'll
                                also pay
                                the return shipping costs if the return is a result of our error (you received an incorrect
                                or defective
                                item, etc.).</p>
                            <p>You should expect to receive your refund within four weeks of giving your package to the
                                return
                                shipper, however, in many cases you will receive a refund more quickly. This time period
                                includes the
                                transit time for us to receive your return from the shipper (5 to 10 business days), the
                                time it takes
                                us to process your return once we receive it (3 to 5 business days), and the time it takes
                                your bank to
                                process our refund request (5 to 10 business days).
                            </p>
                            <p>If you need to return an item, simply login to your account, view the order using the
                                'Complete
                                Orders' link under the My Account menu and click the Return Item(s) button. We'll notify you
                                via
                                e-mail of your refund once we've received and processed the returned item.
                            </p>
                            <h3>Shipping</h3>
                            <p>We can ship to virtually any address in the world. Note that there are restrictions on some
                                products,
                                and some products cannot be shipped to international destinations.</p>
                            <p>When you place an order, we will estimate shipping and delivery dates for you based on the
                                availability of your items and the shipping options you choose. Depending on the shipping
                                provider you
                                choose, shipping date estimates may appear on the shipping quotes page.
                            </p>
                            <p>Please also note that the shipping rates for many items we sell are weight-based. The weight
                                of any
                                such item can be found on its detail page. To reflect the policies of the shipping companies
                                we use, all
                                weights will be rounded up to the next full pound.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Related Products -->
            <section class="section related__products">
                <div class="title__container">
                    <div class="section__title filter-btn active">
                        <span class=" dot"></span>
                        <h1 class="primary__title">Related Products</h1>
                    </div>
                </div>
                <div class="container" data-aos="fade-up" data-aos-duration="1200">
                    <div class="glide" id="glide_5">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides latest-center">
                                @foreach ($article->boutique->categorie->boutiques as $boutique)
                                    @foreach ($boutique->articles as $article)
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
                                                        <a href="{{ route('articles.show', $article->id) }}"><button
                                                                type="submit" class="product__btn">View Your own
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
                                                                <a href="#"><button type="submit" class="product__btn">Remove
                                                                        from
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
                                                                <use xlink:href="{{ URL::to('images/sprite.svg#icon-eye') }}"></use>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach

                            </ul>
                        </div>

                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<">
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-arrow-left2') }}"></use>
                                </svg>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-arrow-right2') }}"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Latest Products -->
            <section class="section latest__products" id="latest">
                <div class="title__container">
                    <div class="section__title active" data-id="Latest Products">
                        <span class="dot"></span>
                        <h1 class="primary__title">Latest Products</h1>
                    </div>
                </div>
                <div class="container" data-aos="fade-up" data-aos-duration="1200">
                    <div class="glide" id="glide_3">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides latest-center">
                                @foreach ($articles as $article)
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
                                                    <a data-tip="Quick View" data-place="left" href="{{ route('articles.show', $article->id) }}">
                                                        <svg>
                                                            <use xlink:href="{{ URL::to('images/sprite.svg#icon-eye') }}"></use>
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
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-arrow-left2') }}"></use>
                                </svg>
                            </button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">
                                <svg>
                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-arrow-right2') }}"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>

    <script>
        const picContainer = document.querySelector(".product__pictures");
        const zoom = document.getElementById("zoom");
        const pic = document.getElementById("pic");

        // Active Picture
        let picActive = 1;
        
        ["mouseover", "touchstart"].forEach(event => {
            if (picContainer) {
                picContainer.addEventListener(event, e => {
                    const target = e.target.closest("img");
                    if (!target) return;
                    const id = target.id;
                    changeImage(`../storage/images/articles/${id}`, id);
                });
            }
        });

        // change active image
        const changeImage = (imgSrc, n) => {
            // change the main image
            pic.src = imgSrc;
            // change the background-image
            zoom.style.backgroundImage = `url(${imgSrc})`;
        };
    </script>

@endsection
