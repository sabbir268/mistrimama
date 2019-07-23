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
	
	jQuery('#quotes-Modal-shortcode').on('hide.bs.modal', function() {
		jQuery('.get-quote-shortcode').bootstrapValidator('resetForm',true); // Reset form
	});
	
	jQuery('#quotes-Modal-shortcode').on('show.bs.modal', function (event) {
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
	
	jQuery('.counter').counterUp({
	  delay: 10,
	  time: 1000
	 });
	
	// Get Quotetion Form Validation
	jQuery('.get-quote-shortcode')
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

            // Get the form instance
            var $form = jQuery(form.target);
            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');
			
			var response = jQuery(".get-quote-shortcode textarea[name='g-recaptcha-response']").val();
			if(response == "" || response == 'undefined'){
				jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.get-quote-shortcode" );	
				$form.find('input[type="submit"]').prop('disabled', false);
				return false;
			}else{
				jQuery(".alert").remove();
			}
			
			var data = {
			  "action": "get_quotation_shortcode",
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
							$form.find('input[type="submit"]').prop('disabled', false);
							jQuery('input[name="phone"]').val(''); // Reset form
							if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.get-quote-shortcode" );	
								jQuery("#customer_name").val('');
								jQuery("#customer_email").val('');
								jQuery("#description").val('');
								jQuery('input[name="captcha_code"]').val('');
								window.setTimeout(function(){
									jQuery('#quotes-Modal-shortcode').modal('hide');
								}, 2000); // 2 seconds expressed in milliseconds
										
							}else if(data['status'] == 'error'){
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.get-quote-shortcode" );
							}
							
						}

					});
			
        });
	
	var topPostion;
	var currentDiv;
	//Load More Categories
	jQuery(document).on('click','.show_more',function(){
        var offset = jQuery(this).attr('data-offset');
		var subcat = jQuery(this).attr('data-subcat');
		var catarr = jQuery(this).attr('data-catarr');
        jQuery('.show_more').hide();
        jQuery('.loding').show();
        var data = {
			  "action": "load_more",
			  "offset": offset,
			  "subcat": subcat,
			  "catarr": catarr
			};
			
		jQuery.ajax({
            type:'POST',
            url:ajaxurl,
            data:data,
            success:function(html){
                jQuery('#show_more_main'+offset).remove();
                jQuery('.catlist').append(html);
				equalheight('.equal-col-outer .equal-col');
				// masonry by  = masonry.pkgd.min ================= // 
			   jQuery("#masonry").masonry( 'reloadItems' );
			   jQuery("#masonry").masonry( 'layout' );


				
            }
        }); 
    });
	
	equalheight = function(container) {
		var currentTallest = 0,
			currentRowStart = 0,
			rowDivs = new Array(),
			$el,
			topPosition = 0;
		jQuery(container).each(function() {
	
			$el = jQuery(this);
			jQuery($el).height('auto')
			topPostion = $el.position().top;
	
			if (currentRowStart != topPostion) {
				for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
					rowDivs[currentDiv].height(currentTallest);
				}
				rowDivs.length = 0; // empty the array
				currentRowStart = topPostion;
				currentTallest = $el.height();
				rowDivs.push($el);
			} else {
				rowDivs.push($el);
				currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
			}
			for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
				rowDivs[currentDiv].height(currentTallest);
			}
		});
	}
	
	//Load More Categories
	jQuery(document).on('click','.show_more_v2',function(){
														 
        var offset = jQuery(this).attr('data-offset');
		var subcat = jQuery(this).attr('data-subcat');
		var catarr = jQuery(this).attr('data-catarr');
		var showdes = jQuery(this).data('showdes');
        jQuery('.show_more_v2').hide();
        jQuery('.lodingv2').show();
        var data = {
			  "action": "load_more_v2",
			  "offset": offset,
			  "showdes": showdes,
			  "catarr": catarr,
			  "subcat": subcat
			};
			
		jQuery.ajax({
            type:'POST',
            url:ajaxurl,
            data:data,
            success:function(html){
                jQuery('#show_more_main_v2'+offset).remove();
                jQuery('.catlistv2').append(html);
				equalheight('.equal-col-outer .equal-col');
            }
        }); 
    });
	
	//Load More Providers
	jQuery(document).on('click','.show_more_providers',function(){
        var offset = jQuery(this).data('offset');
		var limit = jQuery(this).data('limit');
		var catid = jQuery(this).data('catid');
		var location = jQuery(this).data('location');
		var featured = jQuery(this).data('featured');
		var orderby = jQuery(this).data('orderby');
		var viewtype = jQuery(this).data('viewtype');
        jQuery('.show_more_providers').hide();
        jQuery('.lodingproviders').show();
        var data = {
			  "action": "load_more_providers",
			  "offset": offset,
			  "limit": limit,
			  "catid": catid,
			  "location": location,
			  "featured": featured,
			  "orderby": orderby,
			  "viewtype": viewtype,
			};
			
		jQuery.ajax({
            type:'POST',
            url:ajaxurl,
            data:data,
            success:function(html){
                jQuery('#show_more_main_providers'+offset).remove();
                jQuery('.providerlist').append(html);
				jQuery('.display-ratings').rating();
				jQuery('.sf-show-rating').show();
            }
        }); 
    });
	
});