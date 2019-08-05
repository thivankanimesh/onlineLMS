<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Optional\ProfileService;
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
        $profileService=new ProfileService();
        $viewArrays=$profileService->init();

        return view('profile')->with($viewArrays);
    }

    public function download($id){

        $profileService=new ProfileService();
        $filePath=$profileService->download($id);

        return response()->download($filePath);
    }
}
