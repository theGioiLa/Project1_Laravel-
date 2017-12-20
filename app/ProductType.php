<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;


class ProductType extends Model
{
    //
    protected $table = "type_products";
    protected $fillable = ['name', 'description', 'image'];

    public function products() 
    {
      return $this->hasMany(Product::class, 'id_type');
    }
}
