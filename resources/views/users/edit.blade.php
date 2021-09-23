@extends('layouts.main')

@section('content')
    <!-- Page Heading -->

        <div class="row ">
                <div class="card edit_table mt-5 mb-5 mx-auto py-4">
                    <h3 class="card-header">
                        {{ __('Update User') }}
                        <a href="{{ route('users.show', $user->id) }}" class="float-right"><small>Back</small></a>
                    </h3>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Last Nmae') }}</label>

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
                                    class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

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
                                <label for="country"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select name="country" id="country" class="form-control"
                                        aria-label="Default select example">
                                        <option selected>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                 @isset($state)
                                                    {{ $country->id == $state->country_id ? 'selected' : ' ' }} 
                                                 @endisset
                                                 >
                                                {{ $country->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state"
                                    class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <select name="state" id="state" class="form-control"
                                        aria-label="Default select example">
                                        <option value="" selected>Select State</option>
                                        @isset($states)
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ $state->id == Auth::user()->state_id ? 'selected' : '' }}>
                                                    {{ $state->name }}</option>
                                             @endforeach
                                        @endisset
                                        
                                    </select>

                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adresse"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text"
                                        class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                                        value="{{ old('adresse') ?? $user->adresse }}" autocomplete="adresse">

                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_tel"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="num_tel" type="text"
                                        class="form-control @error('num_tel') is-invalid @enderror" name="num_tel"
                                        value="{{ old('num_tel') ?? $user->num_tel }}" autocomplete="num_tel">

                                    @error('num_tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="num_tel_2"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Phone Number (2)') }}</label>

                                <div class="col-md-6">
                                    <input id="num_tel_2" type="text"
                                        class="form-control @error('num_tel_2') is-invalid @enderror" name="num_tel_2"
                                        value="{{ old('num_tel_2') ?? $user->num_tel_2 }}" autocomplete="num_tel_2">

                                    @error('num_tel_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class=" form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="link btn btn-primary">
                                        Update User
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $("#country").change(function() {
                let country_id = this.value;
                $.get('/get_states?country=' + country_id, function(data) {
                    $("#state").html(data);
                });
            })
        })
    </script>
@endsection
