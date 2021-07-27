@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="card mx-auto">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>

                @endif
            </div>
            <div class="card-header text-center">
                <div class="row">
                    <div class="col">
                        <h1><strong>Votre Compte</strong></h1>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">

                    <thead>
                        <tr>
                            <h3><u>Informations Personnelles</u></h3>
                        </tr>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Pays</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Numéro de téléphone (2)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->ville->pays->name }}</td>
                            <td>{{ $user->ville->name }}</td>
                            <td>{{ $user->adresse }}</td>
                            <td>{{ $user->num_tel }}</td>
                            <td>{{ $user->num_tel_2 }}</td>

                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>


                    </tbody>
                </table>

                <table class="table">

                    <thead>
                        <tr>
                            <h3><u>Mes Boutiques</u></h3>
                        </tr>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Catégorie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($boutiques as $boutique)
                                <tr>
                                    <td>{{ $boutique->name }}</td>
                                    <td>{{ $boutique->categorie->name }}</td>
                                </tr>
                            @endforeach
                           


                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
