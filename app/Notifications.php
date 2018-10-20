<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
   
    public function lineitems()
    {
    	return $this->hasMany('App\lineitems');
    }

}
