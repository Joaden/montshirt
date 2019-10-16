@extends('shop')

@section('content')
<main role="main">
        <section class="py-5">
            <div class="container">

                <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
                <table class="table table-bordered table-responsive-sm">
                    <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Qte</th>
                        <th>P.U</th>
                        <th>Total TTC</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($produits_cart as $produit)
                    <tr>
                        <td>
                            <img width="110" class="rounded-circle img-thumbnail"
                                 src="{{asset('produits/'.$produit->attributes['photo'])}}" alt="">
                            {{$produit->name}}
                            <br>
     <a href="{{route('cart_remove',['id'=>$produit->id])}}">supprimer</a>
                        </td>
                        <td>
         <form action="{{route('cart_update',['id'=>$produit->id])}}"
                                  method="POST" id="panier_update_{{$produit->id}}">
                                @csrf
                            <input style="display: inline-block"
                                   id="qte" class="form-control col-sm-4"
                                   type="number"
                                   value="{{$produit->quantity}}"
                                   name="quantity">
         </form>
               <button type="submit" form="panier_update_{{$produit->id}}" class="pl-2">
                                <i class="fas fa-sync"></i> </button>

                        </td>
                        <td>
                            {{$produit->attributes['prix_ttc']}}
                        </td>
                        <td>
                            {{$produit->attributes['prix_ttc'] * $produit->quantity}} €
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total HT</td>
                        <td>{{$total_ht_panier}} €</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>TVA (20%)</td>
                        <td>{{$tva}} €</td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td>Total TTC</td>
                        <td>{{$total_ttc_panier}} €</td>
                    </tr>
                    </tfoot>
                </table>
                <input type="text" placeholder="code_promo">

                <a class="btn btn-block btn-outline-dark"
                   href="{{route('commande_identification')}}">Commander</a>
            </div>
        </section>
    </main>
@endsection