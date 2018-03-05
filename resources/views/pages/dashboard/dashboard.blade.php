@extends('layouts.dashboard')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/morrisjs/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/icons/simple-line-icons/css/simple-line-icons.css')}}">
@endsection

@section('title')
    Voyyp | Dashboard
@endsection


@section('content')


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
                    <div class="align-self-center display-6 m-r-20"><i class="text-success icon-wallet"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$<span id="balance">{{Auth::user()->Stats == null ? '0' : number_format( Auth::user()->Stats->balance ,2, '.', ',') }}</span> <small></small></h2>
                        <h6 class="text-muted m-b-0">Account Balance</h6>
                    </div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="icon-clock"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="billed_minutes"> {{Auth::user()->Stats == null ? '0' : number_format(Auth::user()->Stats->billed_minutes ,0, '.', ',')}}</span>
                            <small></small></h2>
                        <h6 class="text-muted m-b-0">Billed Minutes</h6>
                    </div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="icon-call-out"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="total_calls"> {{Auth::user()->Stats == null ? '0' : number_format(Auth::user()->Stats->total_calls ,0, '.', ',')}}</span></h2>
                        <h6 class="text-muted m-b-0">Total Calls</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="icon-bubbles"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="connected_calls" class="m-b-0">{{Auth::user()->Stats == null ? '0' : number_format(Auth::user()->Stats->connected_calls ,0, '.', ',')}}</span><small></small></h2>
                        <h6 class="text-muted m-b-0">Calls Connected</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-danger icon-wallet"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$<span id="spent_today" class="m-b-0">{{Auth::user()->Stats == null ? '0' : number_format(Auth::user()->Stats->spent_today ,2, '.', ',')}}</span><small></small></h2>
                        <h6 class="text-muted m-b-0">Spent Today</h6>
                    </div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="icon-speedometer"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="short_calls"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->short_calls}}</span>%
                            <small></small></h2>
                        <h6 class="text-muted m-b-0">Short Calls</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="icon-call-end"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="canceled_calls"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->canceled_calls}}</span>%<small></small></h2>
                        <h6 class="text-muted m-b-0">Calls Canceled</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="icon-bubbles"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="asr"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->asr}}</span>%</h2>
                        <h6 class="text-muted m-b-0">Answer Rate (ASR)</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                     <div class="d-flex no-block">
                        <div>
                            <h5 class="card-title m-b-0">Dial History</h5>
                        </div>
                        <div class="ml-auto">
                            <ul class="list-inline text-center font-12">
                                <li><i class="fa fa-circle text-success"></i> Active</li>
                                <li><i class="fa fa-circle text-info"></i> ASR</li>
                                <li><i class="fa fa-circle text-primary"></i> CPS</li>
                                <li><i class="fa fa-circle text-danger"></i> Ports</li>
                            </ul>
                        </div>
                    </div>
                    <div id="dial-history-chart" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h4 class="card-title m-b-0">Call Detail Records</h4>
                        <div class="dashboard-message">
                            <p>We are currently working on automatically placing your CDRs on your dashboard. In the mean time, if you would like to access your Call Detail Records, please send an email to <a href="mailto:support@voyyp.com">support@voyyp.com</a> with the date(s) you would like to see.
                            </p>
                        </div>
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
    <script src="{{ asset('plugins/raphael/raphael.js') }}"></script>
    <script src="{{ asset('plugins/morrisjs/morris.js') }}"></script>
    <script src="{{ asset('plugins/jquery-number-master/jquery.number.js') }}"></script>
    <script type="text/javascript">
        var chartData =  {!! $chartdata !!}
    </script>
@endsection
@section('scripts')
    <script src="{{url(asset('js/client/dashboard.js'))}}"></script>
@endsection