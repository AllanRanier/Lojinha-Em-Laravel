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
        return Users::where('email', $email)->first();
    }



    static public function getUserName($userName)
    {
        // dd($userName);
        return Users::where('username', $userName)->first();
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
