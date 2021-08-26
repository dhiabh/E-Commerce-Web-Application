@extends('layouts.main')

@section('content')
  <!--  @if ($article->images()->count())
        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
            style="background-image:url({{ URL::to('storage/images/articles/' . $article->images()->first()->image) }});">
        @else
            <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-color: #aaa">

    @endif
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>{{ $article->name }}</h1>
                        <h2 class="bg-secondary">
                            Artisan :
                            <a href="/users/{{ $article->boutique->user->id }}">
                                {{ $article->boutique->user->prenom }} {{ $article->boutique->user->nom }}
                            </a>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    <div id="fh5co-product">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <p>
                    @can('belongsToUser', $article)
                        <a href="/articles/{{ $article->id }}/edit" class="btn btn-primary btn-outline btn-lg float-right">
                            Edit
                        </a>
                    @endcan
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth product-carousel">
                        @foreach ($article->images as $image)
                            <div class="item">
                                <div class="active text-center">
                                    <figure>
                                        <img src="{{ URL::to('storage/images/articles/' . $image->image) }}" alt="user"
                                            style="width:800px; height: 500px; margin:auto;">
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>{{ $article->name }}</h2>
                            <a href="/boutiques/{{ $article->boutique->id }}" class="btn btn-primary btn-outline btn-lg">
                                Voir dans la boutique
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="fh5co-tabs animate-box">
                                <ul class="fh5co-tab-nav">
                                    <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i
                                                    class="icon-file"></i></span><span class="hidden-xs">Product
                                                Details</span></a>
                                    </li>
                                    <li><a href="#" data-tab="2"><span class="icon visible-xs"><i
                                                    class="icon-bar-graph"></i></span><span
                                                class="hidden-xs">Specification</span></a></li>
                                    <li><a href="#" data-tab="3"><span class="icon visible-xs"><i
                                                    class="icon-star"></i></span><span class="hidden-xs">Feedback &amp;
                                                Ratings</span></a></li>
                                </ul>

                              
                                <div class="fh5co-tab-content-wrap">

                                    <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                                        <div class="col-md-10 col-md-offset-1">
                                            <span class="price">Prix: {{ $article->price }}DH</span>
                                            <h2>{{ $article->name }}</h2>
                                            <p>{{ $article->description }}</p>
                                        </div>
                                    </div>

                                    <div class="fh5co-tab-content tab-content" data-tab-content="2">
                                        <div class="col-md-10 col-md-offset-1">
                                            <h3>Product Specification</h3>
                                            <ul>
                                                <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                                    adipisci
                                                    dignissimos consectetur magni quas eius</li>
                                                <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit
                                                    soluta
                                                    eligendi</li>
                                                <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                                <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis
                                                    fugit?
                                                    Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                            </ul>
                                            <ul>
                                                <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis
                                                    adipisci
                                                    dignissimos consectetur magni quas eius</li>
                                                <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit
                                                    soluta
                                                    eligendi</li>
                                                <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                                <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis
                                                    fugit?
                                                    Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="fh5co-tab-content tab-content" data-tab-content="3">
                                        <div class="col-md-10 col-md-offset-1">
                                            <h3>Happy Buyers</h3>
                                            <div class="feed">
                                                <div>
                                                    <blockquote>
                                                        <p>Paragraph placeat quis fugiat provident veritatis quia iure a
                                                            debitis
                                                            adipisci dignissimos consectetur magni quas eius nobis
                                                            reprehenderit
                                                            soluta eligendi quo reiciendis fugit? Veritatis tenetur odio
                                                            delectus
                                                            quibusdam officiis est.</p>
                                                    </blockquote>
                                                    <h3>&mdash; Louie Knight</h3>
                                                    <span class="rate">
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                    </span>
                                                </div>
                                                <div>
                                                    <blockquote>
                                                        <p>Paragraph placeat quis fugiat provident veritatis quia iure a
                                                            debitis
                                                            adipisci dignissimos consectetur magni quas eius nobis
                                                            reprehenderit
                                                            soluta eligendi quo reiciendis fugit? Veritatis tenetur odio
                                                            delectus
                                                            quibusdam officiis est.</p>
                                                    </blockquote>
                                                    <h3>&mdash; Joefrey Gwapo</h3>
                                                    <span class="rate">
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                        <i class="icon-star2"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <p>
                    @cannot('belongsToUser', $article)
                        @if (!Auth::user() || !count(Auth::user()->panier->articles->where('id', $article->id)))
                            <form method="GET" action="{{ route('addToPanier', $article->id) }}">
                                @csrf
                                <button class="btn btn-primary btn-outline btn-lg">Add to Cart</button>
                            </form>
                        @endif
                    @endcannot

                    @can('belongsToUser', $article)
                        <a href="{{ route('articles.delete', $article->id) }}"
                            class="btn btn-primary btn-outline btn-lg float-right" style="text-align: center;">
                            Supprimer l'article
                        </a>
                    @endcan
                </p>
            </div>
        </div>
    -->
    <main id="main">
        <div class="container">
          <!-- Products Details -->
          <section class="section product-details__section">
            <div class="product-detail__container">
              <div class="product-detail__left">
                <div class="details__container--left">
                  <div class="product__pictures">
                    <div class="pictures__container">
                      <img class="picture" src="{{ asset('images/products/iPhone/iphone1.jpeg') }}" id="pic1" />
                    </div>
                    <div class="pictures__container">
                      <img class="picture" src="{{ asset('images/products/iPhone/iphone2.jpeg') }}" id="pic2" />
                    </div>
                    <div class="pictures__container">
                      <img class="picture" src="{{ asset('images/products/iPhone/iphone3.jpeg') }}" id="pic3" />
                    </div>
                    <div class="pictures__container">
                      <img class="picture" src="{{ asset('images/products/iPhone/iphone4.jpeg') }}" id="pic4" />
                    </div>
                    <div class="pictures__container">
                      <img class="picture" src="{{ asset('images/products/iPhone/iphone5.jpeg') }}" id="pic5" />
                    </div>
                  </div>
                  <div class="product__picture" id="product__picture">
                    <!-- <div class="rect" id="rect"></div> -->
                    <div class="picture__container">
                      <img src="{{ asset('images/products/iPhone/iphone1.jpeg') }}" id="pic" />
                    </div>
                  </div>
                  <div class="zoom" id="zoom"></div>
                </div>
    
                <div class="product-details__btn">
                  <a class="add" href="#">
                    <span>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-cart-plus"></use>
                      </svg>
                    </span>
                    ADD TO CART</a>
                  <a class="buy" href="#">
                    <span>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-credit-card"></use>
                      </svg>
                    </span>
                    BUY NOW
                  </a>
                </div>
              </div>
    
              <div class="product-detail__right">
                <div class="product-detail__content">
                  <h3>Apple iPhone XR</h3>
                  <div class="price">
                    <span class="new__price">$250.99</span>
                  </div>
                  <div class="product__review">
                    <div class="rating">
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                      </svg>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                      </svg>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                      </svg>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                      </svg>
                      <svg>
                        <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                      </svg>
                    </div>
                    <a href="#" class="rating__quatity">3 reviews</a>
                  </div>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                    a doloribus iste natus et facere?
                    dolor sit amet consectetur adipisicing elit. Sunt
                    a doloribus iste natus et facere?
                  </p>
                  <div class="product__info-container">
                    <ul class="product__info">
                      <li class="select">
                        <div class="select__option">
                          <label for="colors">Color</label>
                          <select name="colors" id="colors" class="select-box">
                            <option value="blue">blue</option>
                            <option value="red">red</option>
                          </select>
                        </div>
                        <div class="select__option">
                          <label for="size">Inches</label>
                          <select name="size" id="size" class="select-box">
                            <option value="6.65">6.65</option>
                            <option value="7.50">7.50</option>
                          </select>
                        </div>
                      </li>
                      <li>
    
                        <div class="input-counter">
                          <span>Quantity:</span>
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
                      </li>
    
                      <li>
                        <span>Subtotal:</span>
                        <a href="#" class="new__price">$250.99</a>
                      </li>
                      <li>
                        <span>Brand:</span>
                        <a href="#">Apple</a>
                      </li>
                      <li>
                        <span>Product Type:</span>
                        <a href="#">Phone</a>
                      </li>
                      <li>
                        <span>Availability:</span>
                        <a href="#" class="in-stock">In Stock (7 Items)</a>
                      </li>
                    </ul>
                    <div class="product-info__btn">
                      <a href="#">
                        <span>
                          <svg>
                            <use xlink:href="./images/sprite.svg#icon-crop"></use>
                          </svg>
                        </span>&nbsp;
                        SIZE GUIDE
                      </a>
                      <a href="#">
                        <span>
                          <svg>
                            <use xlink:href="./images/sprite.svg#icon-truck"></use>
                          </svg>
                        </span>&nbsp;
                        SHIPPING
                      </a>
                      <a href="#">
                        <span>
                          <svg>
                            <use xlink:href="./images/sprite.svg#icon-envelope-o"></use>
                          </svg>&nbsp;
                        </span>
                        ASK ABOUT THIS PRODUCT
                      </a>
                    </div>
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
                  <p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam
                    dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des
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
                  <p>Praesent vestibulum congue tellus at fringilla. Curabitur vitae semper sem, eu convallis est. Cras
                    felis
                    nunc commodo eu convallis vitae interdum non nisl. Maecenas ac est sit amet augue pharetra convallis nec
                    danos dui. Cras suscipit quam et turpis eleifend vitae malesuada magna congue. Damus id ullamcorper
                    neque. Sed vitae mi a mi pretium aliquet ac sed elit. Pellentesque nulla eros accumsan quis justo at
                    tincidunt lobortis denimes loremous. Suspendisse vestibulum lectus in lectus volutpat, ut dapibus purus
                    pulvinar. Vestibulum sit amet auctor ipsum.</p>
                </div>
                <div class="content" id="reviews">
                  <h1>Customer Reviews</h1>
                  <div class="rating">
                    <svg>
                      <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                    </svg>
                    <svg>
                      <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                    </svg>
                    <svg>
                      <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                    </svg>
                    <svg>
                      <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                    </svg>
                    <svg>
                      <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                    </svg>
                  </div>
                </div>
                <div class="content" id="shipping">
                  <h3>Returns Policy</h3>
                  <p>You may return most new, unopened items within 30 days of delivery for a full refund. We'll also pay
                    the return shipping costs if the return is a result of our error (you received an incorrect or defective
                    item, etc.).</p>
                  <p>You should expect to receive your refund within four weeks of giving your package to the return
                    shipper, however, in many cases you will receive a refund more quickly. This time period includes the
                    transit time for us to receive your return from the shipper (5 to 10 business days), the time it takes
                    us to process your return once we receive it (3 to 5 business days), and the time it takes your bank to
                    process our refund request (5 to 10 business days).
                  </p>
                  <p>If you need to return an item, simply login to your account, view the order using the 'Complete
                    Orders' link under the My Account menu and click the Return Item(s) button. We'll notify you via
                    e-mail of your refund once we've received and processed the returned item.
                  </p>
                  <h3>Shipping</h3>
                  <p>We can ship to virtually any address in the world. Note that there are restrictions on some products,
                    and some products cannot be shipped to international destinations.</p>
                  <p>When you place an order, we will estimate shipping and delivery dates for you based on the
                    availability of your items and the shipping options you choose. Depending on the shipping provider you
                    choose, shipping date estimates may appear on the shipping quotes page.
                  </p>
                  <p>Please also note that the shipping rates for many items we sell are weight-based. The weight of any
                    such item can be found on its detail page. To reflect the policies of the shipping companies we use, all
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
              <div class="glide" id="glide_3">
                <div class="glide__track" data-glide-el="track">
                  <ul class="glide__slides latest-center">
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/sumsung/samsung5.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Samsung Galaxy</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$900</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
    
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/iPhone/iphone6.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Apple iPhone 11</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$750</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/sumsung/samsung3.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Samsung Galaxy</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$850</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/iPhone/iphone2.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Apple iPhone 11</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$450</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/headphone/headphone4.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Sony WH-CH510</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$600</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
    
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/sumsung/samsung1.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Samsung Galaxy</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$300</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{asset('images/products/headphone/headphone2.jpeg')}}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Sony WH-CH510</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$300</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/headphone/headphone1.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Sony WH-CH510</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$250</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/iPhone/iphone1.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Apple iPhone XR</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$550</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
    
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
          <!-- Latest Products -->
          <section class="section latest__products">
            <div class="title__container">
              <div class="section__title filter-btn active" data-id="Latest Products">
                <span class="dot"></span>
                <h1 class="primary__title">Latest Products</h1>
              </div>
            </div>
            <div class="container" data-aos="fade-up" data-aos-duration="1200">
              <div class="glide" id="glide_2">
                <div class="glide__track" data-glide-el="track">
                  <ul class="glide__slides latest-center">
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/iPhone/iphone6.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Apple iPhone 11</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$750</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/sumsung/samsung5.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Samsung Galaxy</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$900</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/headphone/headphone4.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Sony WH-CH510</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$600</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/sumsung/samsung3.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Samsung Galaxy</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$850</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/iPhone/iphone2.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Apple iPhone 11</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$450</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/headphone/headphone2.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Sony WH-CH510</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$300</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/sumsung/samsung1.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Samsung Galaxy</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$300</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/headphone/headphone1.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Sony WH-CH510</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$250</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="glide__slide">
                      <div class="product">
                        <div class="product__header">
                          <a href="#"><img src="{{ asset('images/products/iPhone/iphone1.jpeg') }}" alt="product"></a>
                        </div>
                        <div class="product__footer">
                          <h3>Apple iPhone XR</h3>
                          <div class="rating">
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-full"></use>
                            </svg>
                            <svg>
                              <use xlink:href="./images/sprite.svg#icon-star-empty"></use>
                            </svg>
                          </div>
                          <div class="product__price">
                            <h4>$550</h4>
                          </div>
                          <a href="#"><button type="submit" class="product__btn">Add To Cart</button></a>
                        </div>
                        <ul>
                          <li>
                            <a data-tip="Quick View" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-eye"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Wishlist" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-heart-o"></use>
                              </svg>
                            </a>
                          </li>
                          <li>
                            <a data-tip="Add To Compare" data-place="left" href="#">
                              <svg>
                                <use xlink:href="./images/sprite.svg#icon-loop2"></use>
                              </svg>
                            </a>
                          </li>
                        </ul>
                      </div>
    
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
        </div>
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
