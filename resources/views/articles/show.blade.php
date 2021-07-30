@extends('layouts.main')

@section('content')
  <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" 
    style="background-image:url({{ URL::to('storage/images/articles/a.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <div class="display-t">
            <div class="display-tc animate-box" data-animate-effect="fadeIn">
              <h1>{{ $article->name }}</h1>
              <!--<h2>
                Free html5 templates Made by <a href="http://freehtml5.co" target="_blank">freehtml5.co</a>
              </h2>-->
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
          <a 
            href="/articles/{{ $article->id }}/edit" 
            class="btn btn-primary btn-outline btn-lg float-right"
          >
            Edit
          </a>
        </p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 animate-box">
          <div class="owl-carousel owl-carousel-fullwidth product-carousel">
            @foreach($images as $image)
              <div class="item">
                <div class="active text-center">
                  <figure>
                    <img 
                      src="{{ URL::to('/storage/images/articles/'.$image->image) }}" 
                      alt="user"
                    >
                  </figure>
                </div>
              </div>
            @endforeach
          </div>
          <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
              <h2>{{ $article->name }}</h2>
              <p>
                <a href="#" class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
                <a href="#" class="btn btn-primary btn-outline btn-lg">Compare</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="fh5co-tabs animate-box">
            <ul class="fh5co-tab-nav">
              <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Product Details</span></a></li>
              <li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li>
              <li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Feedback &amp; Ratings</span></a></li>
            </ul>

            <!-- Tabs -->
            <div class="fh5co-tab-content-wrap">

              <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                <div class="col-md-10 col-md-offset-1">
                  <span class="price">Prix: {{ $article->price }}DH</span>
                  <h2>{{ $article->name }}</h2>
                  <p>{{ $article->description }}</p>

                  <!--<p>Ullam dolorum iure dolore dicta fuga ipsa velit veritatis molestias totam fugiat soluta accusantium omnis quod similique placeat at. Dolorum ducimus libero fuga molestiae asperiores obcaecati corporis sint illo facilis.</p>-->


                </div>
              </div>

              <div class="fh5co-tab-content tab-content" data-tab-content="2">
                <div class="col-md-10 col-md-offset-1">
                  <h3>Product Specification</h3>
                  <ul>
                    <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius</li>
                    <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi</li>
                    <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                    <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</li>
                  </ul>
                  <ul>
                    <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius</li>
                    <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi</li>
                    <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                    <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</li>
                  </ul>
                </div>
              </div>

              <div class="fh5co-tab-content tab-content" data-tab-content="3">
                <div class="col-md-10 col-md-offset-1">
                  <h3>Happy Buyers</h3>
                  <div class="feed">
                    <div>
                      <blockquote>
                        <p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>
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
                        <p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>
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
@endsection