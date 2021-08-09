<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Mode_payment;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Session;
use Illuminate\Support\Arr;
use App\Http\Controllers\PaymentsController;

//require '../vendor/autoload.php';


class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Facture $facture)
    {
        return view('payments.create')->with('facture', $facture);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addCarte(Payment $payment) {
        return view('cartes.insert')->with('payment', $payment);
    }


    public function store(Request $request, Facture $facture)
    {

        $payment = new Payment;
        $payment->date_payment = Carbon::now();
        $payment->facture_id = 1;
        $payment->montant_payment = 2000;
        $payment->statut_payment = false;
        $mode_payment = $request->mode;
        $payment->mode_payment_id = 1;//Mode_payment::where('name', $mode_payment)->get()->first()->id;

        $payment->save();

        if($mode_payment == 'cash') {
            return view('welcome');
        }
       
        $payment->save();

        Stripe::setApiKey(env('STRIPE_SECRET'));

        header('Content-Type: application/json');

        $intent = PaymentIntent::create([
          'amount' => $payment->montant_payment,
          'currency' => 'usd',
        ]);
        
        $clientSecret = Arr::get($intent, 'client_secret');
        $amount = $payment->montant_payment;

        return view('checkout.index', compact('clientSecret', 'amount'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




}
