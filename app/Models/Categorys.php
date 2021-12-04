<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categorys';

    protected $fillable = [
        'name',
    ];


    static public function search($parameters, $information)
    {
        $search = Categorys::when(true, function ($query) use ($parameters, $information) {
            // busca por parametros a query eloquent do laravel
            switch ($parameters) {
                default:
                    $query->where($parameters, 'LIKE', "%$information%");
                    $query->orderBy('id', 'ASC');
            }
        })->paginate(10);

        return $search;
    }


    static public function getCategory($categorys)
    {
        return Categorys::where('name', $categorys)->first();
    }

}
