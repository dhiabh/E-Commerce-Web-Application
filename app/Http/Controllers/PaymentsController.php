<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Mode_payment;

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
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment;
        //$payment->facture_id = 1;
        $payment->date_payment = Carbon::now();
        $payment->montant_payment = (Facture::find($facture_id))->total_ttc;
        $payment->statut_payment = false;
        $mode_payment = $request->mode;
        $payment->mode_payment_id = Mode_payment::where('name', $mode_payment)->get()->id;

        $payment->save();

        if($mode_payment == 'cash') {
            return view('welcome');
        } else {
            return redirect()->action(
                [PaymentController::class, 'addCarte'],
                ['payment_id' => $payment->id]
            );
            /*
                contact with banque api 
            */
            if(true) {
                $payment->save();
                return view('welcome');
            } else {
                return redirect()->back();
        }    
        }


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

    public function addCarte($payment_id) {
        $payment = Payment::find($payment_id);
        return view('payments.add_carte')->with('payment' $payment);
    }
}
