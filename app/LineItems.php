<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class LineItems extends Model
{
  	use Sortable;
    public $sortable = ['itemNo'];
    protected $table = 'lineItems';
}
