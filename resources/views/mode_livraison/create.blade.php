@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="card mx-auto col-9">
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
                        <h1><strong>Mode de Livraison</strong></h1>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('livraisons.store') }}">
                    @csrf
                    @foreach ($modes_livraison as $mode_livraison)
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="mode_livraison_id" value="{{ $mode_livraison->id }}">
                        <label class="form-check-label ml-4" style="color: black">
                            {{ $mode_livraison->name }}
                        </label>
                        <p>
                            {{ $mode_livraison->description }}
                        </p>
                      </div>
                      <hr>
                    @endforeach
                        <button class="btn btn-success ml-5">Continuer</button>
                    </form>
            



            </div>
        </div>
    </div>
@endsection
