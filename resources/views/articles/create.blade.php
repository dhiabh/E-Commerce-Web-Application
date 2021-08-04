@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">
                    'Ajouter un Article'
                    <a href="{{ route('boutiques.show', $boutique_id) }}" class="float-right">Back</a>
                </div>

                <div class="card-body">
                    <form 
                        method="POST" 
                        action="{{ route('boutiques.articles.store', $boutique_id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                Nom d'article 
                            </label>

                            <div class="col-md-6">
                                <input name="name" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">
                                Prix
                            </label>
                            <div class="col-md-6">
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">
                                Quantité en stock
                            </label>
                            <div class="col-md-6">
                                <input type="number" name="quantity" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">
                                Description
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">
                                Image
                            </label>
                            <div class="col-md-6">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image" required>
                                    <label class="custom-file-label" for="customFile">Choisit une image</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Ajouter
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

