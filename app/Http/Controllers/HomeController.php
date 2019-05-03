<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemsModel;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $view = DB::select('SELECT * from items');
        return view('welcome')->with('welcome', $view);
    }
}
