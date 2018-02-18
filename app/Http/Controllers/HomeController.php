<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chart;
use App\Product;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.index');
    }
    public function dashboard(){
        $page_info['menu'] = 'DASHBOARD';
        $page_info['submenu'] = '';
        $chartdata = Chart::where('user_id', '=', Auth::id())->orderBy('created_at', 'asc')->take(30)->get();
        return view('pages.dashboard.dashboard')
            ->with('chartdata', $chartdata)
            ->with('page_info', $page_info);
    }

    

}
