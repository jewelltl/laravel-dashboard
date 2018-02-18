@extends('layouts.dashboard')

@section('styles')
 <link href="{{url('css/admin/pages/float-chart.css')}}" rel="stylesheet">
@endsection

@section('title')
    Dashboard
@endsection


@section('content')


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard 1</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Dashboard 1</li>
        </ol>
    </div>
    <div class="col-md-7 align-self-center text-right d-none d-md-block">
        <button type="button" class="btn btn-info"><i class="fa fa-plus-circle"></i> Create New</button>
    </div>
    <div class="">
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Info box -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$ <span id="balance"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->balance}}</span></h2>
                        <h6 class="text-muted m-b-0">Balance</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$ <span id="available_credit"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->available_credit}}</span></h2>
                        <h6 class="text-muted m-b-0">Avaliable Credit</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-info icon-Dollar-Sign"></i></div>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$ <span id="current_due"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->current_due}}</span></h2>
                        <h6 class="text-muted m-b-0">Current Due</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-primary icon-Inbox-Forward"></i></div>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$ <span id="past_due"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->past_due}}</span></h2>
                        <h6 class="text-muted m-b-0">Past Due</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-danger icon-Contrast"></i></div>
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:3px;"> <span class="sr-only">50% Complete</span></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
</div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Over Visitor, Our income , slaes different and  sales prediction -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Moving Line Chart Example</h4>
                    <div class="flot-chart">
                        {{-- <div class="flot-chart-content" id="flot-line-chart-moving"></div> --}}

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h5 class="card-title">Browser Stats</h5>
                        <table class="table browser m-t-30 no-border">
                            <tbody>
                                <tr>
                                    <td>Terms</td>
                                    <td class="text-right">
                                        <strong id="terms">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->terms}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Average Seizure Raito</td>
                                    <td class="text-right">
                                        <strong id="asr">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->asr}}</strong> %
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requests Canclled</td>
                                    <td class="text-right">
                                        <strong id="requests_cancelled">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->requests_cancelled}}</strong> %
                                    </td>
                                </tr>
                                <tr>
                                    <td>Billed Minues</td>
                                    <td class="text-right">
                                        <strong id="billed_minutes">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->billed_minutes}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Calls</td>
                                    <td class="text-right">
                                        <strong id="total_calls">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->total_calls}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Connected Calls</td>
                                    <td class="text-right">
                                        <strong id="connected_calls">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->connected_calls}}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Short Calls</td>
                                    <td class="text-right">
                                        <strong id="short_calls">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->short_calls}}</strong> %
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- ============================================================== -->
<!-- End Info box -->
<!-- ============================================================== -->


@endsection

@section('page_scripts')
    
    <script src="{{url(asset('plugins/flot/excanvas.js'))}}"></script>
    <script src="{{url(asset('plugins/flot/jquery.flot.js'))}}"></script>
    <script src="{{url(asset('plugins/flot/jquery.flot.pie.js'))}}"></script>
    <script src="{{url(asset('plugins/flot/jquery.flot.time.js'))}}"></script>
    <script src="{{url(asset('plugins/flot/jquery.flot.stack.js'))}}"></script>
    <script src="{{url(asset('plugins/flot/jquery.flot.crosshair.js'))}}"></script>
    <script src="{{url(asset('plugins/flot.tooltip/js/jquery.flot.tooltip.min.js'))}}"></script>
@endsection
@section('scripts')
    <script src="{{url(asset('js/client/dashboard.js'))}}"></script>
@endsection