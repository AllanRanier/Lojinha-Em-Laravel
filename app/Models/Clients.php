<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Andersonhsilva\MetodosPhp\Metodos;
use Andersonhsilva\MetodosPhp\Metodos;

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

    public function setCpfAttribute($value)
    {
        $cpf = Metodos::somente_numero($value);
        Metodos::validar_cpf($cpf);
        $this->attributes['cpf'] = $cpf;
    }
    public function getCpfAttribute($value)
    {
        return Metodos::mascara_string($value, '###.###.###-##');
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = Metodos::somente_numero($value);
    }

    public function getPhoneAttribute($value)
    {
        return Metodos::mascara_string($value, '(##) #.####-####');
    }


    public function setCepAttribute($value)
    {
        $cep = Metodos::somente_numero($value);
        $this->attributes['cep'] = $cep;
    }

    public function getCepAttribute($value)
    {
        return Metodos::mascara_string($value, '##.###-###');
    }


    static public function getEmail($email)
    {
        return Clients::where('email', $email)->onlyTrashed()->first();
    }


}
