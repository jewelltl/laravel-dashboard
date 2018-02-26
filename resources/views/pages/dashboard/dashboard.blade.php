@extends('layouts.dashboard')

@section('styles')

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
                    <div class="align-self-center display-6 m-r-20"><i class="text-success icon-Dollar-Sign"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$161.86 <small></small></h2>
                        <h6 class="text-muted m-b-0">Account Balance</h6>
                    </div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-danger icon-Contrast"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">20,031.70
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
                    <div class="align-self-center display-6 m-r-20"><i class="text-info icon-Target-Market"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">87,179</h2>
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
                    <div class="align-self-center display-6 m-r-20"><i class="text-primary icon-Inbox-Forward"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">48,729<small></small></h2>
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
                    <div class="align-self-center display-6 m-r-20"><i class="text-danger icon-Dollar-Sign"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$62.61 <small></small></h2>
                        <h6 class="text-muted m-b-0">Spent Today</h6>
                    </div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-danger icon-Contrast"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">12.90%
                            <small></small></h2>
                        <h6 class="text-muted m-b-0">Short Calls</h6>
                    </div>
                </div>
            </div>
        </div>
    </div><div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-info icon-Target-Market"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">55.90%</h2>
                        <h6 class="text-muted m-b-0">Answer Rate(ASR)</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-self-center display-6 m-r-20"><i class="text-primary icon-Inbox-Forward"></i></div>
                    <div class="align-slef-center">
                        <h2 class="m-b-0">28.41%<small></small></h2>
                        <h6 class="text-muted m-b-0">Calls Canceled</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-lg-2 col-md-4">
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
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-2 col-md-4">
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
            
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-2 col-md-4">
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
            
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-2 col-md-4">
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
        </div>
    </div>
    <div class="col-lg-2 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <strong id="terms" class="m-b-0">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->terms}}</strong>
                        <h6 class="text-muted m-b-0">Terms</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-danger icon-Contrast"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="short_calls"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->short_calls}}</span> %</h2>
                        <h6 class="text-muted m-b-0">Short Calls</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-danger icon-Contrast"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
</div>
<div class="row">
    <div class="col-lg-3 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="asr"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->asr}}</span> % </h2>
                        <h6 class="text-muted m-b-0">Average Seizure Raito</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-success icon-Target-Market"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-3 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0"><span id="requests_cancelled"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->requests_cancelled}}</span> %</h2>
                        <h6 class="text-muted m-b-0">Requests Cancelled</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-info icon-Dollar-Sign"></i></div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-2 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$ <span id="billed_minutes"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->billed_minutes}}</span></h2>
                        <h6 class="text-muted m-b-0">Billed Minues</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-primary icon-Inbox-Forward"></i></div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-2 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <h2 class="m-b-0">$ <span id="total_calls"> {{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->total_calls}}</span></h2>
                        <h6 class="text-muted m-b-0">Total Calls</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-danger icon-Contrast"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex p-10 no-block">
                    <div class="align-slef-center">
                        <strong id="connected_calls" class="m-b-0">{{Auth::user()->Stats == null ? '0' : Auth::user()->Stats->connected_calls}}</strong>
                        <h6 class="text-muted m-b-0">Connected Calls</h6>
                    </div>
                    <div class="align-self-center display-6 ml-auto"><i class="text-danger icon-Contrast"></i></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
</div> --}}
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
                    <h4 class="card-title"> Chart</h4>
                    <div id="main" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="card" style="width: 100%">
                    <div class="card-body">
                        <h4 class="card-title">Call Detail Records</h4>
                        <table class="table browser m-t-30 no-border">
                            <tbody>
                                @for ($i=0; $i < 8; $i++) 
                                    <tr>
                                        <td>02-01-2018</td>
                                        <td>
                                           73.444Minutes 
                                        </td>
                                        <td>
                                            <a href="#" class="text-success">Download</a>
                                        </td>
                                    </tr>
                                @endfor
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
    <script src="{{url(asset('plugins/echarts/echarts-all.js'))}}"></script>
    <script type="text/javascript">
        var chartData =  {!! $chartdata !!}
    </script>
@endsection
@section('scripts')
    <script src="{{url(asset('js/client/dashboard.js'))}}"></script>
@endsection