<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name', 'unit_price', 'id_type', 'promotion_price', 'image', 'description', 'new'];

    public function product_type() 
    {
      return $this->belongsTo(ProductType::class, 'id_type');
    }

    public function bill_details() 
    {
      return $this->hasMany(Bill_detail::class);
    }
}
