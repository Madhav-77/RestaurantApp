<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class LineGraph extends Controller
{
    public function index()
    {
        $tot = DB::table('orders')->select(DB::raw("day(date) as year"), 
        DB::raw("SUM(total) as total"))
        ->groupBy(DB::raw("day(date)"))
        ->orderBy("date")
        ->get();
        $result[] = ['Year','total'];

        foreach ($tot as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->total];
        }
        return view('reportLinegraph')->with('tot',json_encode($result));
    }
}

