<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class VwList extends Model
{
	use Sortable;
	protected $table = 'vw_new_report_qty';
}
