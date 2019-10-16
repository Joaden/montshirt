<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/commande/adresse';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    // Identifier un client par le formulaire de login présent sur toutes les pages
    // (sauf process  de commande)
    public function loginClient(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // Vérification des droits (rôle)
            $user = Auth::user();
            if($user->hasRole('admin')) {
                return redirect()->intended(route('admin_index'))
    ->with('success','Bienvenue dans l\' admin du site MonTshirt '.
        Auth::user()->name);
            } else {
                return redirect()->intended(route('homepage'))
                    ->with('success','Bienvenue '.Auth::user()->name);
            }
        } else {
            return redirect(route('login'))->with('error',"T'es qui ?");
        }
    }


}
