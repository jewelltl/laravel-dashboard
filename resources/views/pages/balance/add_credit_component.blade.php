<div class="col-md-6">
    <div class="card card-body">
        <div class="row">
            <div class="col-xs-12 offset-sm-2 col-sm-8">
                <form method="post" action="{{url('balance/add_credit')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="customerId" value="{{$main_method}}" id="main_method">
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
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control text-right" placeholder="50" aria-label="Amount (to the nearest dollar)" value="{{old('amount') != null ? old('amount') : 50}}" name="amount">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-success waves-effect waves-light m-r-10">Add Credit Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card card-body">
       <div class="row">
            <div class="col-xs-12 offset-sm-2 col-sm-8">
                <h2 class="text-center">Your Balance</h2>
                <h2 class="text-center"><strong>${{$balance}}</strong></h2>
            </div>
        </div>
    </div>
</div>