@extends('layouts.main')

@section('content')

        <div class="row justify-content-center">
                <div class="card edit_table mt-5 mb-5 mx-auto py-4">
                    <h3 class="card-header">
                        {{ __('Add Store') }}
                        <a href="{{ route('users.show', Auth()->user()->id) }}" class="float-right"><small>Back</small></a>
                    </h3>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('boutiques.store') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
    
                                <div class="col-md-6">
                                    <select name="categorie_id" class="form-control" aria-label="Default select example">
                                        <option selected>Choose the category</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Store') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
@endsection