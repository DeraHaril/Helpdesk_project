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
}
