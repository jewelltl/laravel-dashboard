<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Pusher\Pusher;
use App\Product;

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
        return view('pages.dashboard.dashboard')
            ->with('page_info', $page_info);
    }

    public function getUpdates(Request $request){
        if(count(Product::all()) == 0){
            $product = new Product;
            $product->name = 'Laravel Pusher Testing';
            $product->description = 'This is a sample for laravel pusher testing';
            $product->price = mt_rand(10000000, 99999999);
            $product->save();
        }else{
            $product = Product::where('id', '!=', null)->first();
            $product->price = mt_rand(10000000, 99999999);
            $product->save();
        }

        
        $options = array(
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'encrypted' => config('broadcasting.connections.pusher.options.encrypted')
        );
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            $options
        );
        $pusher->trigger('client-dashboard', 'get-price', $product);
        // return response()->json($options);
    }

}
