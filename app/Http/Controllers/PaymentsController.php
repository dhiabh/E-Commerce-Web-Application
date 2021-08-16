<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Mode_payment;
use App\Models\Commande;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Session;
use Illuminate\Support\Arr;
use Auth;
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


    public function store(Request $request)
    {
        $facture = Auth::user()->commandes()->latest()->first()->facture;
        $payment = new Payment;
        $payment->date_payment = Carbon::now();
        $payment->facture_id = $facture->id;
        $payment->montant_payment = $facture->total_ttc;
        $payment->statut_payment = false;
        $mode_payment = $request->mode;
        $payment->mode_payment_id = Mode_payment::where('name', $mode_payment)->get()->first()->id;
       
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

    public function valider()
    {
        $commande = Commande::where('user_id', Auth::id())->latest()->first();
        $payment = $commande->facture->payment;
        $payment->update([
            'statut_payment' => true
        ]);
        $amount = $payment->montant_payment;
        return view('payments.success', compact('amount'));
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }




}
