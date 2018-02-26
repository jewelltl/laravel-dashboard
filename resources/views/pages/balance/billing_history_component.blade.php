
<div class="card card-body">
    <h2 class="card-title">Billing History</h2>
    <div class="row">
        <div class="offset-sm-1 col-sm-10 col-xs-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        @foreach($histories as $index=>$history)
                            <tr>
                                <td>{{ $history->created_at->diffForHumans() }}</td>
                                <td>
                                    <img src="{{$history->PaymentMethod()->imageUrl}}"> 
                                </td>
                                <td>${{ $history->amount }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="text-center">
                        {{$histories->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>