<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Barryvdh\DomPDF\Facade as PDF;

class DynamicPDFController extends Controller
{
    public function index()
    {
        $customer_data = $this->get_customer_data();

        return view('dynamic_pdf', compact('customer_data'));
    }

    public function get_customer_data()
    {
        $commande = Commande::latest('id')->first();
        $facture = Facture::where('commande_id', $commande->id)->latest()->first();
        $livraison = Livraison::latest('id')->first();

        $data = [$commande, $facture, $livraison];

        return $data;
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');

        $customer_data = $this->get_customer_data();
        $pdf = PDF::loadView('pdf', compact('customer_data'))->setPaper('a4', 'landscape');
        return $pdf->stream('facture.pdf');

        
    }

    
}
