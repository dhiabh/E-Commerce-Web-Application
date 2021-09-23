@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="card edit_table mt-5  mx-auto py-4">
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
                        <h1><strong>Shipping Mode</strong></h1>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('livraisons.store') }}">
                    @csrf
                    @foreach (Mode_livraison::all() as $mode_livraison)
                    <div class="form-check ">
                        <input class="form-check-input" type="radio" name="mode_livraison_id" value="{{ $mode_livraison->id }}">
                        <label class="form-check-label ml-4 font-weight-bold" style="color: black">
                            {{ $mode_livraison->name }}
                        </label>
                        <p>
                            {{ $mode_livraison->description }}
                        </p>
                        <h3 class="font-weight-bold"><u>Fees: {{ $mode_livraison->frais }}</u>$</h3>
                      </div>
                      <hr>
                    @endforeach
                        <button class="btn btn-success ">Continue</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
