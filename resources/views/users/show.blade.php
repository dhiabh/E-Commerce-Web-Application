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
                @can('belongsToUser', $user)
                    <div class="card-header text-center">

                        <div class="row">
                            <div class="col">
                                <h1><strong>Votre Compte</strong></h1>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-header text-center">

                        <div class="row">
                            <div class="col">
                                <h1><strong>Artisan Page</strong></h1>
                            </div>
                        </div>
                    </div>
                @endcan
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
                                @isset(Auth::user()->state_id)
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $state->name }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endisset

                                <td>{{ $user->adresse }}</td>
                                <td>{{ $user->num_tel }}</td>
                                <td>{{ $user->num_tel_2 }}</td>
                                @can('belongsToUser', $user)
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                </td>
                                @endcan
                            </tr>


                        </tbody>
                    </table>


                    @if (count($boutiques))
                        <table class="table">

                            <thead>
                                @can('belongsToUser', $user)
                                <tr>
                                    <h3><u>Mes Boutiques</u></h3>
                                </tr>
                                @else 
                                <tr>
                                    <h3><u>Boutiques</u></h3>
                                </tr>
                                @endcan
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boutiques as $boutique)
                                    <tr>
                                        <td><a
                                                href="{{ route('boutiques.show', $boutique->id) }}">{{ $boutique->name }}</a>
                                        </td>
                                        <td>{{ $boutique->categorie->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @can('belongsToUser', $user)
                    <a href="{{ route('boutiques.create') }}" class="btn btn-success">Ajouter un Boutique</a>
                    @endcan
                </div>

            </div>

        </div>
    </div>
@endsection
