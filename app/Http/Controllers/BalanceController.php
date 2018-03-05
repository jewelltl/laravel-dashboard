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
    public function index(){
        
        $histories = Transaction::where('user_id', '=', Auth::id())->orderby('created_at','desc')->paginate(config('consts.CLIENT.HISTORY_PER_PAGE'));
        $total = Transaction::where('user_id', '=', Auth::id())->where('type', '=', 1)->sum('amount') - Transaction::where('user_id', '=', Auth::id())->where('type', '=', 2)->sum('amount');
        $page_info['menu'] = 'BALANCE';
        $page_info['submenu'] = 'ADD_METHOD';
        $main_method = PaymentMethod::where('user_id','=',Auth::id())->where('main', '=', 1)->get();
        if(count($main_method) > 0 ){
            $main_method = $main_method->first()->customer_id;
        }else{
            $main_method = '';
        }
        return view('pages.balance.index')
            ->with('histories', $histories)
            ->with('balance', $total)
            ->with('main_method', $main_method)
            ->with('page_info', $page_info);
    }

    public function post_add_card(Request $request){
        
  //   	$rules = array(
		// 	'first_name' => 'required',
		// 	'last_name' => 'required',
		// 	'street_address' => 'required',
		// 	'city' => 'required',//city
		// 	'state' => 'required',//state
		// 	'postal_code' => 'required',
		// 	'phone' => 'required',

		// );
		// $validator = Validator::make($request->all(), $rules);
		// if($validator->fails()){
  //           $request->session()->flash('status', 'warning');
  //           $request->session()->flash('description', 'You have failed in adding new card/paypal!');
		// 	return redirect::back()->withErrors($validator);
		// }	

		$result = Braintree_Customer::create([
			    'paymentMethodNonce' => $request->payment_method_nonce,
			    // 'creditCard' => [
			    //     'billingAddress' => [
			    //         'firstName' => $request->first_name,
			    //         'lastName' => $request->last_name,
			    //         'streetAddress' => $request->street_address,
			    //         'locality' => $request->city,
			    //         'region' => $request->state,
			    //         'postalCode' => $request->postal_code,
			    //     ],
			    // ],
		     //    'phone' => $request->phone,
			]);

    	if ($result->success) {
    		$method = new PaymentMethod;
    		$method->user_id = Auth::id();
    		$method->customer_id = $result->customer->id;
            count(Auth::user()->PaymentMethods) == 0 ? $method->main = 1 : $method->main = 0 ;
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

    public function remove_payment_method($id){
        $method = PaymentMethod::find($id);
        if($method){
            PaymentMethod::destroy($id);
        }
        if(count(Auth::user()->PaymentMethods) == 1){
            $main = Auth::user()->PaymentMethods->first();
            $main->main = 1;
            $main->save();
        }
        return redirect::back();
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
            return redirect::to('/balance');
        } else {
            $request->session()->flash('status', 'warning');
            $request->session()->flash('description', 'You have failed in adding new credit!');
            return redirect::back()->withErrors($result->errors->deepAll());
        }
    }
        //ajax get
    public function set_main(Request $request){
        $methods = PaymentMethod::where('user_id', '=', Auth::id())->get();
        foreach ($methods as $method) {
            $method->main = 0;
            $method->save();
        }
        $method = PaymentMethod::where('customer_id', '=', $request->main_method)->first();
        $method->main = 1;
        $method->save();
        $response = array(
            'status' => 'success',
        );
        return response()->json($response);
    }
    //http get
    public function setmain($id){
        $methods = PaymentMethod::where('user_id', '=', Auth::id())->get();
        foreach ($methods as $method) {
            $method->main = 0;
            $method->save();
        }
        $method = PaymentMethod::find($id);
        $method->main = 1;
        $method->save();
        return redirect::back();
    }
}
