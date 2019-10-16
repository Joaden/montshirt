@extends('admin')

@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Commande N° 45</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button class="btn btn-sm btn-outline-secondary">Lister les commandes</button>
                </div>

            </div>
        </div>
        <div class="table-responsive">
            <div class="jumbotron">
                <h1 class="display-6">
                    {{$commande->user->name}}</h1>
                <p class="lead">Adresse de livraison</p>
                <p>{{$commande->user->adresse->adresse}} <br>
                    {{$commande->user->adresse->adresse2}} <br>
                    {{$commande->user->adresse->code_postal}} -
                    {{$commande->user->adresse->ville}} -
                    {{$commande->user->adresse->pays}}</p>
                <p>Numéro de transaction Stripe: </p>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr><th>#</th>
                    <th>Produit</th>
                    <th>Quantité</th>
                    <th>P.U TTC</th>
                    <th class="text-right">Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commande->produits as $produit)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td>
                        <strong>{{$produit->nom}} </strong> <br>
                    </td>
                    <td>{{$produit->pivot->qte}}</td>
                    <td>{{$produit->pivot->prix_unitaire_ttc}} € TTC</td>
                    <td class="text-right"> {{$produit->pivot->prix_total_ttc}} € TTC</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td>Sous-Total HT:</td>
                    <td class="text-right">{{$commande->total_ht}} €</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>TVA({{$commande->taux_tva}}%)</td>
                    <td class="text-right">{{$commande->tva}} € TTC</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>TOTAL</td>
                    <td class="text-right">{{$commande->total_ttc}} € TTC </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </main>
@endsection