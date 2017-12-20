<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;


class BillDetail extends Model
{
    
    protected $table = 'bill_detail';

    public function product() {
      return $this->belongsTo(Product::class);
    }

    public function bill() 
    {
      return $this->belongsTo(Bill::class);
    }
    

}
