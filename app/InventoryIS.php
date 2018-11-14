<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class InventoryIS extends Model
{
    //
    use Sortable;
	public $sortable = ['prodCode','sku_link','sku','prodName','prodName_common','onhand','sold','qty01','qty02','qty03','qty04','qty05','qty06','qty07','qty08','qty09','qty10','qty11','qty12','qty13','qty14','qty5','qty7','qty30','totalsold'];
	protected $table = 'vw_inventory_is';


	// SHOW CREATE view `vw_consolidated`
	// SHOW CREATE view `vw_inventory_is`
	// to  update
	// select `skus_is`.`sku` AS `prodCode`,`skus_is`.`sku` AS `sku`,`skus_is`.`sku_link` AS `sku_link`,`skus_balance_is`.`prodName_common` AS `prodName_common`,max(`skus_balance_is`.`onhand`) AS `onhand`,max(`skus_balance_is`.`sold`) AS `sold`,sum(`daily_ship_is`.`qty01`) AS `qty01`,sum(`daily_ship_is`.`qty02`) AS `qty02`,sum(`daily_ship_is`.`qty03`) AS `qty03`,sum(`daily_ship_is`.`qty04`) AS `qty04`,sum(`daily_ship_is`.`qty05`) AS `qty05`,sum(`daily_ship_is`.`qty06`) AS `qty06`,sum(`daily_ship_is`.`qty07`) AS `qty07`,sum(`daily_ship_is`.`qty08`) AS `qty08`,sum(`daily_ship_is`.`qty09`) AS `qty09`,sum(`daily_ship_is`.`qty10`) AS `qty10`,sum(`daily_ship_is`.`qty11`) AS `qty11`,sum(`daily_ship_is`.`qty12`) AS `qty12`,sum(`daily_ship_is`.`qty12`) AS `qty13`,sum(`daily_ship_is`.`qty04`) AS `qty4`,sum(`daily_ship_is`.`qty05`) AS `qty5`,sum(`daily_ship_is`.`qty07`) AS `qty7`,sum(`daily_ship_is`.`qty14`) AS `qty14`,sum(`daily_ship_is`.`qty30`) AS `qty30`,sum(`daily_ship_is`.`totalsold`) AS `totalsold` from ((`skus_is` left join `daily_ship_is` on((`skus_is`.`sku` = `daily_ship_is`.`sku`))) left join `skus_balance_is` on((`skus_is`.`sku_link` = `skus_balance_is`.`sku_link`))) where (`skus_is`.`sku` <> 'b-priority') group by `skus_is`.`sku`,`skus_is`.`sku_link`,`skus_balance_is`.`prodName_common`
}
