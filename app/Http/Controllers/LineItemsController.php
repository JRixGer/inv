<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LineItems;
use App\VwList;
use DB;

class LineItemsController extends Controller
{

    public function list()
    {
 
        $LineItems = LineItems::sortable()->paginate(5); // this is using table for pagination

        $VwList = VwList::sortable()->paginate(5); // this is using view for pagination

        dd($LineItems);   

    }    
}
