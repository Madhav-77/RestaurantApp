<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;

class LineGraph extends Controller
{
    public function index()
    {
        $visitor = DB::table('orders')
                    ->select(
                        DB::raw("day(date) as year"),
                        DB::raw("SUM(total) as total")) 
                    ->orderBy("date")
                    ->groupBy(DB::raw("day(date)"))
                    ->get();


        $result[] = ['Year','total'];
        foreach ($visitor as $key => $value) {
            $result[++$key] = [$value->year, (int)$value->total];
        }


        return view('reportLinegraph')
                ->with('visitor',json_encode($result));
    }


}

