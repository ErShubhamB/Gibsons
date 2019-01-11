<?php $__env->startSection('content'); ?>

<div class="">
           
	<div class="container-fluid">
	  <h4 class="c-grey-900 mT-10 mB-30">Claims</h4>
	  <div class="row">
	    <div class="col-md-8 offset-md-2">
	      <div class="bgc-white bd bdrs-3 p-20 mB-20">
	        <h4 class="c-grey-900 mB-20">File New Claim</h4>
            <div class="mT-30">
            	<form id="claimform" onsubmit="return false;">
            		<?php echo csrf_field(); ?>
            		<div class="form-group">
            			<label for="gstin">GSTIN #</label>
            			<input required type="text" class="form-control" id="gstin" name="gstin" aria-describedby="emailHelp" placeholder="GSTIN #"> 
            			<small id="emailHelp" class="form-text text-muted">Enter your valid GSTIN #</small>
            		</div>
            		<div class="form-group">
            			<label for="gst_attachment">Relevant Attachment</label>
            			<input required type="file" class="form-control" id="gst_attachment" name="gst_attachment" placeholder="Attachment" accept="application/pdf,image/x-png,image/gif,image/jpeg">
            			<small id="emailHelp" class="form-text text-muted">
                            Please uplod .pdf / .jpg files less than 20MB         
                        </small>

            		</div>
            		<div class="form-group">
            			<label for="claimAmount">Return Claim Amount</label>
            			<input required type="" class="form-control" id="claimAmount" name="claimAmount" placeholder="&#8377; 0.00">
            		</div>
                    <div class="form-group">
                        <label for="claimDetails">Return Details</label>
                        <textarea class="form-control summernote" id="claimDetails" name="claimDetails" placeholder="&#8377; 0.00"></textarea>
                    </div>
            		<button type="submit" class="btn customBtn" id="uploadBtn">Claim</button></form></div>
       </div>
    </div>
  </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>