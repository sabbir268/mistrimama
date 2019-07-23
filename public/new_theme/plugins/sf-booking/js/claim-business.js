// JavaScript Document

jQuery(document).ready(function() {

'use strict';								

var provider_id = '';

var claimbusinessrecaptchaflag = 0;

var claimrecaptcha;

	

	jQuery('#claimbusiness-Modal').on('hide.bs.modal', function() {

		jQuery('.alert').remove(); // Reset form

		jQuery('.claim-business').bootstrapValidator('resetForm',true); // Reset form

	});

	

	function recaptcha_callback(captchaid,sitekey,theme){



		if(sitekey != ""){

		

		claimrecaptcha = grecaptcha.render(captchaid, {



			  'sitekey' : sitekey,

	

			  'theme' : theme

	

		  });

		}

	}

	

	function reload_recaptcha(captchaid){

		grecaptcha.reset(claimrecaptcha);

	}

	

	function recaptcha_initialize($this){

		var sitekey = $this.data('sitekey');

	

		var captchaid = $this.attr('id');

	

		var theme = $this.data('theme');	

		

		recaptcha_callback(captchaid,sitekey,theme);

	}

	

	jQuery('#claimbusiness-Modal').on('show.bs.modal', function (event) {

		//Request a Quote Captcha

		if (jQuery('#recaptcha_claimbusiness').length){

		var $captchaid = jQuery("#recaptcha_claimbusiness");

		

		if(claimbusinessrecaptchaflag == 0){

		claimbusinessrecaptchaflag = 1;

		recaptcha_initialize($captchaid);

		}else{

		reload_recaptcha($captchaid);	

		}

		}																 

		jQuery('.modal-dialog').removeClass('modal-sm');

	});

	

	provider_id = jQuery('.claimbusiness').data('proid');

	

	// Get Quotetion Form Validation

	jQuery('.claim-business')

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

			captcha_code: {

				validators: {

					notEmpty: {

								message: param.req

							},

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

		

		// Get the form instance

		var $form = jQuery(form.target);

		// Get the BootstrapValidator instance

		var bv = $form.data('bootstrapValidator');

		

		var response = jQuery(".claim-business textarea[name='g-recaptcha-response']").val();

		if(response == "" || response == 'undefined'){

			jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.claim-business" );	

			$form.find('input[type="submit"]').prop('disabled', false);

			return false;

		}else{

			jQuery(".alert-success,.alert-danger").remove();

		}

		

		var data = {

		  "action": "claim_business",

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

							jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.claim-business" );	

							jQuery('input[name="customer_name"]').val('');

							jQuery('input[name="customer_email"]').val('');

							jQuery('input[name="description"]').val('');

							jQuery('input[name="captcha_code"]').val('');

							window.setTimeout(function(){

								jQuery('#claimbusiness-Modal').modal('hide');

							}, 2000); // 2 seconds expressed in milliseconds

							

						}else if(data['status'] == 'error'){

							jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.claim-business" );

						}

						

					}



				});

		

	});

	

});// Document.ready END====================================================//

