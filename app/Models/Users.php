<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'active',
        'is_admin',
    ];


    static public function getEmail($email)
    {
        return Users::where('email', $email)->onlyTrashed()->first();
    }



    static public function getUserName($email)
    {
        return Users::where('username', $email)->onlyTrashed()->first();
    }


    static public function search($parameters, $information)
    {
        $search = Users::when(true, function ($query) use ($parameters, $information) {

            // busca por parametros a query eloquent do laravel
            switch ($parameters) {

                default:
                    $query->where($parameters, 'LIKE', "%$information%");
                    $query->orderBy('id', 'ASC');
            }
        })->paginate(10);

        return $search;
    }
}
