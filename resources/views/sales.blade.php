@extends('layouts.dashboard')

@section('content')

	<div class="row">
	    <div class="col-lg-12">
	        <div class="panel panel-default">
	            <div class="panel-heading">
	                <h3 class="panel-title"><i class="fa fa-refresh fa-fw"></i>&nbsp;&nbsp;Sales Report</h3>
	            </div>
	            <div class="panel-body">
	            	<table class="table table-bordered table-hover table-striped">
	            		<thead>
	            			<tr>
	            				<td> Order Number</td>
	            				<td> Amount</td>
	            				<td> Quantity</td>
	            				<td> Date Created</td>
	            			</tr>
	            		</thead>
	            		{{-- <tbody>
	            			@foreach( $encashments as $encashment )
	            				<tr>
	            					<td> {{ $encashment->remittance_center == "PL" ? "Palawan Pawnshop" : $encashment->remittance_center }}</td>
	            					<td> {{ $encashment->amount }}</td>
	            					<td style="color:red;"> {{ ucfirst( $encashment->status ) }}</td>
	            					<td> {{ $encashment->created_at }}</td>
	            				</tr>
	            			@endforeach
	            		</tbody> --}}
	            	</table>
	            </div>
	        </div>
	    </div>
	</div>
@endsection