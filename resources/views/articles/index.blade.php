@extends('layouts.main')

@section('content')
<div id="page">
    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                @if(isset($input))
                    <div class="col-md-8 fh5co-heading">
                        <!--<span>ARTISANAUX</span>-->
                        <h3>{{ $count }} articles trouvés pour "{{ $input }}".</h3>
                        @isset($didYouMean)
                            @if($input != $didYouMean)
                                <p>Did you mean {{ $didYouMean }}?</p>
                            @endif
                        @endisset
                    </div>
                @else
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <span>ARTISANAUX</span>
                        <h2>Articles.</h2>
                        <p>Plus de {{ $count }} pièces artisanales</p>
                    </div>
                @endif
            </div>
            @include('articles.tableau', ['articles' => $articles])
			<nav aria-label="Page navigation example" style="text-align: center;">
			  <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>         
              </div>
			</nav>
        </div>
    </div>

@endsection
