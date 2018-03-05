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