<?php

namespace App\Http\Controllers\Shop;

use App\Produit;
use Cart;
use Darryldecode\Cart\CartCondition;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //ajouter un produit au panier
    public function add(Request $request) {
        // Récupérer les infos de la db pour le produit ajouté au panier
        $produit = Produit::find($request->id);
       // echo "panier ajout";
        // Ajouter un produit au panier
        Cart::add(array(
            'id' => $produit->id,
            'name' => $produit->nom,
            'price' => $produit->prix_ht,
            'quantity' => $request->qty,
            'attributes' => array(
                'photo'=>$produit->photo_principale,
                'size'=>$request->size,
                'prix_ttc'=>$produit->prixTTC())
        ));
        // Après l'ajout du produit au panier, on fait une redirection vers la page panier qui liste tous les produits du panier
        return redirect(route('cart_index'))
            ->with('notice',
                'Le produit '.$produit->nom.' a été ajouté au panier');
    }

    // Afficher la page panier
    public function index() {
        // récupérer le contenu du panier
        $produits_cart = Cart::getContent();
//        dd($produits_cart);
        $produits_cart = $produits_cart->sort();

        // Calculer / ajouter la TVA
        $condition = new CartCondition(array(
           'name'=>"TVA 20%",
           'type'=>'tax',
           'target'=>'total',
           'value' => '20%'
        ));

        // Appliquer sur le panier la $condition
        Cart::condition($condition);
        $total_ht_panier = Cart::getSubTotal();
        $total_ttc_panier = Cart::getTotal();
        $tva = $total_ttc_panier - $total_ht_panier;


//        $cartCollection = Cart::getContent();
        return view('cart.index',
            compact('produits_cart','total_ht_panier','total_ttc_panier','tva'));
    }

    // MAJ la quantité du panier
    public function update(Request $request) {
        //dd($request->toto,$request->quantity);
//        die();
        Cart::update($request->id,array(
            'quantity'=>array(
                'relative' => false,
                'value' => $request->quantity
            ))
        );
        return redirect(route('cart_index'));
    }


    // Supprimer un produit du panier
    public function remove(Request $request) {
        $produit = Produit::find($request->id);
        Cart::remove($request->id);
        return redirect(route('cart_index'))
            ->with('success','Le produit '.$produit->nom.' a été supprimé du panier');
    }


//    public function json() {
//        $tab = array('prenom'=>"marie","nom" => "de ubeda","ville"=>"paris");
//        $tab = json_encode($tab);
//        return $tab;
//    }


}
