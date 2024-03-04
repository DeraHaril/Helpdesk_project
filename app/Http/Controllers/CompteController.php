<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompteController extends Controller
{
    public function accueil(Request $request){
        $titre = 'Accueil';
        //dump($request->session()->all());
        return view('accueil',
            ['titre' => $titre]
        );
    }


    public function deconnexion(Request $request){
        Auth::logout();
        $request->session()->forget(['id', 'nom', 'numero_telephone', 'email', 'profession']);
        return redirect('/');
    }
}
