<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Order;

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
        return view('index')->with('items', $items);
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
       //getting logged in user details in order table
       $user = Auth::user();
       $id = $user->id;
       $itm = $request->input('items');
       $itm_id = DB::table('items')->select('id')->where('item_name', '=', $itm)->get();
       $itmd = substr($itm_id, 7,1);

       $order = new Order();

       $order->user_id = $user->id;
       $order->date = date('Y-m-d h:i:s');
       $order->qty = $request->input('quantity');
       $order->total = $request->input('total');
       $order->item_id = $itmd;
       $order->save();
       
       //todo
       /* 
       $ord['user_id']=$user->id;
        Order::create($ord);
 */
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

INSERT INTO `employee_discounts` (`id`, `users_id`, `discount`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES ('1', '2', '200', '2019-05-01', '2019-05-02', '2019-05-02 00:00:00', '2019-05-03 00:00:00');


$validatedData = $request->validate([
            'name' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);
        try{       
            $data['users'] = DB::table('employee_discounts as ed')
            ->join('users as u', 'u.id', 'ed.users_id')
            ->select('u.name', 'ed.*')
            ->where('ed.id', $request->discount_id)
            ->first();
            if($vec==1){    
                $success['status'] = 200;
                $success['message'] = 'Vehicle Details Updated Succesfully';
                return response()->json(['success' => $success], 200);
            }else{
                $success['status'] = 500;
                $success['message'] = 'Vehicle Details Failed to Update';
                return response()->json(['success' => $success], 200);
            }
        }catch(\Exception $exc){
            dd($exc);
        }
        return view('update_discount', $data);