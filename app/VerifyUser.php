<?php

namespace Store;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    protected $guarded = [];
    public function user() {
    	return $this->belongsTo(User::class, 'id_user');
    }

}
