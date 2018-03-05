
<div class="card card-body">
    <h2 class="card-title">Billing History</h2>
    <div class="row">
        <div class="offset-md-1 col-md-10 col-sm-12 col-xs-12">
            <div class="table-responsive">
                @if (count($histories) > 0)
                    <table class="table">
                        <thead class="text-center">
                            <th>Date</th>
                            <th>Payment Method</th>
                            <th>Amount</th>
                        </thead>
                        <tbody>
                            @foreach($histories as $index=>$history)
                                @if($history->type == 1)
                                    <tr class="text-center">
                                        <td>{{ $history->created_at->format('m-d-Y h:i:s A T') }}</td>
                                        <td>
                                            @if(isset($history->PaymentMethod()->maskedNumber))
                                                **** - {{$history->PaymentMethod()->last4}}
                                            @else
                                                {{$history->PaymentMethod()->email}}
                                            @endif
                                        </td>
                                        <td>${{ $history->amount }}</td>
                                    </tr>
                                @else
                                    <tr class="text-center">
                                        <td>{{ $history->created_at->format('m-d-Y h:i:s A T') }}</td>
                                        <td>
                                           
                                        </td>
                                        <td>- ${{ $history->amount }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info m-t-10" role="alert">
                      There is currently no payment history to display.
                    </div>
                @endif
                
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