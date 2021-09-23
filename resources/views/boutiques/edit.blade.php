@extends('layouts.main')

@section('content')

                <div class="card show_table mt-5 mb-5 mx-auto py-4">
                    <div class="card-header">
                        {{ __('Update Your Store') }}
                        <a href="{{ route('boutiques.show', $boutique->id) }}" class="float-right">Back</a>
                    </div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('boutiques.update', $boutique->id) }}">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group row">
                                <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <select name="categorie_id" class="form-control" aria-label="Default select example">
                                        <option selected>Choisit une catégorie</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}" 
                                                {{ $categorie->id == $boutique->categorie_id ? 'selected' : ''  }}>
                                                {{ $categorie->name }}</option>
                                        @endforeach
                                        
                                      </select>
    
                                    @error('categorie')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Store Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $boutique->name) }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection