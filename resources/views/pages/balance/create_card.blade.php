@extends('layouts.dashboard')

@section('styles')
 <link href="{{url('css/admin/pages/tab-page.css')}}" rel="stylesheet">
@endsection

@section('title')
    Balance
@endsection


@section('content')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Credit Card/PayPal</h4>
                    <div class="p-20">
                        <form class="form-horizontal m-t-40" action="{{url('/balance/add_card')}}" method="post">
                            {{ csrf_field() }}
                            @if(count($errors) > 0 )
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{isset($error->message) ? $error->message : $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div id="dropin-container"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group p-t-20 {{ $errors->has('first_name') ? 'has-danger' : '' }}">
                                        <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="Firstname" name="first_name">
                                        @if ($errors->has('first_name'))
                                            <div class="form-control-feedback">{{ $errors->first('first_name') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group p-t-20 {{ $errors->has('last_name') ? 'has-danger' : '' }}">
                                        <input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Lastname" name="last_name">
                                        @if ($errors->has('last_name'))
                                            <div class="form-control-feedback">{{ $errors->first('last_name') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group p-t-20 {{ $errors->has('street_address') ? 'has-danger' : '' }}">
                                        <input type="text" class="form-control {{ $errors->has('street_address') ? ' is-invalid' : '' }}" placeholder="Street Address" name="street_address">
                                        @if ($errors->has('street_address'))
                                            <div class="form-control-feedback">{{ $errors->first('street_address') }}</div>
                                        @endif
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group p-t-20 {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <input type="text" class="form-control {{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="City" name="city">
                                        @if ($errors->has('city'))
                                            <div class="form-control-feedback">{{ $errors->first('city') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group p-t-20 {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <input type="text" class="form-control {{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="State" name="state">
                                        @if ($errors->has('state'))
                                            <div class="form-control-feedback">{{ $errors->first('state') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group p-t-20 {{ $errors->has('postal_code') ? 'has-danger' : '' }}">
                                        <input type="text" class="form-control {{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="Postal Code" name="postal_code">
                                        @if ($errors->has('postal_code'))
                                            <div class="form-control-feedback">{{ $errors->first('postal_code') }}</div>
                                        @endif
                                    </div>                                </div>
                            </div>
                            <div class="form-group row p-t-20 {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                <div class="col-sm-6 ">
                                    <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Phone Number" name="phone">
                                </div>
                            </div>
                            <div class="row button-group text-center">
                                <div class="col-lg-2 offset-lg-5 offset-md-3 col-md-4">
                                    <button id="payment-button" class="btn waves-effect waves-light btn-block btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_scripts')
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
    <script src="{{url(asset('js/client/balance.js'))}}"></script>
@endsection