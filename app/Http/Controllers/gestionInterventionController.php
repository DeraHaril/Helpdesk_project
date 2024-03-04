<?php

namespace App\Http\Controllers;

use App\Models;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Haruncpi\LaravelIdGenerator\IdGenerator;

use PDF;

class gestionInterventionController extends Controller
{
    public function detailIntervention($idIntervention){

        $detailIntervention = DB::select("SELECT intervention.id, id_ticket, date_debut_intervention, date_fin_intervention, intervention.id_equipe, nature_intervention, observation, etat_apres_intervention, date_creation_fiche
        from intervention,equipe, intervenant
            where intervention.id_equipe = equipe.id
            and intervention.id_intervenant = intervenant.id_intervenant
            and intervention.id = '$idIntervention'");

        foreach($detailIntervention as $intervention){
            $id_equipe = $intervention->id_equipe;
        }

        $responsable_ticket = DB::select("SELECT intervention.id, id_ticket, nom_client, nom_intervenant
        from intervention,ticket, intervenant, client
            where intervention.id_ticket = ticket.id
			and ticket.id_client = client.id
            and intervention.id_intervenant = intervenant.id_intervenant
            and intervention.id = '$idIntervention'
            group by client.id, intervention.id, intervenant.nom_intervenant");


        $detailEquipe = DB::select("SELECT detail_equipe.id, detail_equipe.id_equipe, nom_intervenant
        from detail_equipe, equipe, intervenant
            where detail_equipe.id_intervenant = intervenant.id_intervenant
            and detail_equipe.id_equipe = equipe.id
            and detail_equipe.id_equipe = '$id_equipe'");

        foreach($detailEquipe as $equipe){
            $listeIntervenant[] = $equipe->nom_intervenant;
        }
        $titre = "Détail de l'intervention";
        return view('detailIntervention',[
            'detailIntervention' => $detailIntervention,
            'listeIntervenants' => $listeIntervenant,
            'responsable_ticket' => $responsable_ticket,
            'titre' => $titre,
            'id_intervention' => $idIntervention
        ]);
    }

    public function pageCréationIntervention($id_ticket){
        $titre = "Création de fiche d'intervention";
        $liste_intervenants = DB::select("SELECT * from intervenant");
        return view('creationFicheIntervention',[
            'titre' => $titre,
            'intervenant' => $liste_intervenants,
            'id_ticket' => $id_ticket
            ]);
    }

    public function insertionIntervention($id_ticket){
        request()->validate([
            'intervenant' => ['required'],
            'date_debut_intervention' => ['required'],
            'date_fin_intervention' => ['required'],
            'nature_intervention' => ['required'],
            'etat' => ['required'],
            'observation' => ['required']
        ]);

        date_default_timezone_set('Indian/Antananarivo');

        $nom_equipe = request('nom_equipe');
        $configEquipe = ['table'=>'equipe','length'=>10,'prefix'=>'EQP-'];
        $id_equipe = IdGenerator::generate($configEquipe);
        $equipe = Models\Equipe::create([
            'id' => $id_equipe
        ]);
        //dd($equipe);

        $liste_intervenant = request('intervenant');
        $aproposEquipe = DB::select("SELECT * from equipe where id = '$id_equipe'");
        foreach($aproposEquipe as $apEquipe){
            $id_equipe_Detail = $apEquipe->id;
        }

        //dd($aproposEquipe);
        $config_detail_Equipe = ['table'=>'detail_equipe','length'=>10,'prefix'=>'DEQ-'];

        for($i=0; $i<count($liste_intervenant); $i++){
            //dump($liste_intervenant[$i]);

            $id_intervenant = DB::select("SELECT id_intervenant from intervenant where nom_intervenant = '$liste_intervenant[$i]'");
            //var_dump($id_intervenant);
            foreach($id_intervenant as $id){
                $id_detail_equipe = IdGenerator::generate($config_detail_Equipe);
                $detail_equipe = Models\Detail_equipe::create([
                    'id' => $id_detail_equipe,
                    'id_equipe' => $id_equipe_Detail,
                    'id_intervenant' => $id->id_intervenant
                ]);
            }
        }

        $date_debut = date("Y-m-d H:i:s", strtotime(request('date_debut_intervention')));
        $date_fin = date("Y-m-d H:i:s", strtotime(request('date_fin_intervention')));
        $date_creation_fiche = date('d/m/Y h:i:s');

        $config_Intervention = ['table'=>'intervention','length'=>10,'prefix'=>'INT-'];
        $id_intervention = IdGenerator::generate($config_Intervention);

        $id_intervenant = session('id');
        $intervention = Models\Intervention::create([
            'id' => $id_intervention,
            'id_ticket' => $id_ticket,
            'date_debut_intervention' => $date_debut,
            'date_fin_intervention' => $date_fin,
            'id_equipe' => $id_equipe,
            'nature_intervention' => request('nature_intervention'),
            'etat_apres_intervention' => request('etat'),
            'observation' => request('observation'),
            'date_creation_fiche' => $date_creation_fiche,
            'id_intervenant' => $id_intervenant
        ]);
        return redirect("intervention-$id_intervention");
    }

    public function genererPDF($idIntervention){
        $detailIntervention = DB::select("SELECT intervention.id, id_ticket, date_debut_intervention, date_fin_intervention, intervention.id_equipe, nature_intervention, observation, etat_apres_intervention, date_creation_fiche
        from intervention,equipe, intervenant
            where intervention.id_equipe = equipe.id
            and intervention.id_intervenant = intervenant.id_intervenant
            and intervention.id = '$idIntervention'");

        foreach($detailIntervention as $intervention){
            $id_equipe = $intervention->id_equipe;
        }

        $responsable_ticket = DB::select("SELECT intervention.id, id_ticket, nom_client, nom_intervenant
        from intervention,ticket, intervenant, client
            where intervention.id_ticket = ticket.id
			and ticket.id_client = client.id
            and intervention.id_intervenant = intervenant.id_intervenant
            and intervention.id = '$idIntervention'
            group by client.id, intervention.id, intervenant.nom_intervenant");


        $detailEquipe = DB::select("SELECT detail_equipe.id, detail_equipe.id_equipe, nom_intervenant
        from detail_equipe, equipe, intervenant
            where detail_equipe.id_intervenant = intervenant.id_intervenant
            and detail_equipe.id_equipe = equipe.id
            and detail_equipe.id_equipe = '$id_equipe'");

        foreach($detailEquipe as $equipe){
            $listeIntervenants[] = $equipe->nom_intervenant;
        }
        $titre = "Fiche d'intervention";

        $pdf = PDF::loadView('ficheIntervention', [
            'detailIntervention' => $detailIntervention,
            'listeIntervenants' => $listeIntervenants,
            'responsable_ticket' => $responsable_ticket,
            'titre' => $titre,
            'id_intervention' => $idIntervention
        ]);
        // download PDF file with download method

        return $pdf->download("Fiche d'intervention.pdf");


    }
}
