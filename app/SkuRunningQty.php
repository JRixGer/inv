<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class SkuRunningQty extends Model
{
  	use Sortable;
  	protected $connection = 'mysql2';
  	protected $table = 'sku_running_qty';
}
