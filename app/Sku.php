<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Sku extends Model
{
    //
    use Sortable;
	public $sortable = ['prodCode','prodName','prodCode_grp','prodName_grp'];

}
