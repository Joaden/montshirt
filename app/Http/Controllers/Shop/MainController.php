<?php

namespace App\Http\Controllers\Shop;

use App\Category;
use App\Produit;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Cart;
class MainController extends Controller
{
    // Afficher la page d'accueil
    public function index() {

//        echo "salut c'est la page d'accueil !";
        // SELECT * FROM produits
        $produits = Produit::all();

        // Récupérer les résultats (PDO > fetchAll())
        // Compter les résultats
//        $categories = Category::where('is_online',1)->count();
//        dd($categories);
        // ORM intégré > Eloquent
        //compact('produits','categories');
        //  array('produits'=>$produits,
        //                  'categories'=>$categories)
//        return view('shop.index',
//            array('produits'=>$produits,
//                  'categories'=>$categories));

        //ou bien
        return view('shop.index', compact('produits'));

    }

    // Afficher les produits triés par catégorie
    public function viewByCategory(Request $request) {
//        dd($request->all());
       // dd($request->id);
        // SELECT * FROM categories WHERE id = 2
        $categorie = Category::find($request->id);
        //dd($categorie->produits);

        return view('shop.categorie',compact('categorie'));
    }

    // Afficher la page produit
    public function produit(Request $request) {
        // Récupérer le produit consulté dans la DB via Eloquent ORM Laravel
        $produit = Produit::find($request->id);
        // SELECT * FROM produit WHERE id = 1;

//        $tags = $produit->tags;
        // SELECT * FROM tags
        // LEFT JOIN produit_tag ON tags.id = produit_tag.tag_id
        // WHERE produit_tag.produit_id =1;

        return view('shop.produit',compact('produit'));
    }

    public function viewByTag(Request $request) {
        $tag = Tag::find($request->id);
//        $categorie = Tag::find($request->id);
        return view('shop.tag',compact('tag'));
//        return view ('shop.categorie',compact('categorie'));
    }

}
