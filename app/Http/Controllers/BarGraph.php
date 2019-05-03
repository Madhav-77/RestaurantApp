<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Charts;
use App\User;
use App\Item;
use App\Order;
use DB;
class BarGraph extends Controller
{
    public function index()
    {
    $date = DB::select('select DAY(date) from orders');
   
    $total = Order::select(DB::raw("SUM(total) as count"))
        ->orderBy("item_id")
        ->groupBy("item_id")
        ->get()->toArray();
    $total = array_column($total, 'count');
    
    return view('bargraphchart')
            ->with('total',json_encode($total,JSON_NUMERIC_CHECK));
    
    }
}