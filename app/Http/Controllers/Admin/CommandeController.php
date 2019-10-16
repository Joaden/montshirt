<?php

namespace App\Http\Controllers\Admin;

use App\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommandeController extends Controller
{
    // page pour lister les commandes du site
    public function index() {
        $commandes = Commande::all();
//        return view('admin.commande.index',compact('commandes'));
        return view('admin.commande.index',array('commandes'=>$commandes));
    }

    public function show(Request $request) {
        $commande = Commande::find($request->id);
        return view('admin.commande.show',compact('commande'));
    }

}
