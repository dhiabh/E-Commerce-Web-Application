@extends('layouts.main')

@section('content')
    <div id="page">
        <div id="fh5co-product">
            <div class="container fh5co-heading text-center my-5">
                @if (isset($input))
                    @if ($count > 0)
                        <h2 class="mt-5">{{ $count }} item(s) found for
                            "<strong>{{ $input }}</strong>".</h2>
                    @else
                        <img src="/svg/jumia.svg">
                        <p></p>
                        <h2>No items matched "<strong>{{ $input }}</strong>".</h2>
                        <a class="btn btn-primary mt-4" href="/">Go To Home</a>
                    @endif
                    @if (strtolower($input) != strtolower($didYouMean))
                        <h2>Did you mean <strong>"{{ $didYouMean }}"</strong>?</h2>
                    @endif
                @elseif(isset($categorie_name))
                    <h1><strong>{{ $categorie_name }}</strong></h1>
                    <p>Plus de {{ $count }} pièces artisanales.</p>
                @else
                    @if ($count > 0)
                        <h2 class="mt-5">{{ $count }} item(s) matched your image.</h2>
                    @else
                        <img src="/svg/jumia.svg">
                        <p></p>
                        <h2>No item matched your image</h2>
                        <a class="btn btn-primary mt-4" href="/">Go To Home</a>
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
