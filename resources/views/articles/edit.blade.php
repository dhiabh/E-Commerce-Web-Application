@extends('layouts.main')

@section('content')

    <div class="row justify-content-center">
        <div class="card edit_table mt-5 mb-5 mx-auto py-4">
            <div class="card-header">
                Update product
                <a href="{{ route('articles.show', $article->id) }}" class="float-right">Back</a>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label for="boutique" class="col-md-4 col-form-label text-md-right">{{ __('Store') }}</label>

                        <div class="col-md-6">
                            <select name="boutique_id" class="form-control" aria-label="Default select example">
                                <option selected>Choisit un boutique</option>
                                @foreach ($boutiques as $boutique)
                                    <option value="{{ $boutique->id }}"
                                        {{ $article->boutique_id == $boutique->id ? 'selected' : '' }}>
                                        {{ $boutique->name }}</option>
                                @endforeach

                            </select>

                            @error('boutique')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name', $article->name) }}" required autocomplete="name"
                                autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                        <div class="col-md-6">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror"
                                name="price" value="{{ old('price', $article->price) }}" required autocomplete="price"
                                autofocus>

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="quantity"
                            class="col-md-4 col-form-label text-md-right">{{ __('Quantity in stock') }}</label>

                        <div class="col-md-6">
                            <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"
                                name="quantity" value="{{ old('quantity', $article->quantity) }}" required
                                autocomplete="quantity" autofocus>

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
                                class="form-control @error('description') is-invalid @enderror" name="description" required
                                autocomplete="description"
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
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <section class="section latest__products" id="latest">
        <div class="container" data-aos="fade-up" data-aos-duration="1200">
            <div class="text-center my-5">
                <h1>Images</h1>
                <p>Add, Delete images</p>
            </div>
            <form 
            class="my-5 mx-auto"
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
                        <label class="custom-file-label" for="customFile">Choose image</label>
                        @error('image')
                    <strong style="color: red">{{ $message }}</strong>
                @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary text-center" style="">
                        Add Image
                    </button>
                </div>
            </div>
        </form>
        <br>
            <div class="glide" id="glide_5">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides latest-center">
                        @foreach ($article->images as $image)
                            <li class="glide__slide">
                                <div class="product">
                                    <div class="product__header">
                                        <img src="{{ URL::to('storage/images/articles/' . $image->image) }}"
                                            alt="product">
                                    </div>

                                    <ul>
                                        <li>
                                            <a data-tip="Quick View" data-place="left"
                                                href="{{ route('deleteImage', $image) }}">
                                                <svg>
                                                    <use xlink:href="{{ URL::to('images/sprite.svg#icon-trash') }}">
                                                    </use>
                                                </svg>
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>

                <div class="glide__arrows my-5" data-glide-el="controls">
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


@endsection
