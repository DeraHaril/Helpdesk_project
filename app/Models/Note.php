<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'note',
        'date_publication',
        'id_client',
        'id_intervenant',
        'photo',
        'document',
        'id_ticket'
    ];
    use HasFactory;
}
