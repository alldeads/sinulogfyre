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
                            <td>https://sinulogfyre.com/{{ Auth::user()->token }}/tickets</td>
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
</div>