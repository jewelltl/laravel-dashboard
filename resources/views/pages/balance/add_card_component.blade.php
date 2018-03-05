<?php 
    use Carbon\Carbon;
?>
<div class="card card-body">
    <h2 class="card-title">Payment Method</h2>
        @if(count(Auth::user()->PaymentMethods) != 0)
            <h5 class="m-b-10">All major credit cards are accepted.</h5>
        @endif
    <div class="row">
        <div class="offset-md-1 col-md-10 col-sm-12 col-xs-12">
            <div class="table-responsive">

                @if(count(Auth::user()->PaymentMethods) == 0)
                    <div class="alert alert-info m-t-10" role="alert">
                      Please add a payment method to continue. We accept all major credit/debit cards and PayPal
                    </div>
                @endif
            </div>
            <div class="col-sm-12 payment-method-list">
                @foreach(Auth::user()->PaymentMethods as $index=>$method)
                    <div class="card  payment-method" data-id="{{$method->customer_id}}">
                        <div class="card-body">
                            <div class="row">
                            <?php $customer = $method->Customer($method->customer_id); ?>
                            @if(isset( $customer->maskedNumber ))
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    <h4 class="card-title">
                                        <img src="{{ $customer->imageUrl }}"> &nbsp;**** - {{ $customer->last4 }} &nbsp; Expires: {{ $customer->expirationDate}} &nbsp; 
                                    </h4>
                                </div>
                            @else
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    <h4>
                                        <img src="{{ $customer->imageUrl }}"> &nbsp;{{ $customer->email }}
                                    </h4>
                                </div>
                                
                            @endif
                                <div class="col-md-5 col-sm-6 col-xs-12 text-right">
                                    @if($method->main != 1)
                                        <a href="{{url('/balance/paymentmethod/'. $method->id .'/setmain')}}" class="btn btn-secondary">Set as Primary</a>
                                    @endif
                                    <a href="{{url('/balance/paymentmethod/'. $method->id .'/remove')}}" class="btn btn-danger"><i class="fa fa-close"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach        
            </div>
            <div class="col-sm-12 text-center m-t-20">
                <button class="btn waves-effect waves-light btn-secondary add_credit_btn"  data-toggle="modal" data-target="#add_credit_modal">Add Credit Card</button>
                <form id="add_paypal_form" action="{{url('/balance/add_card')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">
                     <div id="paypal-container" class="text-center">
                        <button class="btn waves-effect waves-light btn-primary v-top d-none" id="paypal_loading_btn" disabled> Registering <i class="fa fa-circle-o-notch fa-spin"></i> </button>
                     </div>
                </form>
            </div>
            
            <div id="add_credit_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" id="add_card_form" action="{{url('/balance/add_card')}}" method="post">
                        {{csrf_field()}}
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Credit/Debit Card</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                          <!-- Modal body -->
                        <div class="modal-body">
                             <div id='card-number'>
                              <span class='icon-type'></span>
                             </div>
                              <div id="cvv"></div>
                              <div id="expiration-month"></div>
                              <div id="expiration-year"></div>
                        </div>

                          <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-success">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>