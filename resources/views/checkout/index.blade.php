@extends('layouts.main')

@section('extra-script')

<script src="https://js.stripe.com/v3/"></script>

@endsection


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="payment-form">
                        <div id="card-element" class="mb-4">
                        </div>

                        <div id="card-errors" role="alert"></div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submit" class="btn btn-primary">
                                    Submit Payment
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

@section('extra-js')

<script>
    var stripe = Stripe('pk_test_51JL3DSLJetNHxQ3207t13nuwhCB1KPvUJJshapsOQATnZn79vA4wK3p9Hf2yi2uUXfXXWdAtLZGRepfJGvRnd7oI006Kw6rFTC');
    document.querySelector("button").disabled = true;
    var elements = stripe.elements();
    var style = {
      base: {
        color: "#32325d",
      }
    };

    var card = elements.create("card", { style: style });
    card.mount("#card-element");
    card.on('change', ({error}) => {
      let displayError = document.getElementById('card-errors');

      if (error) {
        displayError.classList.add('alert', 'alert-warning');
        displayError.textContent = error.message;
      } else {
        displayError.classList.remove('alert', 'alert-warning');
        displayError.textContent = '';
      }
    });

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(ev) {
      ev.preventDefault();
      // If the client secret was rendered server-side as a data-secret attribute
      // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
      stripe.confirmCardPayment("{{ $clientSecret }}", {
        payment_method: {
          card: card,
          billing_details: {
            name: "{{ Auth::user()->prenom }} {{ Auth::user()->nom }}"
          }
        }
      }).then(function(result) {
        if (result.error) {
          // Show error to your customer (e.g., insufficient funds)
          console.log(result.error.message);
        } else {
          // The payment has been processed!
          if (result.paymentIntent.status === 'succeeded') {
            // Show a success message to your customer
            // There's a risk of the customer closing the window before callback
            // execution. Set up a webhook or plugin to listen for the
            // payment_intent.succeeded event that handles any business critical
            // post-payment actions.
            console.log(result.paymentIntent);
            window.location.href = 'http://127.0.0.1:8000/payment-success/' +  "{{ $amount }}".toString();
          }
        }
      });
    });
    
</script>

@endsection

