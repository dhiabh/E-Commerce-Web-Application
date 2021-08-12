@extends('layouts.main')

@section('content')
<div id="page">
    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 fh5co-heading">
                    <!--<span>ARTISANAUX</span>-->
                    <h3>{{ count($articles) }} articles trouvés pour "{{ $input }}".</h3>
                    <!--<p>{{ count($articles) }} articles trouvés.</p>-->
                </div>
            </div>
            @if(count($articles) > 0)
                @foreach(range(0,2) as $j)
                    @if(count($articles)> 3*$j + 9*($n - 1) )
                        <div class="row">
                            @foreach(range(0,2) as $i)
                                @if(9*($n - 1) + 3*$j + $i + 1 <= count($articles))
                                    <div class="col-md-4 text-center animate-box">
                                        <div class="product">
                                            <div class="product-grid" 
                                                 style="background-image:url({{ URL::to('storage/images/articles/'.$articles[9*($n - 1) + 3*$j + $i]->images()->first()->image) }});">
                                                <div class="inner">
                                                    <p>
                                                        @cannot('belongsToUser', $articles[9*($n -1) + 3*$j + $i])
                                                        <a href="{{ route('addToPanier', $articles[9*($n - 1) + 3*$j + $i]->id)}}" class="icon"><i class="icon-shopping-cart"></i></a>
                                                        @endcannot
                                                        <a 
                                                            href="{{ route('articles.show', $articles[9*($n - 1) + 3*$j + $i]->id)}}" 
                                                            class="icon"
                                                        >
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="desc">
                                                <h3>
                                                    <a href="{{ route('articles.show', $articles[9*($n - 1) + 3*$j + $i]->id)}}">
                                                        {{ $articles[9*($n - 1) + 3*$j + $i]->name }}
                                                    </a>
                                                </h3>
                                                <span class="price">${{ $articles[9*($n - 1) + 3*$j + $i]->price }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
                {{ $input }}
    			<nav aria-label="Page navigation example" style="text-align: center;">
    			  <ul class="pagination">
                    @if($n > 1)
        			    <li class="page-item">
                            <a class="page-link" href="#">
                                Previous 
                            </a>
                        </li>
                    @endif
    			    @foreach(range(1, ceil(count($articles)/9)) as $k)
        			    <li class="page-item">
                            <a class="page-link" href="{{ route('browse.search', ['input' => $input, 'n' => $k ]) }}">
                                {{ $k }}
                            </a>
                        </li>
    			    @endforeach
                    @if(9*$n < count($articles))
        			    <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    @endif
    			  </ul>
    			</nav>
            @endif
        </div>
    </div>
</div>

@endsection