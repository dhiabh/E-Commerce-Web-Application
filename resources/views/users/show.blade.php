@extends('layouts.main')

@section('content')
    <div class="row ">
        <div class="card user_table mt-5 mb-5 mx-auto py-4">
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
                                <h1><strong>Your Account</strong></h1>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-header text-center">

                        <div class="row">
                            <div class="col">
                                <h1><strong>HandArtist Page</strong></h1>
                            </div>
                        </div>
                    </div>
                @endcan
                <div class="col">
                    <table class="table">

                        <thead>
                            <tr>
                                <h3 class="mt-4"><u>Personal Informations</u></h3>
                            </tr>
                            <tr>
                                <th scope="col">First name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Country</th>
                                <th scope="col">City</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Phone Number (2)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->prenom }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->email }}</td>
                                @isset($user->state_id)
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
                                    <a class="link btn btn-secondary" href="{{ route('users.edit', $user->id) }}">Edit</a>
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
                                    <h3><u>My Stores</u></h3>
                                </tr>
                                @else 
                                <tr>
                                    <h3><u>Stores</u></h3>
                                </tr>
                                @endcan
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boutiques as $boutique)
                                    <tr class="mb-5">
                                        <td ><a class="store_link"
                                                href="{{ route('boutiques.show', $boutique->id) }}">{{ $boutique->name }}</a>
                                        </td>
                                        <td>{{ $boutique->categorie->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                    @can('belongsToUser', $user)
                    <a href="{{ route('boutiques.create') }}" class="link btn btn-success">Add Store</a>
                    @endcan
                </div>

            </div>

        </div>
       
    </div>
@endsection
