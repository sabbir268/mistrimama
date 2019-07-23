/*****************************************************************************
*
*	copyright(c) - aonetheme.com - Service Finder Team
*	More Info: http://aonetheme.com/
*	Coder: Service Finder Team
*	Email: contact@aonetheme.com
*
******************************************************************************/

// When the browser is ready...
  jQuery(function() {
	'use strict';
	var requestquotecaptchaflag = 0;
	var quoterecaptcha;
	
	jQuery("#allrelatedproviders").on('click',function() { // bulk checked
        var status = this.checked;
         jQuery(".quote-relatedprovider").each( function() {
            jQuery(this).prop("checked",status);
        });
    });
	
	jQuery(".togglerelatedproviders").on('click',function() { // bulk checked
        jQuery('.show-quoterelated-providers').show();
		jQuery('.toggle-quoterelated-providers').hide();
		jQuery('.get-quote input[type="submit"]').hide();
		jQuery('.modal-dialog').addClass('modal-lg');
    });
	
	jQuery(".hiderelatedproviders").on('click',function() { // bulk checked
        jQuery('.show-quoterelated-providers').hide();
		jQuery('.toggle-quoterelated-providers').show();
		jQuery('.get-quote input[type="submit"]').show();
		jQuery('.modal-dialog').removeClass('modal-lg');
    });
	
	function recaptcha_callback(captchaid,sitekey,theme){

		if(sitekey != ""){
		
		quoterecaptcha = grecaptcha.render(captchaid, {

			  'sitekey' : sitekey,
	
			  'theme' : theme
	
		  });
		}
	}
	
	function reload_recaptcha(captchaid){
		grecaptcha.reset(quoterecaptcha);
	}
	
	function recaptcha_initialize($this){
		var sitekey = $this.data('sitekey');
	
		var captchaid = $this.attr('id');
	
		var theme = $this.data('theme');	
		
		recaptcha_callback(captchaid,sitekey,theme);
	}
	
	jQuery('#quotes-Modal').on('hide.bs.modal', function() {
		jQuery('.get-quote').bootstrapValidator('resetForm',true); // Reset form
		jQuery('.show-quoterelated-providers').hide();
		jQuery('.toggle-quoterelated-providers').show();
		jQuery('.get-quote input[type="submit"]').show();
		jQuery('.modal-dialog').removeClass('modal-lg');
	});
	
	jQuery('#quotes-Modal').on('show.bs.modal', function (event) {
		//Request a Quote Captcha
		if (jQuery('#recaptcha_requestquotepopup').length){
		var $captchaid = jQuery("#recaptcha_requestquotepopup");
		
		if(requestquotecaptchaflag == 0){
		requestquotecaptchaflag = 1;
		recaptcha_initialize($captchaid);
		}else{
		reload_recaptcha($captchaid);	
		}
		}														  
		jQuery('.modal-dialog').removeClass('modal-sm');
	});
	
	var provider_id = '';
	
	provider_id = jQuery('#proid').attr('data-provider');
	
	// Get Quotetion Form Validation
	jQuery('.get-quote')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				customer_name: {
					validators: {
						notEmpty: {
							message: param.customer_name
						}
					}
				},
				customer_email: {
					validators: {
						notEmpty: {
														message: param.req
													},
						emailAddress: {
							message: param.signup_user_email
						}
					}
				},
				phone: {
					validators: {
						notEmpty: {
														message: param.req
													},
						digits: {message: param.only_digits},
					}
				},
				description: {
					validators: {
						notEmpty: {
							message: param.desc_req
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
			//var response = grecaptcha.getResponse( 'recaptcha_requestquote' );
			
			// Get the form instance
            var $form = jQuery(form.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
			
			var response = jQuery(".get-quote textarea[name='g-recaptcha-response']").val();
			if(response == "" || response == 'undefined'){
				jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.get-quote" );	
				$form.find('input[type="submit"]').prop('disabled', false);
				return false;
			}else{
				jQuery(".alert-success,.alert-danger").remove();
			}
			
			var data = {
			  "action": "get_quotation",
			  "provider_id": provider_id
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
							jQuery('input[name="phone"]').val(''); // Reset form
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.get-quote" );	
								jQuery("#customer_name").val('');
								jQuery("#customer_email").val('');
								jQuery("#description").val('');
								jQuery('input[name="captcha_code"]').val('');
								window.setTimeout(function(){
									jQuery('#quotes-Modal').modal('hide');
								}, 2000); // 2 seconds expressed in milliseconds
								
							}else if(data['status'] == 'error'){
								
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.get-quote" );
							}
							
						}

					});
			
        });
	
  });

jQuery(window).load(function () {
							  
	//Request a Quote Captcha
	if (jQuery('#recaptcha_requestquote').length){
	var $this = jQuery("#recaptcha_requestquote");
	
	var sitekey = $this.data('sitekey');
	
	var captchaid = $this.attr('id');

	var theme = $this.data('theme');	
	
	if(sitekey != ""){
	var quoterecaptchapage;
	quoterecaptchapage = grecaptcha.render(captchaid, {

		  'sitekey' : sitekey,

		  'theme' : theme

	  });
	}
	}								  
	
});/*= Window Load END ========================================================*/