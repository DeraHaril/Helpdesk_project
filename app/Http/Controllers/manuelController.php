<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manuelController extends Controller
{
    public function pageManuel(){
        $titre = "Manuel d'utilisation";
        return view("manuel",
            ['titre' => $titre]);
    }

    public function pageListeCatégorieMatériel(){
        $titre = "Catégorie des matériels";
        return view("catégorie_matériels",
            ['titre' => $titre]);
    }

    public function pageListeManuelDispo(){
        $titre = "Liste des Appareils";
        return view("liste_manuel_disponible",
            ['titre' => $titre]);
    }
}
