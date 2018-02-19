@extends('layouts.dashboard')

@section('styles')
    <link href="{{url(asset('plugins/bootstrap-touchspin/src/jquery.bootstrap-touchspin.css'))}}" rel="stylesheet">
    <link href="{{url(asset('plugins/icheck/skins/all.css'))}}" rel="stylesheet">
    <link href="{{url('css/admin/pages/card-page.css')}}" rel="stylesheet">
    <link href="{{url('css/admin/pages/form-icheck.css')}}" rel="stylesheet">
@endsection

@section('title')
    Balance - Add Credit
@endsection


@section('content')


<form method="post" action="{{url('balance/add_credit')}}">
    {{csrf_field()}}

    <div class="row">
        <div class="col-md-12">
            <h2>Add Credit</h2>
        </div>
    </div>
    <div class="row">
        @if(count($errors) > 0 )
            <div class="alert alert-danger col-12">
                <strong>Whoops!</strong> There were some problems with your input.<br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{isset($error->message) ? $error->message : $error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-7 align-self-center d-none d-md-block">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">How much credit would you like to add</h4></div>
                <div class="card-body">
                    <div class="input-group col-md-4 mb-3">
                        <input value="{{old('amount')!==null ? old('amount') : 0 }}" name="amount" class="form-control" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline">
                    </div>
                    <p>Credit is non-refundable and expires on year after your last credit.</p>
                    <p>For larger amounts contact our <a href="#">Help Team</a></p>
                    <p class="m-t-40"><strong>Need a receipt?</strong> Keep your <a href="#">billing details</a> up to date</p>
                </div>
            </div>
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Select Payment Method</h4></div>
                <div class="card-body">
                    <table class="table ">
                        <thead>
                            <th>#</th>
                            <th>Info</th>
                            <th>Payment Method</th>
                            <th>Expires On</th>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->PaymentMethods as $index=>$method)
                                <tr>
                                    <?php $customer = $method->Customer($method->customer_id) ;?>
                                    @if(isset($customer->cardType))
                                        <td>
                                            <input type="radio" class="check" name="customerId" value="{{$method->customer_id}}" data-radio="iradio_flat-red">
                                        </td>
                                        <td>
                                            {{$customer->billingAddress->firstName}} {{$customer->billingAddress->lastName}}
                                        </td>
                                        <td>
                                            <img src="{{$customer->imageUrl}}"> &nbsp;{{$customer->maskedNumber}}
                                        </td>
                                        <td>
                                            {{$customer->expirationMonth}}/{{$customer->expirationYear}}
                                        </td>
                                    @else
                                        <td>
                                            <input type="radio" class="check" name="customerId" value="{{$method->customer_id}}" data-radio="iradio_flat-red">
                                        </td>
                                        <td>
                                            
                                        </td>
                                        <td>
                                            <img src="{{$customer->imageUrl}}">&nbsp;{{$customer->email}}
                                        </td>
                                        <td>
                                            
                                        </td>
                                    @endif
                                </tr>
                            @endforeach        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5 d-none d-md-block">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Your current Balance</h4></div>
                <div class="card-body">
                    <h3 class="card-title">${{$balance}}</h3>
                    <p class="card-text"><a href="{{url('/balance/history')}}">Account History</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary pull-right">Proceed</button>
        </div>
    </div>
</form>

@endsection

@section('page_scripts')
    <script src="{{url(asset('plugins/bootstrap-touchspin/src/jquery.bootstrap-touchspin.js'))}}"></script>
    <script src="{{url(asset('plugins/icheck/icheck.min.js'))}}"></script>
    <script src="{{url(asset('plugins/icheck/icheck.init.js'))}}"></script>
    <script src="{{url(asset('js/client/balance.js'))}}"></script>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $("input[name='amount']").TouchSpin({
                min: 0,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
            });
            $.ajax({
                  url: '/braintree/token'
                }).done(function(response){
                    
                    console.log(response.data.token)
                });
        })
    </script>
@endsection