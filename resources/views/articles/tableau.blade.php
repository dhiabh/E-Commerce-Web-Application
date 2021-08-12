<div class="row d-flex">
    @foreach($articles as $article)
        <div class="col-md-4 text-center animate-box">
            <div class="product">
                <div class="product-grid" 
                     style="background-image:url({{ URL::to('storage/images/articles/'.$article->images()->first()->image) }});">
                    <div class="inner">
                        <p>
                            @cannot('belongsToUser', $article)
                            <a href="{{ route('addToPanier', $article->id)}}" class="icon"><i class="icon-shopping-cart"></i></a>
                            @endcannot
                            <a 
                                href="{{ route('articles.show', $article->id)}}" 
                                class="icon"
                            >
                                <i class="icon-eye"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="desc">
                    <h3>
                        <a href="{{ route('articles.show', $article->id)}}">
                            {{ $article->name }}
                        </a>
                    </h3>
                    <span class="price">${{ $article->price }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>