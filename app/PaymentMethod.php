<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Braintree_Customer;

class PaymentMethod extends Model
{
  	protected $table = 'payment_methods';
    
    protected $fillable = ['customer_id', 'user_id'];

    public function Owner(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    
    public function Customer($id){
    	return Braintree_Customer::find($id)->paymentMethods;
    }
}
