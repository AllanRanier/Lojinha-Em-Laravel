<?php

namespace App\Models;

use Andersonhsilva\MetodosPhp\Metodos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'code',
        'qta',
        'image',
        'details',
        'value',
    ];


    public function setValueAttribute($value)
    {
        $this->attributes['value'] = Metodos::double_base($value);
    }

    public function getValue()
    {
        return Metodos::exibir_double($this->value);
    }


    static public function search($parameters, $information)
    {
        $search = Products::when(true, function ($query) use ($parameters, $information) {
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

    public function subCategory()
    {
        return $this->belongsTo(SubCategorys::class);
    }
}
