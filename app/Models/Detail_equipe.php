<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_equipe extends Model
{
    protected $table = 'detail_equipe';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'id_equipe',
        'id_intervenant'
    ];
    use HasFactory;
}
