<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_reference_ticket extends Model
{
    use HasFactory;

    protected $table = 'detail_reference_ticket';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'id_ticket',
        'id_reference_ticket'
    ];
}
