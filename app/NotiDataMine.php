<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class NotidataMine extends Model
{
   
    use Sortable;
	protected $table = 'notifications';

    
    public function lineItems()
    {
    	return $this->hasMany('App\LineItemsDataMine','lnkid','id');
	}
}
