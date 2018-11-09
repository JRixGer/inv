<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class VwList extends Model
{
	use Sortable;
	protected $table = 'vw_new_report_qty';
}

// - SELECT `sku`, SUM(`qty`) as onhand_qty FROM `sku_running_qty` Where `sku`<>'' group by `sku` >> vw_sku_running_qty
// - SELECT `SKU1`, SUM(`QTY1`) as sold_qty FROM `new_report` WHERE `SKU1` <> '' GROUP BY `SKU1` >> vw_new_report_qty