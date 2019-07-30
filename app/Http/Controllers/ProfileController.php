<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
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

        $countOfshoppingcartItems=DB::table('shoppingcart'.Auth::id())->count();

        return view('profile')->with(['countOfshoppingcartItems'=>$countOfshoppingcartItems]);
    }
}
