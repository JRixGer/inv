<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItems extends Model
{
    
    public function notifications() 
    { 
    	return $this->belongsTo('App\Notifications'); 
    }

}
