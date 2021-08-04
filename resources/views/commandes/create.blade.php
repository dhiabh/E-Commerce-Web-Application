@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form 
                        method="POST" 
                        action="{{ route('commandes.store') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group row">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">
                                Nom 
                            </label>

                            <div class="col-md-6">
                                <input name="nom" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">
                                Prénom
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="prenom" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">
                                Numéro de tel
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="tel" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="addresse" class="col-md-4 col-form-label text-md-right">
                                Addresse
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="addresse"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="region" class="col-md-4 col-form-label text-md-right">
                                Région
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="region" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">
                                Ville
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="ville" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enregistrer
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