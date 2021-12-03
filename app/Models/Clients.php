<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'username',
        'email',
        'cpf',
        'phone',
        'cep',
        'street',
        'number',
        'district',
        'city',
        'states',
    ];


    static public function getEmail($email)
    {
        return Clients::where('email', $email)->onlyTrashed()->first();
    }


}
