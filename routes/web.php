<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//closure > function anonyme


// Route pour afficher la page d'accueil
Route::get('/','Shop\MainController@index')->name('homepage');

// Route pour afficher les produits dans une catégorie
Route::get('/categorie/{id}','Shop\MainController@viewByCategory')->name('voir_produits_par_cat');

// Route pour afficher les produits associés à un tag
Route::get('/tag/{id}','Shop\MainController@viewByTag')->name('voir_produits_par_tag');

// Route pour afficher une page produit en particulier. On passe l'id du produit en param
Route::get('/produit/{id}','Shop\MainController@produit')->name('voir_produit');


// Ajouter un produit au panier
Route::post('/panier/add/{id}','Shop\CartController@add')->name('cart_add');

// Afficher la page panier
Route::get('/panier','Shop\CartController@index')->name('cart_index');

// Mettre à jour la quantité du panier
Route::post('/panier/update/{id}','Shop\CartController@update')->name('cart_update');

// Supprimer un produit du panier
Route::get('/panier/remove/{id}','Shop\CartController@remove')->name('cart_remove');


// Identification "personnalisée"
Route::post('/login/client','Auth\LoginController@loginClient')->name('login_client');


// Process de commande
// Etape 1 > S'identifier
Route::get('/commande/identification','Shop\ProcessController@identification')
    ->name('commande_identification');


// Etape 2 > Afficher la page adresse
Route::get('/commande/adresse','Shop\ProcessController@adresse')->name('commande_adresse');

// Etape 3 > Stocker l'adresse dans la db
Route::post('/commande/adresse','Shop\ProcessController@adresseStore')->name('commande_adresse_store');

// Etape 4 > Page Paiement
Route::get('/commande/paiement','Shop\ProcessController@paiement')->name('commande_paiement');

// Etape 5 > Page Merci
Route::get('/commande/merci','Shop\ProcessController@merci')->name('commande_merci');
//Route::get('/json','Shop\CartController@json');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['check.admin'])->group(function(){
    Route::get('/admin/commandes','Admin\CommandeController@index')
        ->name('admin_index');

    Route::get('/admin/commande/{id}','Admin\CommandeController@show')->name('commande_show');

});














