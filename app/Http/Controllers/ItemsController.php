<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Quantity;
use DB;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Item::all();
        return view('foodM.index')->with('items', $items);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        //sales table
        /* $sales= new Sales();
        $sales->total = $request->input('total');
        $sales->save();
        
            */

       //getting item id to quantity table
       

       //quantity table
       /* $qty = new Quantity();
       $qty->quantity = $request->input('quantity');
       $qty
       $qty->save();
         */
   
       
       //getting logged in user details in order table
       
       $user = Auth::user();
       $id = $user->id;
       $itm = new Item();
       $itm = $request->input('items');
       $itms = serialize($itm);
       $itm_id = DB::table('items')->select('id')->where('item_name', '=', $itm)->get();
       $itmd = substr($itm_id, 7,1);

       $order = new Order();

       //$order->sales_id = $sales->id;
       //$order->qty_id = $qty->id;
       $order->user_id = $user->id;
       $order->date = date('Y-m-d h:i:s');
       $order->qty = $request->input('quantity');
       $order->total = $request->input('total');
       $order->item_id = $itmd;
       $order->save();

       return redirect('/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
