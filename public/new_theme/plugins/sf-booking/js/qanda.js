// JavaScript Document
jQuery(document).ready(function() {
'use strict';			
	//Do Voting
	 jQuery('body').on('click', '.dovote', function (e) {
		var postid = jQuery(this).data('postid');
		var vote = jQuery(this).attr('data-vote');
		var $this = jQuery(this);
		
		var data = {
			  "action": "updatevoting",
			  "postid": postid,
			  "vote": vote,
			};
			
		var formdata = jQuery.param(data);
		
		jQuery.ajax({
					type: 'POST',
					url: ajaxurl,
					dataType: "json",
					beforeSend: function() {
						jQuery(".alert-success,.alert-danger").remove();
						jQuery('.loading-area').show();
					},
					data: formdata,
					success:function (data, textStatus) {
						jQuery('.loading-area').hide();
						jQuery('#doupvote-'+postid).addClass('alreadyvote');
						jQuery('#doupvote-'+postid).removeClass('dovote');
						
						jQuery('#dodownvote-'+postid).addClass('alreadyvote');
						jQuery('#dodownvote-'+postid).removeClass('dovote');
						
						jQuery('#upvotes-'+postid).html(data['upvotes']);
						jQuery('#downvotes-'+postid).html(data['downvotes']);
					}
				});

        return false;
    });
	
	
	//Add question
    jQuery('.add-question')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
        })
        .on('success.form.bv', function(form) {
            tinyMCE.triggerSave();
			// Prevent form submission
			form.preventDefault();

            // Get the form instance
            var $form = jQuery(form.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
			
			var data = {
			  "action": "add_question",
			};
			
			var formdata = jQuery($form).serialize() + "&" + jQuery.param(data);
			
			jQuery.ajax({
						type: 'POST',
						url: ajaxurl,
						dataType: "json",
						beforeSend: function() {
							jQuery(".alert-success,.alert-danger").remove();
							jQuery('.loading-area').show();
						},
						data: formdata,
						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							$form.find('input[type="submit"]').prop('disabled', false);
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertAfter( "#footer" );	
								jQuery('form.add-question')[0].reset();
								window.location.reload();
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertAfter( "#footer" );
							}
						}
					});
			
    });
		
	//Add answer
    jQuery('.add-answer')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
			fields: {
				answer_description: {
					validators: {
						notEmpty: {
							message: param.req
						}
					}
				},
            }
        })
        .on('success.form.bv', function(form) {
            tinyMCE.triggerSave();
			// Prevent form submission
			form.preventDefault();

            // Get the form instance
            var $form = jQuery(form.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
			
			var data = {
			  "action": "add_answer",
			};
			
			var formdata = jQuery($form).serialize() + "&" + jQuery.param(data);
			
			jQuery.ajax({
						type: 'POST',
						url: ajaxurl,
						dataType: "json",
						beforeSend: function() {
							jQuery(".alert-success,.alert-danger").remove();
							jQuery('.loading-area').show();
						},
						data: formdata,
						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							$form.find('input[type="submit"]').prop('disabled', false);
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "#sf-provider-extended" );
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( ".sf-ques-header" );
								window.setTimeout(function(){
									window.location.href = data['redirecturl'];
									location.reload();
								}, 2000);
								
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "#sf-provider-extended" );
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( ".sf-ques-header" );
							}
						}
					});
			
    });	
});// Document.ready END====================================================//

