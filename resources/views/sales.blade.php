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
	            				<td> Ticket</td>
	            				<td> Amount</td>
	            				<td> Quantity</td>
	            				<td> Status</td>
	            				<td> Date Created</td>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach( $payments as $payment )
	            				<tr>
	            					<td> {{ $payment->order->order_number }}</td>
	            					<td> {{ $payment->order->product->name }}</td>
	            					<td> {{ $payment->order->total_price }}</td>
	            					<td> {{ $payment->order->quantity }}</td>
	            					<td style="color:red;"> {{ ucfirst($payment->status)}}</td>
	            					<td> {{ $payment->created_at }}</td>
	            				</tr>
	            			@endforeach
	            		</tbody>
	            	</table>

	            	{{ $payments->links() }}
	            </div>
	        </div>
	    </div>
	</div>
@endsection