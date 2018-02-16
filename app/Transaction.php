<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Braintree_Customer;
class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['user_id', 'quantity', 'customer_id'];

    public function Owner(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function PaymentMethod(){
    	return Braintree_Customer::find($this->customer_id)->paymentMethods[0];
    }
}
