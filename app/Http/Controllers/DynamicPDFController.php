<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Facture;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

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
        $pdf->loadHTML($this->convert_customer_data_to_html());

        return $pdf->stream();
    }

    public function convert_customer_data_to_html()
    {
        $customer_data = $this->get_customer_data();
        $output = '
        <!DOCTYPE html>
<html lang="en">
  <head>
    <style>
    body {
        background-image: url("E:/Internship_Project/artisanat_e-commerce/public/storage/art.jpg");
        background-repeat: no-repeat;
        background-size: 100%;
        background-color: rgba(255, 255, 255, 0.486);
        background-blend-mode: overlay;
      }
      h1 {
        margin-left: 50px;
      }
      #facture {
        text-align: center;
      }
      .div1 {
        display: flex;
      }
      table,
      th,
      td {
        padding: 15px;
        border: 1px solid black;
        border-collapse: collapse;
      }
      .infos-pers,
      .infos-commande {
        margin-top: 20px;
      }

      .total{
          margin-top: 50px;
      }
      .ttc{
          margin-left: 20px;
      }
    </style>
  </head>
  <body>
    <div class="div1">
      <h1><strong>SHOP.</strong></h1>
      <h1 id="facture">Facture Client</h1>
    </div>
    <hr />
    <div class="infos-pers">
      <h2>Informations Personnelles:</h2>

      <table>
        <tr>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Numéro de Téléphone</th>
          <th>Adresse</th>
          <th>Région</th>
          <th>Ville</th>
        </tr>

        <tr>
          <td>' . $customer_data[0]->nom . '</td>
          <td>' . $customer_data[0]->prenom . '</td>
          <td>' . $customer_data[0]->tel . '</td>
          <td>' . $customer_data[0]->address . '</td>
          <td>' . $customer_data[0]->region . '</td>
          <td>' . $customer_data[0]->ville . '</td>
        </tr>
      </table>
    </div>

    <div class="infos-commande">
      <h2>Commande:</h2>
      <table>
        <tr>
          <th>Boutique</th>
          <th>Article</th>
          <th>Prix Unitaire</th>
          <th>Quantité</th>
          <th>Total</th>
        </tr>';


         foreach ($customer_data[0]->articles as $article)
         { 
             $output .= '
        <tr>
          <td>'. $article->boutique->name .'</td>
          <td>'. $article->name .'</td>
          <td>'. $article->price .'</td>
          <td>
            '. $customer_data[0]->articles()->where("article_id",
            $article->id)->first()->pivot->quantity .'
          </td>
          <td>
            '. $article->price *
            $customer_data[0]->articles()->where("article_id",
            $article->id)->first()->pivot->quantity .'
          </td>
        </tr>';
         }
         $output.= '
        
      </table>
    </div>

    <div class="total">
        <div><h3><strong>Sous Total: '. $customer_data[1]->total_ht .'$</strong></h3></div>
    <div>
      <strong
        ><h3>Frais Livraison: '. $customer_data[2]->mode_livraison->frais
        .'$</h3></strong
      >
    </div>
    </div>
    
    <hr />
    <div>
      <h1 class="ttc"><strong>Total TTC: '. $customer_data[1]->total_ttc .'$</strong></h1>
    </div>
  </body>
</html>

        ';

        return $output;
    }
}
