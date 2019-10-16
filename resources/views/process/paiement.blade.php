@extends('process')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panier</a></li>
            <li class="breadcrumb-item"><a href="#">Identification</a></li>
            <li class="breadcrumb-item"><a href="">Adresse</a></li>
            <li class="breadcrumb-item active" aria-current="page">Paiement</li>
            <li class="breadcrumb-item"><a href="#">Merci</a></li>
        </ol>
    </nav>
    <main role="main">
        <div class="container">
            <div class="py-5 text-center">
                <i class="fab fa-4x fa-cc-visa"></i>
                <i class="fab fa-4x fa-cc-mastercard"></i>
                <h2>Paiement par Carte Bancaire</h2>
                <h4 class="mt-5">Total à régler: {{$total_a_payer}} € TTC</h4>
            </div>

            <div class="row">
                <div class="col-md-12 order-md-1">
                    <button class="btn btn-success btn-lg btn-block" type="submit">Accéder au paiement sécurisé</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 order-md-1">
                    <a href="{{route('commande_merci')}}" class="btn btn-primary btn-lg btn-block mt-2" type="submit">Payer par chèque</a>
                    <p>Adresse pour envoyer votre règlement: </p>
                    <address>
                        Marie de Ubeda <br>
                        6 rue Nicolas Martin <br>
                        75015 Paris <br>
                    </address>
                </div>
            </div>
        </div>
    </main>
@endsection