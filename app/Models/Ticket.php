<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id';
    public $incrementing = true;
    use HasFactory;

    protected $fillable = ['id','categorie','confidentialite','etat', 'importance','date_ajout','sujet','description','id_client','departement'];

    public function Client(){
        return $this->belongsTo(Client::class, 'id_client', 'id');
    }

    public static function getListeTicketsForClient(){
        return static::select('ticket.id', 'client.nom_client', 'ticket.departement', 'ticket.categorie', 'ticket.etat', 'ticket.importance', 'ticket.date_ajout', 'ticket.sujet')
            ->join('client', 'client.id', '=', 'ticket.id_client')
            ->orderByDesc('ticket.date_ajout')
            ->get();
    }

    public static function getListeTicketsForIntervenant($nom_client){
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

}


