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
                <h4 class="card-title">Payment Methods</h4>
                <h6 class="">Please enter your preferred payment method below. You can use a credit card or prepay through PayPal.</h6>
                    <div class="p-20">
                        <a href="{{route('client.add_card')}}" class="btn waves-effect waves-light btn-primary pull-right">Add Card/PayPal</a>
                        <h3>Credit or debit cards</h3>
                        <h4>Card will be charged monthly for resources used</h4>
                        <h5>All major credit cards accepted</h5>
                        <hr class="mt-40">
                        <table class="table m-t-40">
                            <thead>
                                <th>#</th>
                                <th>Info</th>
                                <th>Payment Method</th>
                                <th>Expires On</th>
                                <th></th>
                            </thead>
                            <tbody>
                                {{--  --}}    
                            </tbody>
                        </table>
                        
                        
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
    <script src="{{url(asset('js/client/balance.js'))}}"></script>
@endsection