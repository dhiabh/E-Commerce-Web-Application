@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card order_table my-5 mx-auto py-4">
                <div class="card-body">
                    <h1 class="mb-5">Choose your payment mode</h1>
                    <form class="mt-5" method="POST" action="{{ route('payments.store', $facture) }}" enctype="multipart/form-data">
                        @csrf
                        @foreach ($modes_payment as $mode)
                            <div>
                                <input class="form-check-input mt-2" name="mode" type="radio" value="{{ $mode->id }}">
                                <label class="form-check-label ml-4">{{ $mode->name }}</label>
                            </div>
                        @endforeach


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
