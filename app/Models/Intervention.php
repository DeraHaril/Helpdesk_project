<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    protected $table = 'intervention';
    protected $primaryKey = 'id';

    protected $fillable =[
        'id',
        'id_ticket',
        'date_debut_intervention',
        'date_fin_intervention',
        'id_equipe',
        'nature_intervention',
        'etat_apres_intervention',
        'observation',
        'date_creation_fiche',
        'id_intervenant'
    ];
    use HasFactory;
}
