<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //
    use Sortable;
	public $sortable = ['prodCode','prodName','prodName_common','onhand','sold','qty01','qty02','qty03','qty04','qty05','qty06','qty07','qty08','qty09','qty10','qty11','qty12','qty13','qty14','qty5','qty7','qty30','totalsold'];
	protected $table = 'vw_inventory';

	// SHOW CREATE view `vw_inventory`
	// to  update
	// Select 
	// 	skus.prodCode_grp AS prodCode,
	// 	skus.prodName_grp As prodName_common,
	// 	MAX(skus_balance.onhand) AS onhand, 
	// 	MAX(skus_balance.sold) AS sold, 
	// 	SUM(daily_ship.qty01) AS qty01,
	// 	SUM(daily_ship.qty02) AS qty02,
	// 	SUM(daily_ship.qty03) AS qty03,
	// 	SUM(daily_ship.qty04) AS qty04,
	// 	SUM(daily_ship.qty05) AS qty05,
	// 	SUM(daily_ship.qty06) AS qty06,
	// 	SUM(daily_ship.qty07) AS qty07,
	// 	SUM(daily_ship.qty08) AS qty08,
	// 	SUM(daily_ship.qty09) AS qty09,
	// 	SUM(daily_ship.qty10) AS qty10,
	// 	SUM(daily_ship.qty11) AS qty11,
	// 	SUM(daily_ship.qty12) AS qty12,
	// 	SUM(daily_ship.qty12) AS qty13,
	// 	SUM(daily_ship.qty04) AS qty4,
	// 	SUM(daily_ship.qty05) AS qty5,
	// 	SUM(daily_ship.qty07) AS qty7,
	// 	SUM(daily_ship.qty14) AS qty14,
	// 	SUM(daily_ship.qty30) AS qty30,
	// 	SUM(daily_ship.totalsold) AS totalsold
 //        FROM skus
	// 	left join daily_ship on skus.prodCode = daily_ship.item_number
	// 	left join skus_balance on skus.prodCode = skus_balance.sku_link
	// 	WHERE skus.prodCode<>'1' AND skus.prodCode<>'2' AND skus.prodCode<>'3' AND skus.prodCode<>'b-priority'
	// 	Group By skus.prodCode_grp, skus.prodName_grp
}
