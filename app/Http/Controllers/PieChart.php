<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Order;
use DB;

class PieChart extends Controller
{
    function index(){
        $data = DB::table('orders')->select(DB::raw('(select item_name from items where id = item_id) as item_id'), 
        DB::raw('count(*) as number', 'sum(qty)'))
        ->groupBy('item_id')->get();
        
        $array[] = ['item_id', 'number'];
        foreach($data as $key => $value){
            $array[++$key] = [$value->item_id, $value->number];
        }
        return view('reports')->with('item_id', json_encode($array));
    }
}
