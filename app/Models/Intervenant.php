<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenant extends Model
{
    protected $table = 'intervenant';
    use HasFactory;

    public static function getIntervenantById($id){
        return Intervenant::where('id_intervenant', $id)->first();
    }
}


