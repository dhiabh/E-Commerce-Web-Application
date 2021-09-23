<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            background-color: #F6F6F6;
            margin: 0;
            padding: 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }

        .brand-section {
            background-color: #0d1033;
            padding: 10px 40px;
            height: 60px;
        }

        .logo {
            width: 50%;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-6 {
            width: 50%;
            flex: 0 0 auto;
        }

        .text-white {
            color: #fff;
        }

        .company-details {
            float: right;
            text-align: right;
            margin: auto;
        }

        .body-section {
            padding: 16px;
            border: 1px solid gray;
        }

        .heading {
            font-size: 20px;
            margin-bottom: 08px;
        }

        .sub-heading {
            color: #262626;
            margin-bottom: 05px;
        }

        .client-infos {
            float: right;
            margin: auto;
        }

        table {
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border: 1px solid #111;
            background-color: #f2f2f2;
        }

        table td {
            vertical-align: middle !important;
            text-align: center;
        }

        table th,
        table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }

        .table-bordered {
            box-shadow: 0px 0px 5px 0.5px gray;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid gray;
        }

        .text-right {
            text-align: end;
        }

        .w-20 {
            width: 20%;
        }

        .float-right {
            float: right;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">Handmade Art World</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">173 Résidence RIDA Av ALWAFAA Etage 3, App 5</p>
                        <p class="text-white">Fès, MAROC</p>
                        <p class="text-white">(+212) 06 6180 1175</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{ $customer_data[0]->id }}</h2>
                    <p class="sub-heading">Shipping No. {{ $customer_data[2]->id }}</p>
                    <p class="sub-heading">Date: {{ $customer_data[0]->date_commande }} </p>
                    <p class="sub-heading">Email: {{ auth()->user()->email }} </p>
                </div>
                <div class="col-6">
                    <div class="client-infos">
                        <p class="sub-heading">Full Name: {{ $customer_data[0]->prenom }}
                            {{ $customer_data[0]->nom }}
                        </p>
                        <p class="sub-heading">Address: {{ $customer_data[0]->address }} </p>
                        <p class="sub-heading">Phone Number: {{ $customer_data[0]->tel }} </p>
                        <p class="sub-heading">City, region: {{ $customer_data[0]->ville }},
                            {{ $customer_data[0]->region }} </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Store</th>
                        <th>Item</th>
                        <th class="w-20">Unit Price</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer_data[0]->articles as $article)
                        <tr>
                            <td>{{ $article->boutique->name }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->price }}</td>
                            <td>
                                {{ $customer_data[0]->articles()->where('article_id', $article->id)->first()->pivot->quantity }}
                            </td>
                            <td>
                                {{ $article->price *
    $customer_data[0]->articles()->where('article_id', $article->id)->first()->pivot->quantity }}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right">Subtotal</td>
                        <td>{{ $customer_data[1]->total_ht }}$</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Shipping Fees</td>
                        <td>{{ $customer_data[2]->mode_livraison->frais }}$</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><strong>TOTAL</strong></td>
                        <td><strong>{{ $customer_data[1]->total_ttc }}$</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2021 - Handmade Art World. All rights reserved.
                <a href=" {{ url('/') }} " class="float-right">www.handmadeart.com</a>
            </p>
        </div>
    </div>

</body>

</html>
