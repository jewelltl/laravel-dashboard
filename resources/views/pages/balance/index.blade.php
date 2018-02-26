@extends('layouts.dashboard')

@section('styles')
 <link href="{{url('css/admin/pages/tab-page.css')}}" rel="stylesheet">
@endsection

@section('title')
   Voyyp | Balance
@endsection


@section('content')



<div class="row">
    @include('pages.balance.add_credit_component')
</div>
<div class="row">
    <div class="col-sm-12">
        @include('pages.balance.add_card_component')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('pages.balance.billing_history_component')
    </div>
</div>



@endsection

@section('page_scripts')
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.braintreegateway.com/js/braintree-2.30.0.min.js"></script>
    <script src="{{url(asset('js/client/balance.js'))}}"></script>
@endsection