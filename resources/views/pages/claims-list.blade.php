@extends('layouts.app')

@section('content')

<div class="">
           
	<div class="container-fluid">
	  <h4 class="c-grey-900 mT-10 mB-30">Claims</h4>
	  <div class="row">
	    <div class="col-md-12">
	      <div class="bgc-white bd bdrs-3 p-20 mB-20">
	        <h4 class="c-grey-900 mB-20">Claims List</h4>
	        
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	            <thead>
	              <tr>
	                <th>GSTIN #</th>
	                <th>Return Amount</th>
	                <th>Claim Details</th>
	                <th>Claim Date</th>
	                <th>Claim Status</th>
	              </tr>
	            </thead>
	            <tbody>
	              @if(count($claims) == 0)
	              	<tr>
	                	<td colspan="5">
	                		<h5 class="text-center">No Claims filed.</h5>
	                	</td>
	            	</tr>
	              @else
	              	@foreach($claims as $claim_data)
	              <tr>
	                <td>{{$claim_data->gstin_number}}<a class="c-red-500 pull-right" href="/uploads/{{$claim_data->attachment}}" download><i class="ti-download c-deep-red-500"></i></a></td>
	                <td >&#8377; {!! number_format($claim_data->return_amount	,2, '.', ',') !!}</td>
	                <td class="d-none d-sm-block">{!! $claim_data->claim_details !!}</td>
	                <td>{{Carbon\Carbon::parse($claim_data->created_at)->format('l,d M Y')}}</td>
	                @if($claim_data->claim_status == 0)
	                	<td class="c-deep-purple-500">Request Received <i class="ti-import"></i></td>
	                @elseif($claim_data->claim_status == 1)
	                	<td class="c-deep-purple-500">Processing <i class="ti-reload"></i></td>
	                @elseif($claim_data->claim_status == 2)
	                	<td class="c-green-500">Approved <i class="ti-check"></i></td>
	                @elseif($claim_data->claim_status == 3)
	                	<td class="c-red-500">Rejected <i class="ti-close"></i></td>
	                @endif


	              </tr>
	              @endforeach
	              @endif
	           
	            </tbody>
            </table>
       </div>
    </div>
  </div>
</div>
</div>
@endsection
