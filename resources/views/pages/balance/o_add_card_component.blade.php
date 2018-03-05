<?php 
    use Carbon\Carbon;
?>
<div class="card card-body">
    <h2 class="card-title">Payment Method</h2>
    <h5 class="">Please enter your prefeered payment method below. You can use a credit or pay through PayPal.</h5>
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="p-20 m-t-40">
                <h3>Saved Payment Method</h3>
                <h5>All major credit cards accepted. Set your main payment method by dragging on the top.</h5>
                <div class="row">
                    <div class="col-sm-12 sortable-portlet">
                        @foreach(Auth::user()->PaymentMethods as $index=>$method)
                            <div class="card has-border {{$method->main == 1 ? 'main-payment' : ''}} sortable" data-id="{{$method->customer_id}}">
                              <div class="card-body ">
                                <a href="#" class="btn btn-danger pull-right"><i class="fa fa-close"></i></a>
                                <?php $customer = $method->Customer($method->customer_id); ?>
                                @if(isset( $customer->maskedNumber ))
                                    <h4 class="card-title">
                                        {{Auth::user()->name}}
                                        <small><img src="{{ $customer->imageUrl }}"> &nbsp;{{ $customer->maskedNumber }}</small>
                                    </h4>
                                    <p>
                                        Expires: {{ $customer->expirationDate}} &nbsp; 
                                    </p>
                                @else
                                    <h4>{{Auth::user()->name}}</h4>
                                    <p>
                                        <img src="{{ $customer->imageUrl }}"> &nbsp;{{ $customer->email }}
                                    </p>
                                @endif
                              </div>
                            </div>
                        @endforeach        
                    </div>
                    <div class="col-sm-12 text-center m-t-20">
                        <button class="btn waves-effect waves-light btn-secondary " data-toggle="modal" data-target="#add_credit_modal">Add Credit Card</button>
                        <button class="btn waves-effect waves-light btn-secondary" data-toggle="modal" data-target="#add_paypal_modal">Add PayPal</button>        
                    </div>
                </div>
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
            <div id="add_paypal_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <form class="modal-content" id="add_paypal_form" action="{{url('/balance/add_card')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Paypal</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                          <!-- Modal body -->
                        <div class="modal-body">
                             <div id="paypal-container" class="text-center"></div>
                        </div>

                          <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>