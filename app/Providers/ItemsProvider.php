<?php
namespace App\Providers;namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ItemsModel;
use DB;

class ItemsProvider extends ServiceProvider{
    public function boot(){
        
            $view = DB::select('SELECT * from item');
           
        //$price = DB::table('item')->where('i_name', $view)->value('i_price');
       // $price = DB::select('select * from item where i_name = ');
    } 
}