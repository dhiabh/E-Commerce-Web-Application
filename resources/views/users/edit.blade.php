@extends('layouts.main')

@section('content')
    <!-- Page Heading -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Update User') }}
                        <a href="{{ route('users.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                        name="nom" value="{{ old('nom', $user->nom) }}" required autocomplete="nom"
                                        autofocus>

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prenom"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ old('prenom', $user->prenom) }}" required autocomplete="prenom"
                                        autofocus>

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email', $user->email) }}" required
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pays" class="col-md-4 col-form-label text-md-right">{{ __('Pays') }}</label>
    
                                <div class="col-md-6">
                                    <select name="pays_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Pays</option>
                                        @foreach ($countries as $pays)
                                            <option value="{{ $pays->id }}" 
                                                {{ $pays->id == $user->ville->pays_id ? 'selected' : ''  }}>
                                                {{ $pays->name }}</option>
                                        @endforeach
                                        
                                      </select>
    
                                    @error('pays')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
    
                                <div class="col-md-6">
                                    <select name="ville_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Ville</option>
                                        @foreach ($villes as $ville)
                                            <option value="{{ $ville->id }}"
                                                {{ $ville->id == $user->ville->id ? 'selected' : '' }}>
                                                {{ $ville->name }}</option>
                                        @endforeach
                                        
                                      </select>
    
                                    @error('ville')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror"
                                        name="adresse" value="{{ old('adresse') ?? $user->adresse }}"
                                        autocomplete="adresse">

                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_tel" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de Téléphone') }}</label>

                                <div class="col-md-6">
                                    <input id="num_tel" type="text" class="form-control @error('num_tel') is-invalid @enderror"
                                        name="num_tel" value="{{ old('num_tel') ?? $user->num_tel }}"
                                        autocomplete="num_tel">

                                    @error('num_tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_tel_2" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de Téléphone (2)') }}</label>

                                <div class="col-md-6">
                                    <input id="num_tel_2" type="text" class="form-control @error('num_tel_2') is-invalid @enderror"
                                        name="num_tel_2" value="{{ old('num_tel_2') ?? $user->num_tel_2 }}"
                                        autocomplete="num_tel_2">

                                    @error('num_tel_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update User') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
