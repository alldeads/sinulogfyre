<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i>Summary</h3>
            </div>
            <div class="panel-body">
            	<table class="table table-bordered table-hover table-striped">
            		<tbody>
            			<tr>
	                        <td>Membership Date</td>
	                        <td>{{ Auth::user()->created_at }}</td>
	                    </tr>

                        <tr>
                            <td>Ticket Link</td>
                            <td>
                                <a href="https://sinulogfyre.com/{{ Auth::user()->token }}/tickets" target="_blank">https://sinulogfyre.com/{{ Auth::user()->token }}/tickets</a>
                            </td>
                        </tr>

	                    <tr>
	                        <td>Name:</td>
	                        <td>{{ Auth::user()->name }}</td>
	                    </tr> 

	                    <tr>
	                        <td>Email Address:</td>
	                        <td>{{ Auth::user()->email }}</td>
	                    </tr> 
            		</tbody>
            	</table>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-cog fa-spin fa-fw"></i>Realtime Orders</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <td> Date</td>
                            <td> Customer</td>
                            <td> Total</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach( $sales_summary as $sales )
                            <tr>
                                <td> {{ $sales->created_at }}</td>
                                <td> {{ $sales->details->full_name }}</td>
                                <td> {{ $sales->order->total_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>