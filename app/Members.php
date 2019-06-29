<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
   
    use Sortable;
	public $sortable = ['id','lnkid','firstName','lastName','fullName','phoneNumber','email'];

	protected $table = 'billing';

	public function notifications()
    {
    	return $this->hasOne('App\LineItems','lnkid','id');
	}	

}
