<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $table = 'stats';

    protected $fillable = ['user_id', 'balance', 'available_credit', 'current_due', 'past_due', 'terms', 'asr', 'requests_cancelled', 'billed_minutes', 'total_calls', 'connected_calls', 'short_calls'];

    public function Owner(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
