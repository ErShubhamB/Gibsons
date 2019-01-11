$(document).ready(function(){
	/**
	* CHANGE STATUS OF CLAIM STARTS
	*/
	$(document).on('click','.changeStatus',function(){
		var mode = $(this).attr('data-mode');
		var id = $(this).attr('data-id');
		var status = 's';
		if(mode == 's'){
			status = 'Approved';
		}else if(mode == 'r'){
			status = 'Rejected';

		}else if(mode == 'p'){
			status = 'Processing';

		}
		swal({
		  title: "Are you sure?",
		  text: "Change staus of this claim to "+status+" ?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes",
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		},
		function(){
			var form_data = new FormData();
			form_data.append('id',id);
			form_data.append('mode',mode);
			var response = '';
		  $.ajax({
            url: '/update-claim-status',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function success(e) {
                response = e;
            }
	        }).done(function(){
	        	response = JSON.parse(response);
	        	if(response[0].status == 200){
	        		swal("Status Changed Successfully!");
	        	}else{
	        		swal("Something went wrong!");

	        	}
	        	setTimeout(function () {
				    location.reload();
				  }, 2000);
	        });
		});
	});
	/**
	* CHANGE STATUS OF CLAIM ENDS
	*/
});