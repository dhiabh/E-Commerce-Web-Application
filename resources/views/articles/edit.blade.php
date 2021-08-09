@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 style="text-align: center;">Détails de l'article</h2>
            <div class="card">
                <div class="card-header">
                    Modifier l'article
                    <a href="{{ route('articles.show', $article->id) }}" class="float-right">Back</a>
                </div>

                <div class="card-body">
                    <form 
                        method="POST" 
                        action="{{ route('articles.update', $article->id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name"
                                class="col-md-4 col-form-label text-md-right">{{ __('Nom d\'article') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $article->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price"
                                class="col-md-4 col-form-label text-md-right">{{ __('Prix') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price', $article->price) }}" required autocomplete="price" autofocus>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity"
                                class="col-md-4 col-form-label text-md-right">{{ __('Quantité en stock') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    name="quantity" value="{{ old('quantity', $article->quantity) }}" required autocomplete="quantity" autofocus>

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-right">{{ __(' Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="5"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    required autocomplete="description"
                                    autofocus>{{ old('description', $article->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Sauvegarder
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="fh5co-product">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <!--<span>Cool Stuff</span>-->
                <h2>Images.</h2>
                <p>Ajouter, Supprimer des images de l'article.</p>
            </div>
        </div>
        <form 
            method="POST" 
            action="{{ route('images.upload', $article->id) }}"
            enctype="multipart/form-data"
        >
        @csrf
        
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right">
                    Image
                </label>
                <div class="col-md-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="image">
                        <label class="custom-file-label" for="customFile">Choisit une image</label>
                        @error('image')
                    <strong style="color: red">{{ $message }}</strong>
                @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary text-center" style="">
                        Ajouter l'image
                    </button>
                </div>
            </div>
        </form>
        <hr>

        @foreach(range(0,3) as $j)
            @if(count($article->images)> 3*$j)
                <div class="row">
                    @foreach(range(0,2) as $i)
                        @if(3*$j + $i + 1 <= count($article->images))
                            <div class="col-md-4 text-center animate-box">
                                <div class="product">
                                    <div 
                                        class="product-grid" 
                                        style="background-image:url({{ URL::to('storage/'.$article->images[3*$j + $i]->image) }});"
                                    >
                                        <div class="inner">
                                            <p>
                                                <a 
                                                    href="{{ route('deleteImage', $article->images[3*$j + $i]->id) }}" 
                                                    class="icon"
                                                >
                                                    <i class="bi bi-trash"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>

@endsection