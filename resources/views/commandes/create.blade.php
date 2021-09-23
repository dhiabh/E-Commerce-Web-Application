@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
            <div class="card edit_table my-5  mx-auto py-4">
                <h3 class="card-header">
                    {{ __('Order Informations') }}
                </h3>
                <div class="card-body">
                    <form 
                        method="POST" 
                        action="{{ route('commandes.store') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">
                                Last Name 
                            </label>

                            <div class="col-md-6">
                                <input name="nom" type="text" class="form-control" value="{{ Auth::user()->nom }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">
                                First Name
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="prenom" class="form-control" value="{{ Auth::user()->prenom }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">
                                Phone Number
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="tel" class="form-control" value="{{ Auth::user()->num_tel }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="addresse" class="col-md-4 col-form-label text-md-right">
                                Address
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="addresse">{{ Auth::user()->adresse }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">
                                Region
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="region" class="form-control" value="{{ Auth::user()->state->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">
                                City
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="ville" class="form-control" value="{{ Auth::user()->state->name }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Continue
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</div>
@endsection