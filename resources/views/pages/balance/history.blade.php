@extends('layouts.dashboard')

@section('styles')
 <link href="{{url('css/admin/pages/tab-page.css')}}" rel="stylesheet">
@endsection

@section('title')
    Transaction History
@endsection


@section('content')


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Transcation</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Balance</li>
            <li class="breadcrumb-item active">Hisrory</li>
        </ol>
    </div>
    <div class="col-md-7 align-self-center text-right d-none d-md-block">
        
    </div>
    <div class="">
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Billing History</h4>
                <h6 class="">Lorem Ipsum is simply dummy text of the printing & type setting industry.</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>#</th>
                                <th>Method</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </thead>
                            <tbody>
                                @foreach($histories as $index=>$history)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>

                                            <img src="{{$history->PaymentMethod()->imageUrl}}"> 
                                        </td>
                                        <td>${{ $history->amount }}</td>
                                        <td>{{ $history->created_at->format('m/d Y') }}</td>
                                    </tr>
                                @endforeach
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
    
@endsection