<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models;
use App\Models\Intervenant;
use App\Models\Client;
use App\Models\Ticket as Ticket;
use DateTime;
use Illuminate\Support\Facades\DB;

use Haruncpi\LaravelIdGenerator\IdGenerator;
        header("Access-Control-Allow-Origin: http://localhost");
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
class gestionTicketController extends Controller
{

    public function listeTicket(Request $request){

        //dump($request->session()->all());
        $ticket = new Models\Ticket;
        //dump($request->session()->all());
        $id_personne = session('id');
        $nom_client = session('nom');
        $client = Client::getClientById($id_personne);
        $intervenant = Intervenant::getIntervenantById($id_personne);

        if($intervenant != null){
            $listeticket = Ticket::getListeTicketsForClient();
        }
        elseif($client != null){
            $listeticket = Ticket::getListeTicketsForIntervenant($nom_client);
        }
        elseif($client != null || $intervenant != null){
            $listeticket = Ticket::getListeTicketforPublic();
        }

        $titre = "Liste des tickets";
        return view('listeTicket',[
            'listeTicket'=>$listeticket,
            'titre' => $titre]
        );
    }

    public function listeticketsClient(){
        $id_personne = session('id');
        $nom_client = session('nom');
        $client = DB::select("SELECT * from client where id = '$id_personne'");
        $intervenant = DB::select("SELECT * from intervenant where id_intervenant = '$id_personne'");
        $nbClient = count($client);
        $nbIntervenant = count($intervenant);
        if($nbClient == 1){
            $listeticket = DB::select("SELECT ticket.id, NOM_CLIENT, DEPARTEMENT, CATEGORIE, CONFIDENTIALITE, ETAT, IMPORTANCE, DATE_AJOUT, SUJET
                from TICKET, CLIENT where CLIENT.ID = TICKET.ID_CLIENT and nom_client = '$nom_client' order by date_ajout desc");
            $titre = "Mes tickets";
        }
        elseif($nbIntervenant == 1){
            return view('accès_interdit_admin');
        }
        return view('mesTickets',[
            'listeTicket'=>$listeticket,
            'titre' => $titre]
        );
    }

    public function detailTicket($idTicket, $nomClient){
        //dump($request->session()->all());
        //dump($idTicket);
        $listeIntervention = DB::select("SELECT intervention.id, id_ticket, date_debut_intervention, date_fin_intervention, intervention.id_equipe, nature_intervention, observation, etat_apres_intervention, date_creation_fiche
        from intervention,equipe
            where intervention.id_equipe = equipe.id
            and id_ticket = '$idTicket'");
        $detailClient = DB::select("SELECT ID,NOM_CLIENT,NUMERO_TELEPHONE,PROFESSION, EMAIL
            FROM CLIENT where NOM_CLIENT = '$nomClient'");
        foreach($detailClient as $client){
            $nom = str_split($client->nom_client);
            $symboleClient = $nom[0];
        }
        //$detailTicket = Ticket::where('id', $idTicket)->get();
        $detailTicket = DB::select("SELECT * from ticket where id = '$idTicket'");
        //dump($detailClient);
        $listeNotes = DB::select("SELECT * from note_ensemble where id_ticket = '$idTicket'
            order by DATE_PUBLICATION asc");

        $ticket_reference_update = DB::select("SELECT id, sujet from ticket where id <> '$idTicket'");
        $titre = "Détail du ticket";

        foreach($detailTicket as $ticket){
            $date_creation_ticket = date_create($ticket->date_ajout);
            date_default_timezone_set('Indian/Antananarivo');
            $date_actuelle = date_create(date('Y/m/d h:i:s'));
            $difference_date = date_diff($date_creation_ticket,$date_actuelle);
            $difference = $difference_date->format("%R%a jours");
            $id_reference_ticket = $ticket->id_reference_ticket;
            if(isset($id_reference_ticket)){
                $reference_ticket = DB::select("SELECT ticket.id, ticket.id_reference_ticket, id_ticket from ticket, detail_reference_ticket
                    where ticket.id = '$idTicket'");
            return view('detailTicket',[
                'listeIntervention'=>$listeIntervention,
                'detailClient'=>$detailClient,
                'detailTicket'=>$detailTicket,
                'listeNotes'=>$listeNotes,
                'titre' => $titre,
                'symbole' => $symboleClient,
                'reference_ticket' => $reference_ticket,
                'ticket_reference_update' => $ticket_reference_update,
                'difference_date' => $difference
            ]);
            }
        }
        return view('detailTicket',[
            'listeIntervention'=>$listeIntervention,
            'detailClient'=>$detailClient,
            'detailTicket'=>$detailTicket,
            'listeNotes'=>$listeNotes,
            'titre' => $titre,
            'symbole' => $symboleClient,
            'ticket_reference_update'  => $ticket_reference_update,
            'difference_date' => $difference
        ]);


    }

    public function pageCreationTicket(){
        if(session('role') == 'intervenant'){
            return view('accès_interdit_admin');
        }
        $ticket = DB::select("SELECT id, sujet from ticket");
        $titre = "Création de ticket";
        return view('creationTicket',[
                'titre' => $titre,
                'ticket' =>$ticket
            ]
        );
    }

    public function traitementInsertionTicket(Request $request){

        request()->validate([
            'sujet' => ['required'],
            'categorie' => ['required'],
            'importance' => ['required'],
            'confidentialite' => ['required'],
            'description' => ['required'],
            'departement' => ['required'],
        ]);

        date_default_timezone_set('Indian/Antananarivo');
        $dateajout = date('d/m/Y h:i:s');

        $config = ['table'=>'ticket','length'=>10,'prefix'=>'TCK-'];
        $id = IdGenerator::generate($config);
        $id_client= $request->session()->get('id');

        $ticket = Models\Ticket::create([
            'id' => $id,
            'categorie' => request('categorie'),
            'confidentialite' => request('confidentialite'),
            'etat' => 'ouvert',
            'importance' => request('importance'),
            'date_ajout' => $dateajout,
            'sujet' => request('sujet'),
            'description' => request('description'),
            'id_client' => $id_client,
            'departement' => request('departement')
        ]);
        $liste_tickets_reference = request('tickets');
        if(isset($liste_tickets_reference)){
            $this->ajout_reference($id);
        }
        return redirect('ticket-personne');
    }

    public function updateEtatTicket($idTicket){
        $etat = request('etat');
        $confidentialite = request('confidentialite');
        if($etat =! null){
            $etat = request('etat');
            $requete = DB::select("UPDATE ticket set etat = '$etat' where id = '$idTicket'");
        }
        $sql_name = DB::select("SELECT nom_client from ticket, client where ticket.id = '$idTicket' and ticket.id_client = client.id");
        $nom = $sql_name[0]->nom_client;
        return redirect("detailticket/$idTicket/$nom");

    }

    public function deleteTicket($idTicket){
        $requeteIntervention = DB::delete("DELETE from intervention where id_ticket = '$idTicket'");
        $requeteNote = DB::delete("DELETE from note where id_ticket = '$idTicket'");
        $requeteTicket_reference = DB::select("SELECT id_reference_ticket from ticket where id = '$idTicket'");
        $detail_reference_ticket = DB::select("SELECT * from detail_reference_ticket where id_ticket = '$idTicket'");
        foreach($detail_reference_ticket as $detail_reference){
            if(isset($detail_reference->id_ticket)){
                DB::delete("DELETE from detail_reference_ticket where id_ticket = '$idTicket'");
            }
        }
        foreach($requeteTicket_reference as $reference){
            if(isset($reference->id_reference_ticket)){
                DB::delete("DELETE from detail_reference_ticket where id_reference_ticket = '$reference->id_reference_ticket'");
                DB::update("UPDATE ticket set id_reference_ticket = null where id = '$idTicket'");
                DB::delete("DELETE from reference_ticket where id = '$reference->id_reference_ticket'");
            }
        }
        $requeteTicket = DB::delete("DELETE from ticket where id = '$idTicket'");
        return redirect('ticket-personne');
    }

    public function supprimerReference($idTicket){
        $requeteTicket_reference = DB::select("SELECT id_reference_ticket from ticket where id = '$idTicket'");
        foreach($requeteTicket_reference as $reference){
            if(isset($reference->id_reference_ticket)){
                DB::delete("DELETE from detail_reference_ticket where id_reference_ticket = '$reference->id_reference_ticket'");
                DB::update("UPDATE ticket set id_reference_ticket = null where id = '$idTicket'");
                DB::delete("DELETE from reference_ticket where id = '$reference->id_reference_ticket'");
            }
        }
    }

    public function creerNote(Request $request, $id_ticket,$nomClient){
        $note = new Models\Note;
        request()->validate([
            'note' => ['required'],
        ]);

        date_default_timezone_set('Indian/Antananarivo');
        $dateajout = date('d/m/Y h:i:s');
        $config = ['table'=>'note','length'=>10,'prefix'=>'NT-'];
        $id = IdGenerator::generate($config);

        $id_personne =  $request->session()->get('id');
        $client = DB::select("SELECT * from client where id = '$id_personne'");
        $intervenant = DB::select("SELECT * from intervenant where id_intervenant = '$id_personne'");
        $nbClient = count($client);
        $nbIntervenant = count($intervenant);

        if($nbClient==1){
            $note = Models\Note::create([
                'id' => $id,
                'note' => request('note'),
                'date_publication' => $dateajout,
                'id_client' => $id_personne,
                'id_intervenant' => null,
                'document' => null,
                'id_ticket' => $id_ticket
            ]);
        }
        elseif($nbIntervenant==1){
            $note = Models\Note::create([
                'id' => $id,
                'note' => request('note'),
                'date_publication' => $dateajout,
                'id_client' => null,
                'id_intervenant' =>  $id_personne,
                'document' => null,
                'id_ticket' => $id_ticket
            ]);
            $ticket = DB::select("SELECT * from ticket where id = '$id_ticket' ");
            if($ticket['etat'] = "ouvert"){
                $requete = DB::select("UPDATE ticket set etat = 'en cours' where id = '$id_ticket'");
            }

        }
        $sql_name = DB::select("SELECT nom_client from ticket, client where ticket.id = '$id_ticket' and ticket.id_client = client.id");
        $nom = $sql_name[0]->nom_client;

        return redirect("detailticket/$id_ticket/$nom");

    }

    public function ajout_reference($id_ticket){
        $config_reference = ['table'=>'reference_ticket','length'=>10,'prefix'=>'RF-'];
        $id_reference = IdGenerator::generate($config_reference);

        //ajout de groupe de référence dans la table reference_ticket
        $reference = Models\reference_ticket::create([
            'id' => $id_reference,
            'id_ticket' => $id_ticket,
        ]);
        //ajout de groupe de référence dans la table ticket
        $requete_update_ticket = DB::update("UPDATE TICKET SET id_reference_ticket = '$id_reference' WHERE id = '$id_ticket'");

        $liste_tickets_reference = request('tickets');
        for($i=0; $i<count($liste_tickets_reference); $i++){
            $config_detail_reference = ['table'=>'detail_reference_ticket','length'=>10,'prefix'=>'DRF-'];
            $id_detail_reference = IdGenerator::generate($config_detail_reference);

            //ajout des tickets référencés dans la table détail_reference_ticket
            $detail_reference = Models\detail_reference_ticket::create([
                'id' => $id_detail_reference,
                'id_reference_ticket' => $id_reference,
                'id_ticket' => $liste_tickets_reference[$i]
            ]);
        }
    }

    public function update_ticket_client($idTicket , $nom_client){
        request()->validate([
            'confidentialite' => ['required'],
        ]);
        $confidentialite = request('confidentialite');
        $DB_confidentialite = DB::update("UPDATE ticket set confidentialite = '$confidentialite' where id = '$idTicket'");
        $reference = request('tickets');
        if(isset($reference)){
            $this->supprimerReference($idTicket);
            $DB = $this->ajout_reference($idTicket);
        }
        return redirect("detailticket/$idTicket/$nom_client");
    }

    public function supprimerReferenceTicket($idTicket, $nom_client){
        $this->supprimerReference($idTicket);
        return redirect("detailticket/$idTicket/$nom_client");
    }


}
