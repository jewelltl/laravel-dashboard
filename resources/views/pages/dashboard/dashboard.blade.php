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
    <!-- Column -->
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="price">0</span></h2>
                        <h6 class="text-muted m-b-0">Laravel Pusher</h6>
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
                        <h2 class="m-b-0">$6,759</h2>
                        <h6 class="text-muted m-b-0">This Week</h6>
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
                        <h2 class="m-b-0">2,356</h2>
                        <h6 class="text-muted m-b-0">Emails Sent</h6>
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
                        <h2 class="m-b-0">38</h2>
                        <h6 class="text-muted m-b-0">Deals in Pipeline</h6>
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
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Moving Line Chart Example</h4>
                <div class="flot-chart">
                    <div class="flot-chart-content" id="flot-line-chart-moving"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-6 col-md-12">
        <div class="card o-income">
            <div class="card-body">
                <div class="d-flex m-b-30 no-block">
                    <h5 class="card-title m-b-0 align-self-center">Our Income</h5>
                    <div class="ml-auto">
                        <select class="custom-select b-0">
                            <option selected="">January</option>
                            <option value="1">February</option>
                            <option value="2">March</option>
                            <option value="3">April</option>
                        </select>
                    </div>
                </div>
                <div id="income" style="height:260px; width:100%;"></div>
                <ul class="list-inline m-t-30 text-center font-12">
                    <li><i class="fa fa-circle text-success"></i> Growth</li>
                    <li><i class="fa fa-circle text-info"></i> Net</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- ============================================================== -->
<!-- Sales Chart and browser state-->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- End Sales Chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- End Page Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Right sidebar -->
<!-- ============================================================== -->
<!-- .right-sidebar -->

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