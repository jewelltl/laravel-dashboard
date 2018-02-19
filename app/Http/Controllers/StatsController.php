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
    	$users = User::all();
        foreach ($users as $key => $user) {
            $stats = Stats::where('user_id', '=', $user->id)->get();
            if(count($stats) > 0 ){
                $stats = $stats->first();
            }else{
                $stats = new Stats;
                $stats->user_id = $user->id;
            }
            $stats->balance = mt_rand(-100,100);
            $stats->available_credit = mt_rand(0,150);
            $stats->current_due = mt_rand(0,50);
            $stats->past_due = mt_rand(0,100);
            $stats->terms = "PostPaid";
            $stats->asr = mt_rand(0,100);
            $stats->requests_cancelled = mt_rand(0,100);
            $stats->billed_minutes = mt_rand(1000,2000);
            $stats->total_calls = mt_rand(500,1000);
            $stats->connected_calls = mt_rand(4000,8000);
            $stats->short_calls = mt_rand(0,100);
            $stats->save();
        }
        
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
        $pusher->trigger('client-dashboard', 'get-stats', $stats);
    }
}
