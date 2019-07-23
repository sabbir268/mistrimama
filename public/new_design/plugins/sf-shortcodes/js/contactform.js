/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/
jQuery(window).load(function () {
	var contactuscaptchaflag = 0;
		var contactusrecaptcha;
		
		function recaptcha_callback(captchaid,sitekey,theme){
	
			if(sitekey != ""){
			
			contactusrecaptcha = grecaptcha.render(captchaid, {
	
				  'sitekey' : sitekey,
		
				  'theme' : theme
		
			  });
			}
		}
		
		function reload_recaptcha(captchaid){
			grecaptcha.reset(contactusrecaptcha);
		}
		
		function recaptcha_initialize($this){
			var sitekey = $this.data('sitekey');
		
			var captchaid = $this.attr('id');
		
			var theme = $this.data('theme');	
			
			recaptcha_callback(captchaid,sitekey,theme);
		}
	
		//Request a Quote Captcha
		if (jQuery('#recaptcha_contactus').length){
		var $captchaid = jQuery("#recaptcha_contactus");
		
		if(contactuscaptchaflag == 0){
		contactuscaptchaflag = 1;
		recaptcha_initialize($captchaid);
		}else{
		reload_recaptcha($captchaid);	
		}
		}
});

// When the browser is ready...
jQuery(function() {
	'use strict';
	
		/*Contact Form*/
		jQuery('.contactform')
        .bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				uname: {
					validators: {
						notEmpty: {
							message: args.fullname
						}
					}
				},
				email: {
					validators: {
						notEmpty: {
														message: param.req
													},
						emailAddress: {
							message: args.email
						}
					}
				},
				comment: {
					validators: {
						notEmpty: {
							message: args.comment
						}
					}
				},
            }
        })
		.on('error.field.bv', function(e, data) {
            data.bv.disableSubmitButtons(false); // disable submit buttons on errors
	    })
		.on('status.field.bv', function(e, data) {
            data.bv.disableSubmitButtons(false); // disable submit buttons on valid
        })
        .on('success.form.bv', function(form) {
				// Prevent form submission
				form.preventDefault();
	
				// Get the form instance
				var $form = jQuery(form.target);
				// Get the BootstrapValidator instance
				var bv = $form.data('bootstrapValidator');
				jQuery(".alert").remove();
				var response = jQuery(".contactform textarea[name='g-recaptcha-response']").val();
				if(response == "" || response == 'undefined'){
					jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.contactform" );	
					$form.find('input[type="submit"]').prop('disabled', false);
					return false;
				}else{
					jQuery(".alert").remove();
				}
				
				var data = {
				  "action": "contactform"
				};
				
				var formdata = jQuery($form).serialize() + "&" + jQuery.param(data);
				
				jQuery.ajax({
	
							type: 'POST',
	
							url: ajaxurl,
							
							dataType: "json",
							
							beforeSend: function() {
								jQuery(".alert").remove();
								jQuery('.loading-area').show();
							},
							
							data: formdata,
	
							success:function (data, textStatus) {
								jQuery('.loading-area').hide();
								jQuery('form.contactform').find('input[type="submit"]').prop('disabled', false);	
								if(data['status'] == 'success'){
									jQuery('.contactform').bootstrapValidator('resetForm',true); // Reset form
									jQuery('input[name="phone"]').val(''); // Reset form
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.contactform" );	
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.contactform" );
								}
							
							}
	
						});
		});
	
});