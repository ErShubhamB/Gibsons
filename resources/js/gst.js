$(document).ready(function(){
	$('.summernote').summernote({});
	$('.popover').hide();
	$('#change_avatar').on('click',function(){
        $('#avatar').trigger('click');
    });
    /*avatar change */
    $('#avatar').change(function(){
        //alert("uploading");
        $("#change_avatar").html('Uploding Image');
        $("#loader").removeClass('fadeOut');
        
        var file_data = $('#avatar').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        $.ajax({
            url: '/update-user-avatar',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function success(e) {
                //$('#p_small').attr('src','/images/'+e);
                $('#profile_img').attr('src', '/uploads/' + e);
            }
        }).done(function () {
        	$("#change_avatar").html('Change Avatar');
        	$("#loader").addClass('fadeOut');
        });
        
    });
    $(".change_pwd_btn").on('click',function(){
        $('.change_pwd_btn').hide();
        $(".pwd").removeClass('chng_pwd');
        $("#new_name").focus();
    });
    $('#claimform').on('submit',function(){
        if($.trim($('#gstin').val()) == '' || $.trim($('#gst_attachment').val()) == ''){
            new PNotify({
                title: 'Whops!',
                text: 'Looks like some important fields are missing! Please make sure you fill all the fields.',
                type: 'warning'
            });
            return false;
        }
        $('#uploadBtn').attr('disabled',true);
        $('#uploadBtn').html('Please wait...');
       /**
       * ajax call to save data
       */ 
        var response;
        var file_data = $('#gst_attachment').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('claim_details', $('#claimDetails').val());
        form_data.append('gstin', $('#gstin').val());
        form_data.append('claimAmount', $('#claimAmount').val());
        $("#loader").removeClass('fadeOut');
       $.ajax({
            url: '/add-new-claim',
            type: 'POST',
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function success(resp) {
                response = resp;
                $("#loader").addClass('fadeOut');
            },
            error:function error(e){
                new PNotify({
                    title: 'Whops!',
                    text: 'Something went wrong! Please try again.',
                    type: 'error'
                });
                $("#loader").addClass('fadeOut');
                return false;
            }
        }).done(function(){
            response = JSON.parse(response);
            if(response[0].status == 200){
                new PNotify({
                    title: 'Great!',
                    text: 'We have received your claim. Please check your email for details.',
                    type: 'success'
                });
                $("#claimform").trigger('reset');
                $('.summernote').summernote('code', '');
            }else{
                new PNotify({
                    title: 'Whops!',
                    text: 'Something went wrong! Please try again.',
                    type: 'error'
                });
            }
            $('#uploadBtn').attr('disabled',false);
            $('#uploadBtn').html('Claim');
            $("#loader").addClass('fadeOut');
        })
    });
});