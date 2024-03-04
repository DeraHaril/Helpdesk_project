<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class dashboardController extends Controller
{
    public function pageDashboard(){
        $nb_ticket_total = DB::select("SELECT count(id) from ticket");
        $nb_ticket_ouvert = DB::select("SELECT count(etat) from ticket where etat = 'ouvert'");
        $nb_ticket_fermé = DB::select("SELECT count(etat) from ticket where etat = 'fermé'");
        $nb_ticket_en_cours = DB::select("SELECT count(etat) from ticket where etat = 'en cours'");
        $nb_ticket_non_résolu = DB::select("SELECT count(etat) from ticket where etat = 'non résolu'");

        foreach($nb_ticket_total as $total){
            $nb_total = $total->count;
        }
        foreach($nb_ticket_ouvert as $ouvert){
            $nb_ouvert = $ouvert->count;
        }
        foreach($nb_ticket_fermé as $fermé){
            $nb_fermé = $fermé->count;
        }
        foreach($nb_ticket_en_cours as $en_cours){
            $nb_en_cours = $en_cours->count;
        }
        foreach($nb_ticket_non_résolu as $non_résolu){
            $nb_non_résolu = $non_résolu->count;
        }

        if($nb_total>0){
            $pourcentage_ticket_ouvert = ($nb_ouvert*100)/$nb_total;
            $pourcentage_ticket_fermé = ($nb_fermé*100)/$nb_total;
            $pourcentage_ticket_en_cours = ($nb_en_cours*100)/$nb_total;
            $pourcentage_ticket_non_résolu = ($nb_non_résolu*100)/$nb_total;
        }
        else{
            $pourcentage_ticket_ouvert = 0;
            $pourcentage_ticket_fermé = 0;
            $pourcentage_ticket_en_cours = 0;
            $pourcentage_ticket_non_résolu = 0;
        }
        $data_percentage = array(
            "P_ouvert" => (int)$pourcentage_ticket_ouvert,
            "P_fermé" => (int)$pourcentage_ticket_fermé,
            "P_en_cours" => (int)$pourcentage_ticket_en_cours,
            "P_non_résolu" => (int)$pourcentage_ticket_non_résolu,
        );
        $data_nb = array(
            "nb_ouvert" => $nb_ouvert,
            "nb_fermé" => $nb_fermé,
            "nb_en_cours" => $nb_en_cours,
            "nb_non_résolu" => $nb_non_résolu,
            "nb_total" => $nb_total,
        );

        //json_encode($data_percentage);
        $titre = "Tableau de bord";

        $nbMaterielInformatique = DB::select("SELECT count(id) from ticket where categorie = 'matériel informatique'");
        $nbReseau = DB::select("SELECT count(id) from ticket where categorie = 'réseau'");
        $nbWeb = DB::select("SELECT count(id) from ticket where categorie = 'Site web'");
        $nbMaterielInformatique = DB::select("SELECT count(id) from ticket where categorie = 'Logiciel'");
        return view('dashboard', [
            'data_dashboard_Percentage' => $data_percentage,
            'data_dashboard_nombre' => $data_nb,
            'titre' => $titre
        ]);
    }
}
