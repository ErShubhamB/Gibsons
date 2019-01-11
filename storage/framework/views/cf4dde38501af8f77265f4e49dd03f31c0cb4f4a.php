<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
  <div class="panel-heading"><i class="fas fa-building"></i> <?php echo e($page_data['page_title']); ?></div>
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
	    <?php $__currentLoopData = $page_data['claim_list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	      <th scope="row"><?php echo e($count); ?></th>
	      <td><?php echo getUserNameById($claim->user_id); ?></td>
	      <td><?php echo e($claim->gstin_number); ?></td>
	      <td>
	      	&#8377; <?php echo number_format($claim->return_amount	,2, '.', ','); ?>

	      </td>
	      	<?php if($claim->claim_status == 0): ?>
            	<td><span class='btn btn-xs btn-warning'>New Return Request</span></td>
            <?php elseif($claim->claim_status == 1): ?>
            	<td><span class='btn btn-xs btn-info'>Processing</span> </td>
            <?php elseif($claim->claim_status == 2): ?>
            	<td><span class='btn btn-xs btn-success'>Approved</span></td>
            <?php elseif($claim->claim_status == 3): ?>
            	<td><span class='btn btn-xs btn-danger'>Rejected</span></td>
            <?php endif; ?>
	      <td>
	      	<?php echo e(Carbon\Carbon::parse($claim->created_at)->format('l,d M Y')); ?>

	      </td>
	      <td>
	      <?php if(CRUDBooster::isUpdate() && $button_edit): ?>
        <?php if($claim->claim_status == 0 || $claim->claim_status == 1): ?>
        <div class="dropdown">
          <button type="button" class='btn btn-success btn-xs' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Change Status</button>
          <ul class="dropdown-menu">
            <?php if($claim->claim_status == 0): ?>
              <li><a href="javascript:void(0)" data-id="<?php echo e($claim->id); ?>" data-mode="p" class="changeStatus">Mark as Processing</a></li>
            <?php elseif($claim->claim_status == 1): ?>
              <li><a href="javascript:void(0)" data-id="<?php echo e($claim->id); ?>" data-mode="s" class="changeStatus">Mark as Approved</a></li>
              <li><a href="javascript:void(0)" data-id="<?php echo e($claim->id); ?>" data-mode="r" class="changeStatus">Mark as Rejected</a></li>
            <?php endif; ?>
          </ul>
        </div>
        <?php elseif($claim->claim_status == 2 || $claim->claim_status == 3): ?>
        <span class='btn btn-warning btn-xs'>No Changes Allowed</span>
          <?php endif; ?>
          <?php endif; ?>
	      </td>
	    </tr>
	    <?php $count++; ?>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	  </tbody>
</table>

  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('crudbooster::admin_template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>