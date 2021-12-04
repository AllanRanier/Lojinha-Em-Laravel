<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategorys extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subcategorys';

    protected $fillable = [
        'category_id',
        'name',
    ];


    static public function search($parameters, $information)
    {
        $search = SubCategorys::when(true, function ($query) use ($parameters, $information) {
            // busca por parametros a query eloquent do laravel
            switch ($parameters) {
                default:
                    $query->where($parameters, 'LIKE', "%$information%");
                    $query->orderBy('id', 'ASC');
            }
        })->paginate(10);

        return $search;
    }

    public function category()
    {
        return $this->belongsTo(Categorys::class);
    }
}
