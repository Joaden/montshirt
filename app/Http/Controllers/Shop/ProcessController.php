<?php

namespace App\Http\Controllers\Shop;

use App\Adresse;
use App\Commande;
use App\CommandeProduit;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{

    public function __construct()
    {
        // On applique un middleware 'guest' à SEULEMENT (only) la méthode identification de la class. Les autres méthodes ne sont pas concernées.
        $this->middleware('guest')->only('identification');
        $this->middleware('auth')->except('identification');
    }


    // Page pour s'identifier ou créer un compte client
    public function identification() {
        return view('process.identification');
    }


    // Afficher la page adresse
    public function adresse() {
        $adresse = Auth::user()->adresse;
        return view('process.adresse',compact('adresse'));
    }

    public function adresseStore(Request $request) {
        // Récupérer le user qui est loggé
        $user = Auth::user();
        // Vérifier les données issues du formulaire (champs obligatoires etc.)
        $request->validate([
           'nom' => 'required',
           'telephone'=>'required',
           'adresse'=>'required',
           'ville'=>'required',
           'code_postal'=>'required',
           'pays'=>'required'
        ]);
        // Créer un nouvel objet de type Adresse
        $adresse = new Adresse();
        // hydrater cet objet avec les données du form
//        $adresse->nom = $request->nom;
//        $adresse->prenom = $request->prenom;
        // On remplit avec tous les champs issus du form
        $adresse->fill($request->all());
        // Sauvegarder cet objet dans la DB via l' ORM eloquent
        $adresse->save();
        // Associer l'adresse créée dans la DB au user qui est connecté.
        $user->adresse_id = $adresse->id;
        $user->save();
        // Enfin, on redirigera l'utilisateur vers la page paiement
        return redirect(route('commande_paiement'))
            ->with('notice',"Ayez confiance ;) ");
    }

    // Afficher la page pour payer
    public function paiement() {
        $total_a_payer = Cart::getTotal();
        return view('process.paiement',compact('total_a_payer'));
    }

    // Afficher la page merci
    public function merci(Request $request) {
        // Créer une commande
        $this->createCommande();
        $request->session()->flash('notice', 'N\'oubliez pas d\' envoyer le chèque ... sinon pas de Tshirt :( ');
        return view('process.merci');
    }

    // Fonction privé qui permet de créer une commande (non liée à une route et/ou une vue
    private function createCommande() {
        // Récupérer les infos de la commande grâce au panier
        $total_ht_panier = Cart::getSubTotal();
        $total_ttc_panier = Cart::getTotal();
        $produits = Cart::getContent();
        $tva = $total_ttc_panier - $total_ht_panier;
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Créer l'objet Commande
        $commande = new Commande();
        $commande->taux_tva = 20;
        $commande->total_ht = $total_ht_panier;
        $commande->total_ttc = $total_ttc_panier;
        $commande->tva = $tva;
        $commande->user_id = $user->id;
        $commande->save();

        foreach($produits as $produit) {
            $commande_produit = new CommandeProduit();
            $commande_produit->qte = $produit['quantity'];
            $commande_produit->prix_unitaire_ttc = $produit['attributes']['prix_ttc'];
            $commande_produit->prix_unitaire_ht = $produit['price'];
  $commande_produit->prix_total_ht = $produit['price'] * $produit['quantity'] ;
  $commande_produit->prix_total_ttc = $produit['attributes']['prix_ttc'] * $produit['quantity'] ;
            $commande_produit->commande_id = $commande->id;
            $commande_produit->produit_id = $produit->id;
            $commande_produit->save();

        }

//        $infos = ['attributes'=>['prix_ttc'=>55]];
//        echo $infos['attributes']['prix_ttc'];

    }
}










