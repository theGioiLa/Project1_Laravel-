<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;


class Bill extends Model
{
    //
    protected $table = 'bills';

    public function bill_details() 
    {
      return $this->hasMany(BillDetail::class);
    }

    public function customer() 
    {
      return $this->belongsTo(BillDetail::class);
    }
}
