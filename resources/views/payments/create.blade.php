@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form 
                        method="POST" 
                        action="{{ route('payments.store', $facture) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf

						<p>Quel moyen de paiement voulez-vous utiliser?</p>

						<div>
						  <input type="radio" id="carte" name="mode" value="carte_bancaire"
						         checked>
						  <label for="huey">Carte Bancaire</label>
						</div>

						<div>
						  <input type="radio" id="cash" name="mode" value="cash">
						  <label for="dewey">Cash</label>
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