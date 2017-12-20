<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    //
    protected $table = 'customer';

    public function bills()
    {
      return $this->hasMany(Bill::class, 'id_customer');
    }

    public function user() 
    {
    	return $this->belongsTo(User::class, 'email', 'email');
    }

}
