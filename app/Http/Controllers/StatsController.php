<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Pusher\Pusher;
use App\User;
use App\Stats;

class StatsController extends Controller
{
    public function getUpdates(Request $request){
        if(Auth::check()){
            $stats = Stats::where('user_id', '=', Auth::id())->first();    
        }else{
            $stats = array();
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
        $pusher->trigger('client-dashboard', 'get-stats' . Auth::id(), $stats);
    }
}
