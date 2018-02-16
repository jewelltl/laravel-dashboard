<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_Customer;
use Braintree_Transaction;

use Validator;
use Redirect;
use Auth;

use App\PaymentMethod;
use App\Transaction;

class BalanceController extends Controller
{
    //
    public function create_method(){
    	$page_info['menu'] = 'BALANCE';
        $page_info['submenu'] = 'ADD_METHOD';
        return view('pages.balance.create_method')
            ->with('page_info', $page_info);
    }
     public function get_add_card(){
    	$page_info['menu'] = 'BALANCE';
        $page_info['submenu'] = 'ADD_METHOD';
        return view('pages.balance.create_card')
            ->with('page_info', $page_info);
    }

    public function post_add_card(Request $request){
    	$rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'street_address' => 'required',
			'city' => 'required',//city
			'state' => 'required',//state
			'postal_code' => 'required',
			'phone' => 'required',

		);
		$validator = Validator::make($request->all(), $rules);
		if($validator->fails()){
            $request->session()->flash('status', 'warning');
            $request->session()->flash('description', 'You have failed in adding new card/paypal!');
			return redirect::back()->withErrors($validator);
		}	

		$result = Braintree_Customer::create([
			    'paymentMethodNonce' => $request->payment_method_nonce,
			    'creditCard' => [
			        'billingAddress' => [
			            'firstName' => $request->first_name,
			            'lastName' => $request->last_name,
			            'streetAddress' => $request->street_address,
			            'locality' => $request->city,
			            'region' => $request->state,
			            'postalCode' => $request->postal_code,
			        ],
			    ],
		        'phone' => $request->phone,
			]);

    	if ($result->success) {
    		$method = new PaymentMethod;
    		$method->user_id = Auth::id();
    		$method->customer_id = $result->customer->id;
    		$method->save();
            $request->session()->flash('status', 'success');
            $request->session()->flash('description', 'You have added new card/paypal successfully!');
    		return redirect::to('/balance');
		} else {
            $request->session()->flash('status', 'warning');
            $request->session()->flash('description', 'You have failed in adding new card/paypal!');
			return redirect::back()->withErrors($result->errors->deepAll());
		}

    }
    public function get_add_credit(){
    	$page_info['menu'] = 'BALANCE';
        $page_info['submenu'] = 'ADD_CREDIT';
        $balance = Transaction::where('user_id', '=', Auth::id())->sum('amount');
        return view('pages.balance.add_credit')
            ->withBalance($balance)
            ->with('page_info', $page_info);
    }

    public function post_add_credit(Request $request){
        $rule = array(
            'amount'=> 'numeric|min:1|required',
            'customerId'=> 'required'
        );
        $messages = array(
            'customerId.required' => 'Please select payment method.',
            'amount.min' => 'The amount value must be at least $ :min.'
        );
        $validator = Validator::make($request->all(), $rule, $messages);
        if($validator->fails()){
            $request->session()->flash('status', 'warning');
            $request->session()->flash('description', 'You have failed in adding new credit!');
            return redirect::back()->withErrors($validator);
        }
        return redirect::to('/balance/invoice');
        $result = Braintree_Transaction::sale(
            [
                'customerId' => $request->input('customerId'),
                'amount' => $request->input('amount')
            ]
        );
        if ($result->success) {
            $transaction = new Transaction;
            $transaction->user_id = Auth::id();
            $transaction->customer_id = $request->customerId;
            $transaction->amount = $request->input('amount');
            $transaction->save();
            $request->session()->flash('status', 'success');
            $request->session()->flash('description', 'You have added new credit successfully!');
            return redirect::to('/balance/history');
        } else {
            $request->session()->flash('status', 'warning');
            $request->session()->flash('description', 'You have failed in adding new credit!');
            return redirect::back()->withErrors($result->errors->deepAll());
        }
    }

    public function get_invoice(){
        $page_info['menu'] = 'BALANCE';
        $page_info['submenu'] = 'INVOICE';
        return view('pages.balance.invoice')
            ->with('page_info', $page_info);
    }

    public function  history(){
        $histories = Transaction::where('user_id', '=', Auth::id())->orderby('created_at','desc')->get();
        $total = Transaction::where('user_id', '=', Auth::id())->sum('amount');
        $page_info['menu'] = 'BALANCE';
        $page_info['submenu'] = 'INVOICES';
        return view('pages.balance.history')
            ->with('histories', $histories)
            ->with('page_info', $page_info);
    }
}
