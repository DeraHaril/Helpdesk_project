<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id';
    public $incrementing = false;
    use HasFactory;

    protected $fillable = ['id','categorie','confidentialite','etat', 'importance','date_ajout','sujet','description','id_client','departement'];

    public function Client(){
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }

    public static function getListeTicketsForIntervenant(){
        return static::select('ticket.id', 'client.nom_client', 'ticket.departement', 'ticket.categorie', 'ticket.etat', 'ticket.importance', 'ticket.date_ajout', 'ticket.sujet')
            ->join('client', 'client.id', '=', 'ticket.id_client')
            ->orderByDesc('ticket.date_ajout')
            ->get();
    }

    public static function getListeTicketsForClient($nom_client){
        return static ::select('ticket.id', 'client.nom_client', 'ticket.departement', 'ticket.categorie', 'ticket.etat', 'ticket.importance', 'ticket.date_ajout', 'ticket.sujet')
            ->join('client', 'client.id', '=', 'ticket.id_client')
            ->where('ticket.confidentialite', 'Public')
            ->orWhere(function ($query) use ($nom_client) {
                $query->where('client.nom_client', $nom_client);
            })
            ->orderByDesc('ticket.date_ajout')
            ->get();
    }

    public static function getListeTicketforPublic(){
        return static ::select('ticket.id', 'client.nom_client', 'ticket.departement', 'ticket.categorie', 'ticket.etat', 'ticket.importance', 'ticket.date_ajout', 'ticket.sujet')
            ->join('client', 'client.id', '=', 'ticket.id_client')
            ->where('ticket.confidentialite', 'Public')
            ->orderByDesc('ticket.date_ajout')
            ->get();
    }

    public static function getListeTicketConnectedClient($id){
        return static ::select('ticket.id', 'client.nom_client', 'ticket.departement', 'ticket.categorie', 'ticket.confidentialite', 'ticket.etat', 'ticket.importance', 'ticket.date_ajout', 'ticket.sujet')
            ->join('client', 'client.id', '=', 'ticket.id_client')
            ->where('client.id', $id)
            ->orderByDesc('ticket.date_ajout')
            ->get();
    }

    public static function insertTicket($id_client, $categorie, $confidentialite, $importance, $sujet, $description, $departement)
    {
        date_default_timezone_set('Indian/Antananarivo');
        $dateajout = date('d/m/Y h:i:s');

        $config = ['table' => 'ticket', 'length' => 10, 'prefix' => 'TCK-'];
        $id = IdGenerator::generate($config);

        return self::create([
            'id' => $id,
            'categorie' => $categorie,
            'confidentialite' => $confidentialite,
            'etat' => 'ouvert',
            'importance' => $importance,
            'date_ajout' => $dateajout,
            'sujet' => $sujet,
            'description' => $description,
            'id_client' => $id_client,
            'departement' => $departement
        ]);
    }

}


