@extends('crudbooster::admin_template')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading"><i class="fas fa-building"></i> {{$page_data['page_title']}}</div>
  <div class="panel-body">
  	<table class="table property_listing_table <?php if(!empty($page_data['claim_list']) > 0){
  		?>
  		datatables-simple
  		<?php
  	}

  	?> ">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Client Name</th>
	      <th scope="col">GSTIN #</th>
	      <th scope="col">Return Amount</th>
	      <th scope="col">Claim Status</th>
	      <th scope="col">Claim Date</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	    <?php $count = 1; ?>
	    @foreach($page_data['claim_list'] as $claim)
	      <th scope="row">{{$count}}</th>
	      <td>{!! getUserNameById($claim->user_id) !!}</td>
	      <td>{{ $claim->gstin_number }}</td>
	      <td>
	      	&#8377; {!! number_format($claim->return_amount	,2, '.', ',') !!}
	      </td>
	      	@if($claim->claim_status == 0)
            	<td><span class='btn btn-xs btn-warning'>New Return Request</span></td>
            @elseif($claim->claim_status == 1)
            	<td><span class='btn btn-xs btn-info'>Processing</span> </td>
            @elseif($claim->claim_status == 2)
            	<td><span class='btn btn-xs btn-success'>Approved</span></td>
            @elseif($claim->claim_status == 3)
            	<td><span class='btn btn-xs btn-danger'>Rejected</span></td>
            @endif
	      <td>
	      	{{Carbon\Carbon::parse($claim->created_at)->format('l,d M Y')}}
	      </td>
	      <td>
	      @if(CRUDBooster::isUpdate() && $button_edit)
        @if($claim->claim_status == 0 || $claim->claim_status == 1)
        <div class="dropdown">
          <button type="button" class='btn btn-success btn-xs' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Status</button>
          <ul class="dropdown-menu">
            @if($claim->claim_status == 0)
              <li><a href="javascript:void(0)" data-id="{{$claim->id}}" data-mode="p" class="changeStatus">Mark as Processing</a></li>
            @elseif($claim->claim_status == 1)
              <li><a href="javascript:void(0)" data-id="{{$claim->id}}" data-mode="s" class="changeStatus">Mark as Approved</a></li>
              <li><a href="javascript:void(0)" data-id="{{$claim->id}}" data-mode="r" class="changeStatus">Mark as Rejected</a></li>
            @endif
          </ul>
        </div>
        @elseif($claim->claim_status == 2 || $claim->claim_status == 3)
        <span class='btn btn-warning btn-xs'>No Changes Allowed</span>
          @endif
          @endif
	      </td>
	    </tr>
	    <?php $count++; ?>
	    @endforeach
	  </tbody>
</table>

  </div>
</div>
@endsection