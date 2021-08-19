@extends('layouts.main')

@section('content')
<div id="page">
    <div id="fh5co-product">
        <div class="container fh5co-heading text-center mb-5">
            @if(isset($input))
                @if($count > 0)
                    <h3>{{ $count }} articles trouvés pour "{{ $input }}".</h3>
                @else
                    <img src="/svg/jumia.svg">
                    <p></p>
                    <h3>Aucun article correspond à "{{ $input }}".</h3>
                    <a class="btn btn-primary mt-4" href="/">RETOUR A L'ACCEUIL</a>
                @endif
                @if(strtolower($input) != strtolower($didYouMean))
                    <p>Did you mean {{ $didYouMean }}?</p>
                @endif
            @elseif(isset($fromBrowse))
                <span>ARTISANAUX</span>
                <h2>Articles.</h2>
                <p>Plus de {{ $count }} pièces artisanales.</p>
            @elseif(isset($categorie_name))
                <h1><strong>{{ $categorie_name }}</strong></h1>
                <p>Plus de {{ $count }} pièces artisanales.</p>
            @else
                @if($count > 0)
                    <h3>{{ $count }} articles correspondent à l'image "{{ $input }}".</h3>
                @else
                    <img src="svg/jumia.svg">
                    <p></p>
                    <h3>Aucun article correspond à l'image importée.</h3>
                    <a class="btn btn-primary mt-4" href="/">RETOUR A L'ACCEUIL</a>
                @endif
            @endif
            @include('articles.tableau', ['articles' => $articles])
			
        </div>
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
