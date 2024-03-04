<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reference_ticket extends Model
{
    use HasFactory;

    protected $table = 'reference_ticket';
    protected $primaryKey = 'id';

    protected $fillable = ['id'];

}
