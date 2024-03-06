<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail as VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Client extends Model implements Authenticatable,MustVerifyEmail
{
    protected $table = 'client';
    protected $primaryKey = 'id';
    //public $incrementing = true;
    use AuthAuthenticatable,Notifiable,VerifyEmail,HasFactory;

    protected $fillable = ['id',
        'nom_client',
        'numero_telephone',
        'email',
        'password',
        'profession'
    ];

    protected $hidden = 'password';

    protected $casts = [
        'email_verified_at' => 'datetime',
        'numero_telephone_verified_at' => 'datetime',
    ];

    public static function getClientById($id){
        return Client::where('id', $id)->first();
    }

}
