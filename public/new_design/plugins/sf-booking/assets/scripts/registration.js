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
	var flag = 1;
	var package_flag = 1;
	var month_flag = 1;
	var year_flag = 1;
	var countryflag = 0;
	var cityflag = 1;
	var mycountrybx = 0;
	var mycitybx;
	var singlecountrybx;
	var customerpagerecaptchaflag = 0;
	var providerpagerecaptchaflag = 0;
	var providerpagerecaptchainit;
	var customerpagerecaptchainit;
	
	//Customer Captcha
	if (jQuery('#recaptcha_customersignuppage').length > 0){
	var $captchaid = jQuery("#recaptcha_customersignuppage");
	if(customerpagerecaptchaflag == 0){
	customerpagerecaptchaflag = 1;

	recaptcha_initialize($captchaid);
	}else{
	var captchaid = $captchaid.attr('id');
	reload_recaptcha(captchaid);
	}
	}
	//Provider Captcha
	if (jQuery('#recaptcha_providersignuppage').length > 0){
	var $captchaid = jQuery("#recaptcha_providersignuppage");
	if(providerpagerecaptchaflag == 0){
	providerpagerecaptchaflag = 1;
	recaptcha_initialize($captchaid);
	}else{
	var captchaid = $captchaid.attr('id');
	reload_recaptcha(captchaid);	
	}
	}  
	
	function recaptcha_callback(captchaid,sitekey,theme){

		if(sitekey != ""){
		
		if(captchaid == 'recaptcha_providersignuppage'){
		
		providerpagerecaptchainit = grecaptcha.render(captchaid, {

			  'sitekey' : sitekey,
	
			  'theme' : theme
	
		  });
		}else if(captchaid == 'recaptcha_customersignuppage'){
		
		customerpagerecaptchainit = grecaptcha.render(captchaid, {

			  'sitekey' : sitekey,
	
			  'theme' : theme
	
		  });
		}
		}
	}
	
	function reload_recaptcha(captchaid){
		if(captchaid == 'recaptcha_providersignuppage'){
		grecaptcha.reset(providerpagerecaptchainit);
		}else if(captchaid == 'recaptcha_customersignuppage'){
		grecaptcha.reset(customerpagerecaptchainit);	
		}
	}
	
	function recaptcha_initialize($this){
		var sitekey = $this.data('sitekey');
	
		var captchaid = $this.attr('id');
	
		var theme = $this.data('theme');	
		
		recaptcha_callback(captchaid,sitekey,theme);
	}
	
	jQuery('.sf-register-page a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		var target = jQuery(e.target).attr("href");																			   
		if(target == '#customertab'){
			if (jQuery('#recaptcha_providersignuppage').length > 0){
			reload_recaptcha('recaptcha_providersignuppage');
			}
		}else if(target == '#providertab'){
			if (jQuery('#recaptcha_customersignuppage').length > 0){
			reload_recaptcha('recaptcha_customersignuppage');
			}
		}

		service_finder_resetform();
	});
	
	function service_finder_resetform(){
		jQuery('.provider_registration_page').bootstrapValidator('resetForm',true); // Reset form
		
		jQuery('.provider_registration_page select[name="signup_category"]').parent('div').removeClass('has-error');
		jQuery('.provider_registration_page select[name="provider-role"]').parent('div').removeClass('has-error');
		jQuery('.provider_registration_page select[name="scd_month"]').parent('div').removeClass('has-error');
		jQuery('.provider_registration_page select[name="scd_year"]').parent('div').removeClass('has-error');
		
		jQuery('.customer_registration_page').bootstrapValidator('resetForm',true); // Reset form
		
		jQuery(".sf-register-page .alert").remove();
	}
	
	if(selectedpackage != ""){
		jQuery('.nav-tabs a[href="#providertab"]').tab('show');	
		servce_finder_load_payment_method();
	}else{
		jQuery('.nav-tabs a[href="#providertab"]').tab('show');
	}
	
	if(quicksignup == false){
	if(totalcountry == 1 && !parseInt(allcountry)){
	singlecountrybx = jQuery('.provider_registration_page select[name="signup_country"] option:selected').val();	
	mycountrybx = jQuery('.provider_registration_page select[name="signup_country"]').find(':selected').data('code');
	
	if(!signupautosuggestion){
		var defaultcountry = jQuery('.provider_registration_page select[name="signup_country"]').find(':selected').val();
		service_finder_get_cities(defaultcountry);
	}
	}
	
	if(formtype == 'signup'){
	jQuery.fn.cityAutocompleteBX = function(options) {
        var autocompleteService = new google.maps.places.AutocompleteService();
        var predictionsDropDown = jQuery('<div class="city-autocomplete"></div>').appendTo('#autocity_bx');
        var input = this;

        input.keyup(function() {
            var searchStr = jQuery(this).val();
            if (searchStr.length > 0) {
                var params = {
                    input: searchStr,
                    types: ['(cities)']
                };

				if(mycountrybx == 0){

					if(!parseInt(allcountry)){
						if(countrycount == 1){
							params.componentRestrictions = {country: allowedcountry};
						}
					}
					
				}else{
				
					params.componentRestrictions = {country: mycountrybx}	
				
				}

                autocompleteService.getPlacePredictions(params, updatePredictionsBX);
            } else {
                predictionsDropDown.hide();
            }
        });

        predictionsDropDown.delegate('div', 'click', function() {
            mycitybx = jQuery(this).text();
			input.val(jQuery(this).text());
            predictionsDropDown.hide();
        });

        jQuery(document).mouseup(function (e) {
            if (!predictionsDropDown.is(e.target) && predictionsDropDown.has(e.target).length === 0) {
                predictionsDropDown.hide();
            }
        });

        jQuery(window).resize(function() {
            updatePredictionsDropDownDisplayBX(predictionsDropDown, input);
        });

        updatePredictionsDropDownDisplayBX(predictionsDropDown, input);

        function updatePredictionsBX(predictions, status) {
            if (google.maps.places.PlacesServiceStatus.OK != status) {
                predictionsDropDown.hide();
                return;
            }

            predictionsDropDown.empty();
            jQuery.each(predictions, function(i, prediction) {
                predictionsDropDown.append('<div>' + jQuery.fn.cityAutocompleteBX.transliterate(prediction.terms[0].value) + '</div');
            });

            predictionsDropDown.show();
        }

        return input;
    };

	jQuery.fn.cityAutocompleteBX.transliterate = function (s) {
        s = String(s);

        return s;
    };
	function updatePredictionsDropDownDisplayBX(dropDown, input) {
		if(userrole == "provider"){
		dropDown.css({
            'width': input.outerWidth(),
            'left': input.offset().left,
            'top': input.offset().top + input.outerHeight()
        });
		}
    }
	
	function service_finder_initSignupBXAutoComplete(){
		var city = "";
		var state = "";

					var address = document.getElementById("signup_address_bx");
					if(!parseInt(allcountry)){
						if(countrycount == 1){
							var options = {
							  componentRestrictions: {country: allowedcountry}
							 };
							
							var my_address = new google.maps.places.Autocomplete(address, options);
						}else{
							var my_address = new google.maps.places.Autocomplete(address);
						}
					}else{
							var my_address = new google.maps.places.Autocomplete(address);
					}
			
					google.maps.event.addListener(my_address, "place_changed", function() {
				var place = my_address.getPlace();
				
				// if no location is found
				if (!place.geometry) {
					return;
				}
				
				var $city =jQuery("#signup_city_bx");
				var $state = jQuery("#signup_state_bx");
				var $zipcode = jQuery("#signup_zipcode_bx");
				var $country = jQuery("#signup_country_bx");
				
				var country_long_name = "";
				var country_short_name = "";
				
				for(var i=0; i<place.address_components.length; i++){
					var address_component = place.address_components[i];
					var ty = address_component.types;
	
					for (var k = 0; k < ty.length; k++) {
						if (ty[k] === "locality" || ty[k] === "sublocality" || ty[k] === "sublocality_level_1"  || ty[k] === "postal_town") {
							city = address_component.long_name;
					   } else if (ty[k] === "administrative_area_level_1" || ty[k] === "administrative_area_level_2") {
							$state.val(address_component.long_name);
							state = address_component.long_name;
						} else if (ty[k] === "postal_code") {
							$zipcode.val(address_component.short_name);
						} else if(ty[k] === "country"){
							var countrycode = address_component.short_name;
	
							if(!parseInt(allcountry)){
								if(countrycount > 1){
									if(jQuery.inArray(countrycode,allowedcountries) > -1){
									countryflag = 0;
									}else{
									countryflag = 1;
									}
									///jQuery(".provider_registration_page").bootstrapValidator("revalidateField", "signup_address");
								}
							}
							country_long_name = address_component.long_name;
							country_short_name = address_component.short_name;
							if(countryflag == 0){
							mycountrybx = address_component.short_name;
							//$country.val(address_component.long_name);
							jQuery("#signup_country option:contains(" + address_component.long_name + ")").attr('selected', 'selected'); 
							$city.val(city);
							mycitybx = city;
							///jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_city');
							jQuery("select").selectpicker("refresh");
							///jQuery(".provider_registration_page").bootstrapValidator("revalidateField", "signup_country");
							$city.removeAttr('readonly');
							$city.attr('placeholder',param.signup_city);
							}
						}
					}
				}
				
				var address = jQuery("#signup_address_bx").val();
				var new_address = address.replace(city,"");
				new_address = new_address.replace(state,"");
				
				new_address = new_address.replace(country_long_name,"");
				new_address = new_address.replace(country_short_name,"");
				new_address = jQuery.trim(new_address);
				
				new_address = new_address.replace(/,/g, "");
				new_address = new_address.replace(/ +/g," ");
				jQuery("#signup_address_bx").val(new_address);
				///jQuery('.provider_registration_page').bootstrapValidator('revalidateField', 'signup_address');
				
			
			 });
				}
	if(signupautosuggestion){
	jQuery("#signup_city_bx").cityAutocompleteBX();
	service_finder_initSignupBXAutoComplete();
	}
	}
	}
	jQuery('body').on('click', 'a.fp_bx', function(){
		jQuery('.loginform_dx').addClass('hidden');
		jQuery('.forgotpasswordform_dx').removeClass('hidden');
	});
	
	jQuery('body').on('click', 'a.lg_bx', function(){
		jQuery('.loginform_dx').removeClass('hidden');
		jQuery('.forgotpasswordform_dx').addClass('hidden');
	});
	
	function servce_finder_load_payment_method(){
		var free = jQuery('.provider_registration_page select[name="provider-role"] option:selected').attr('class');
		var paymode = jQuery('.provider_registration_page input[name="payment_mode"]:checked').val();
			if(free == 'free' || free == 'blank'){
				jQuery('#paymethod_bx').hide();	
				jQuery('#stripeinfo').hide();
				jQuery('#twocheckoutstripeinfo').hide();
				jQuery('#payulatampageinfo').hide();
				jQuery('#signuppagewiredinfo').hide();
				jQuery('#freemode_bx').val('yes');
				
											jQuery('.provider_registration_page')
											.bootstrapValidator('removeField', 'payment_mode');
											
				
			}else{
				jQuery('#paymethod_bx').show();
				if(paymode == 'stripe'){
					jQuery('#stripeinfo').show();
					jQuery('#signuppagewiredinfo').hide();
					jQuery('#twocheckoutstripeinfo').hide();
					jQuery('#payulatampageinfo').hide();
				}else if(paymode == 'twocheckout'){
					jQuery('#stripeinfo').hide();
					jQuery('#signuppagewiredinfo').hide();
					jQuery('#twocheckoutstripeinfo').show();
					jQuery('#payulatampageinfo').hide();
				}else if(paymode == 'payulatam'){
					jQuery('#stripeinfo').hide();
					jQuery('#signuppagewiredinfo').hide();
					jQuery('#twocheckoutstripeinfo').hide();
					jQuery('#payulatampageinfo').show();
				}else if(paymode == 'wired'){
					jQuery('#stripeinfo').hide();
					jQuery('#signuppagewiredinfo').hide();
					jQuery('#twocheckoutstripeinfo').show();		
					jQuery('#payulatampageinfo').hide();
				}
				jQuery('#freemode_bx').val('no');
											jQuery('.provider_registration_page')
											.bootstrapValidator('addField', 'payment_mode', {
												validators: {
													notEmpty: {
												message: param.req
											},
												}
											});
			}
	}
	
	/*Provider Signup*/
	jQuery('.provider_registration_page')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				signup_user_name: {
					validators: {
						notEmpty: {
							message: param.signup_user_name
						}
					}
				},
				signup_first_name: {
					validators: {
						notEmpty: {
							message: param.signup_first_name
						}
					}
				},
				signup_last_name: {
					validators: {
						notEmpty: {
							message: param.signup_last_name
						}
					}
				},
				captcha_code: {
					validators: {
						notEmpty: {
							message: param.req
						},
						remote: {
                        type: 'POST',
                        url: captchavalidatepage,
                        message: param.captcha_validate
                    }
						 
					}
				},
				signup_address: {
					validators: {
						notEmpty: {
										message: param.signup_address
									},
									callback: {
										message: param.allowed_country,
										callback: function(value, validator, $field) {
											if(countrycount > 1){
												if(countryflag == 1){
												return false;
												}else{
												return true;	
												}
											}else{
												return true;	
											}
										}
									}
					}
				},
				signup_city: {
					validators: {
						notEmpty: {
							message: param.signup_city
						}
					}
				},
				signup_country: {
					validators: {
						notEmpty: {
							message:param.signup_city
						}
					}
				},
				providertermsncondition_bx: {
					validators: {
						notEmpty: {
							message: param.providertermsncondition
						}
					}
				},
				signup_user_email: {
					validators: {
						notEmpty: {
												message: param.req
											},
						emailAddress: {
							message: param.signup_user_email
						}
					}
				},
				fillsignupotp: {
					validators: {
						notEmpty: {
								message: param.req
							},
						callback: {
								message: param.edit_text,
								callback: function(value, validator, $field) {
									if(service_finder_getCookie('signupotppass') == value && service_finder_getCookie('signupotppass') != ""){
									return true;
									}else{
									return false;	
									}
								}
							}
					}
				},
				signup_password: {
					validators: {
						notEmpty: {
							message: param.signup_password_empty
						},
						stringLength: {
							min: 5,
							max: 15,
							message: param.signup_password_length
						},
						identical: {
							field: 'signup_confirm_password',
							message: param.signup_password_confirm
						},
					}
				},
				signup_confirm_password: {
					validators: {
						notEmpty: {
							message: param.signup_password_empty
						},
						stringLength: {
							min: 5,
							max: 15,
							message: param.signup_password_length
						},
						identical: {
							field: 'signup_password',
							message: param.signup_password_confirm
						},
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
		.on('click', '.signupotp_bx', function() {
				
				var emailid = jQuery('#signup_user_email_bx').val();
				var data = {
						  "action": "sendotp",
						  "emailid": emailid,
						};
				
				var formdata = jQuery.param(data);
				
				jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						beforeSend: function() {
							jQuery('.loading-area').show();
						},
						
						data: formdata,

						success:function (data, textStatus) {
							service_finder_clearconsole();
							jQuery('.loading-area').hide();
							jQuery( '<div class="alert alert-success padding-5 signupotpsuccess">'+param.otp_mail+'</div>' ).insertAfter( ".signupotp-section-bx .input-group" );
							service_finder_setCookie('signupotppass', data); 
							
							service_finder_setCookie('signupvaildemail',emailid);
							jQuery(".signupotp_bx").remove();
							
											jQuery('.provider_registration_page')
											.bootstrapValidator('addField', 'fillsignupotp', {
												validators: {
															notEmpty: {
																message: param.otp_pass
															},
															callback: {
																message: param.right,
																callback: function(value, validator, $field) {
																	if(service_finder_getCookie('signupotppass') == value){
																	jQuery(".signupotpsuccess").remove();	
																	return true;
																	}else{
																	jQuery(".signupotpsuccess").remove();	
																	return false;	
																	}
																}
															}
														}
											})
											.bootstrapValidator('addField', 'signup_user_email', {
												validators: {
															emailAddress: {
																message: param.signup_user_email
															},
															callback: {
																message: param.reconfirm_email,
																callback: function(value, validator, $field) {
																	if(service_finder_getCookie('signupvaildemail') == value){
																	return true;
																	}else{
																	jQuery(".signupotp_bx").remove();
																	jQuery(".signupotpsuccess").remove();	
																	jQuery( '<a href="javascript:;" class="signupotp_bx">'+param.gen_otp+'</a>' ).insertAfter( ".signupotp-section-bx .input-group" );
																	
																	return false;	
																	}
																}
															}
														}
											});
						}

					});					  
		})
		.on('click',  'input[name="user-register"]', function(e) {
															  
			if(quicksignup == false){
			if(totalcountry == 1 && !parseInt(allcountry)){
			jQuery('.provider_registration_page select[name="signup_country"]').val(singlecountrybx);	
			}															  
            
			if(!signupautosuggestion){
			if(jQuery('.provider_registration_page select[name="signup_city"] option:selected').val()==""){cityflag = 1;jQuery('.provider_registration_page select[name="signup_city"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}else{cityflag = 0;jQuery('.provider_registration_page select[name="signup_city"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}	
			}
			
			if(jQuery('.provider_registration_page select[name="signup_country"] option:selected').val()==""){countryflag = 1;jQuery('.provider_registration_page select[name="signup_country"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}else{countryflag = 0;jQuery('.provider_registration_page select[name="signup_country"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}
			
			}
			
			if(jQuery('.provider_registration_page select[name="signup_category"] option:selected').val()==""){flag = 1;jQuery('.provider_registration_page select[name="signup_category"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}else{flag = 0;jQuery('.provider_registration_page select[name="signup_category"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}
			
			if(jQuery('.provider_registration_page select[name="provider-role"] option:selected').val()==""){package_flag = 1;jQuery('.provider_registration_page select[name="provider-role"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}else{package_flag = 0;jQuery('.provider_registration_page select[name="provider-role"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}
			
			if(jQuery('.provider_registration_page select[name="scd_month"] option:selected').val()==""){month_flag = 1;jQuery('.provider_registration_page select[name="scd_month"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}else{month_flag = 0;jQuery('.provider_registration_page select[name="scd_month"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}
			
			if(jQuery('.provider_registration_page select[name="scd_year"] option:selected').val()==""){year_flag = 1;jQuery('.provider_registration_page select[name="scd_year"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}else{year_flag = 0;jQuery('.provider_registration_page select[name="scd_year"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);}
			
	    })
		.on('change', 'select[name="signup_country"]', function() {
			mycountrybx = jQuery(this).find(':selected').data('code');
			jQuery('#signup_city_bx').val('');
			mycitybx = '';
			
			if(!signupautosuggestion){
				var selectedcountry = jQuery(this).val();
				service_finder_get_cities(selectedcountry);
			}else{
			jQuery('#signup_city_bx').removeAttr('readonly');
			}
			
			jQuery('#signup_city_bx').attr('placeholder',param.signup_city);
			jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_city');
		})
		.on('change', 'select[name="provider-role"]', function() {
		
			if(!woopayment){
			servce_finder_load_payment_method();
			}else{
				var free = jQuery('.provider_registration_page select[name="provider-role"] option:selected').attr('class');
				if(free == 'free' || free == 'blank'){
					jQuery('#freemode_bx').val('yes');
				}else{
					jQuery('#freemode').val('no');
				}
				
			}
		
		})
		.on('change', 'input[name="payment_mode"]', function() {
															 
			var paymode = jQuery('.provider_registration_page input[name="payment_mode"]:checked').val();
			if(paymode == 'stripe'){
				jQuery('#stripeinfo').show();
				jQuery('#signuppagewiredinfo').hide();
				jQuery('#payulatampageinfo').hide();
				jQuery('#twocheckoutstripeinfo').hide();
											jQuery('.provider_registration_page')
											.bootstrapValidator('addField', 'scd_number', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'scd_cvc', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'scd_month', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'scd_year', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											});
											
											jQuery('.provider_registration_page')
											.bootstrapValidator('removeField', 'twocheckout_scd_number')
											.bootstrapValidator('removeField', 'twocheckout_scd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_scd_month')
											.bootstrapValidator('removeField', 'twocheckout_scd_year')
											.bootstrapValidator('removeField', 'payulatam_page_cardtype')
											.bootstrapValidator('removeField', 'payulatam_scd_number')
											.bootstrapValidator('removeField', 'payulatam_scd_cvc')
											.bootstrapValidator('removeField', 'payulatam_scd_month')
											.bootstrapValidator('removeField', 'payulatam_scd_year');
			}else if(paymode == 'twocheckout'){
				jQuery('#twocheckoutstripeinfo').show();
				jQuery('#stripeinfo').hide();
				jQuery('#payulatampageinfo').hide();
				jQuery('#signuppagewiredinfo').hide();
											jQuery('.provider_registration_page')
											.bootstrapValidator('addField', 'twocheckout_scd_number', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'twocheckout_scd_cvc', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'twocheckout_scd_month', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'twocheckout_scd_year', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											});
											jQuery('.provider_registration_page')
											.bootstrapValidator('removeField', 'scd_number')
											.bootstrapValidator('removeField', 'scd_cvc')
											.bootstrapValidator('removeField', 'scd_month')
											.bootstrapValidator('removeField', 'scd_year')
											.bootstrapValidator('removeField', 'payulatam_page_cardtype')
											.bootstrapValidator('removeField', 'payulatam_scd_number')
											.bootstrapValidator('removeField', 'payulatam_scd_cvc')
											.bootstrapValidator('removeField', 'payulatam_scd_month')
											.bootstrapValidator('removeField', 'payulatam_scd_year');
			
			}else if(paymode == 'payulatam'){
				jQuery('#twocheckoutstripeinfo').hide();
				jQuery('#stripeinfo').hide();
				jQuery('#payulatampageinfo').show();
				jQuery('#signuppagewiredinfo').hide();
											jQuery('.provider_registration_page')
											.bootstrapValidator('addField', 'payulatam_page_cardtype', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_scd_number', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_scd_cvc', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_scd_month', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_scd_year', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											});
											jQuery('.provider_registration_page')
											.bootstrapValidator('removeField', 'scd_number')
											.bootstrapValidator('removeField', 'scd_cvc')
											.bootstrapValidator('removeField', 'scd_month')
											.bootstrapValidator('removeField', 'scd_year')
											.bootstrapValidator('removeField', 'twocheckout_scd_number')
											.bootstrapValidator('removeField', 'twocheckout_scd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_scd_month')
											.bootstrapValidator('removeField', 'twocheckout_scd_year');
			
			}else if(paymode == 'wired'){
				jQuery('#stripeinfo').hide();
				jQuery('#twocheckoutstripeinfo').hide();
				jQuery('#payulatampageinfo').hide();
				jQuery('#signuppagewiredinfo').show();
											jQuery('.provider_registration_page')
											.bootstrapValidator('removeField', 'scd_number')
											.bootstrapValidator('removeField', 'scd_cvc')
											.bootstrapValidator('removeField', 'scd_month')
											.bootstrapValidator('removeField', 'scd_year')
											.bootstrapValidator('removeField', 'twocheckout_scd_number')
											.bootstrapValidator('removeField', 'twocheckout_scd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_scd_month')
											.bootstrapValidator('removeField', 'twocheckout_scd_year')
											.bootstrapValidator('removeField', 'payulatam_page_cardtype')
											.bootstrapValidator('removeField', 'payulatam_scd_number')
											.bootstrapValidator('removeField', 'payulatam_scd_cvc')
											.bootstrapValidator('removeField', 'payulatam_scd_month')
											.bootstrapValidator('removeField', 'payulatam_scd_year');
			}else{
				jQuery('#stripeinfo').hide();
				jQuery('#twocheckoutstripeinfo').hide();
				jQuery('#payulatampageinfo').hide();
				jQuery('#signuppagewiredinfo').hide();
											jQuery('.provider_registration_page')
											.bootstrapValidator('removeField', 'scd_number')
											.bootstrapValidator('removeField', 'scd_cvc')
											.bootstrapValidator('removeField', 'scd_month')
											.bootstrapValidator('removeField', 'scd_year')
											.bootstrapValidator('removeField', 'twocheckout_scd_number')
											.bootstrapValidator('removeField', 'twocheckout_scd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_scd_month')
											.bootstrapValidator('removeField', 'twocheckout_scd_year')
											.bootstrapValidator('removeField', 'payulatam_page_cardtype')
											.bootstrapValidator('removeField', 'payulatam_scd_number')
											.bootstrapValidator('removeField', 'payulatam_scd_cvc')
											.bootstrapValidator('removeField', 'payulatam_scd_month')
											.bootstrapValidator('removeField', 'payulatam_scd_year');
			}
		})
        .on('success.form.bv', function(form) {
				
				var response = jQuery(".provider_registration_page textarea[name='g-recaptcha-response']").val();
				if(response == "" || response == 'undefined'){
					jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.provider_registration_page" );	
					jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
					return false;
				}else{
					jQuery(".alert-success,.alert-danger").remove();
				}
				
				if(quicksignup == false){
				if(signupautosuggestion){
				jQuery("#signup_city_bx").val(mycitybx);
				jQuery('.provider_registration_page').bootstrapValidator('revalidateField', 'signup_city');
				if(mycitybx == ''){
					return false;	 
				}
				}
				}
				
				jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
				if(flag==1 || package_flag==1){form.preventDefault();return false;}
				if(quicksignup == false){
				if(!signupautosuggestion){
					if(cityflag==1){form.preventDefault();return false;}	
				}
				}
				
				var payment_mode = jQuery('.provider_registration_page input[name=payment_mode]:checked').val();
				var freemode = jQuery('#freemode_bx').val();
				
				var freechk = jQuery('.provider_registration_page select[name="provider-role"] option:selected').attr('class');
				
				if(woopayment && freechk != 'free' && freechk != 'blank' && freemode != 'yes'){
						var data = {
						  "action": "sf_add_to_woo_cart",
						  "wootype": "signup"
						};
							
						var formdata = jQuery('form.provider_registration_page').serialize() + "&" + jQuery.param(data);
						
						jQuery.ajax({
							type        : 'POST',
							url         : ajaxurl,
							data        : formdata,
							dataType    : 'json',
							beforeSend: function() {
								jQuery(".alert-success,.alert-danger").remove();
								jQuery('.loading-area').show();
							},
							xhrFields   : { withCredentials: true },
							crossDomain : 'withCredentials' in new XMLHttpRequest(),
							success     : function (response) {
								jQuery('.loading-area').hide();
								if (response['success']) {
									window.location.href = cart_url;
								} else {
									jQuery(".alert-success,.alert-danger").remove();
									jQuery( "<div class='alert alert-danger'>"+response.error+"</div>" ).insertBefore( "form.provider_registration_page" );
									jQuery("html, body").animate({
											scrollTop: jQuery(".alert-danger").offset().top
										}, 1000);
								}
							}
						});  
						return false;						  
					  	
				}else{
				
				if(payment_mode == 'paypal' || freemode == 'yes' || payment_mode == 'wired'){
					return true;
				}else if(payment_mode == 'stripe'){
				
					// Prevent form submission
					form.preventDefault();
					
					var cd_number = jQuery('input[name="scd_number"]').val();
					var cd_cvc = jQuery('input[name="scd_cvc"]').val();
					var cd_month = jQuery('input[name="scd_month"]').val();
					var cd_year = jQuery('input[name="scd_year"]').val();
					if(month_flag==1 || year_flag==1){return false;}
					
					if(cd_number != "" && cd_cvc != "" && cd_month != "" && cd_year != ""){	
					jQuery('.loading-area').show();
						
					var data = {
					  "action": "get_adminstripekey",
					};
					var formdata = jQuery.param(data);
					jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							dataType: "json",
							data: formdata,
							success:function (data, textStatus) {
							service_finder_clearconsole();	
							if(data['secret_key'] != '' && data['public_key'] != ''){
								Stripe.setPublishableKey(data['public_key']);
									 Stripe.card.createToken({
								  number: jQuery('#scd_number').val(),
								  cvc: jQuery('#scd_cvc').val(),
								  exp_month: jQuery('#scd_month').val(),
								  exp_year: jQuery('#scd_year').val()
								}, service_finder_stripeRegPageHandler);
							}else{
									jQuery('.loading-area').hide();
								    jQuery(".alert-success,.alert-danger").remove();
									jQuery( "<div class='alert alert-danger'>"+param.set_key+".</div>" ).insertBefore( "form.provider_registration_page" );
									return false;
							}	 
							}
					});
						
						 
					}
		
				
				}else if(payment_mode == 'payulatam'){
					// Prevent form submission
					form.preventDefault();
					var crd_type = jQuery('#payulatam_page_cardtype').val();
					var crd_number = jQuery('#payulatam_scd_number').val();
					var crd_cvc = jQuery('#payulatam_scd_cvc').val();
					var crd_month = jQuery('#payulatam_scd_month').val();
					var crd_year = jQuery('#payulatam_scd_year').val();
					if(crd_type != "" && crd_number != "" && crd_cvc != "" && crd_month != "" && crd_year != ""){	
					jQuery('.loading-area').show();
					
					var data = {
						  "action": "payulatam_signup",
						};
						
					var formdata = jQuery('form.provider_registration_page').serialize() + "&" + jQuery.param(data);
					
					jQuery.ajax({
							type: 'POST',
							url: ajaxurl,
							data: formdata,
							beforeSend: function() {
								jQuery(".alert-success,.alert-danger").remove();
							},
							dataType: "json",
							success:function (data, textStatus) {
								jQuery('.loading-area').hide();
								jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
								if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.provider_registration_page" );	
								jQuery("html, body").animate({
										scrollTop: jQuery(".alert").offset().top
									}, 1000);
								if(data['redirecturl'] != ''){
									window.location = data['redirecturl'];
								}
								}else{
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.provider_registration_page" );
								jQuery("html, body").animate({
										scrollTop: jQuery(".alert").offset().top
									}, 1000);
								}
							
							}
					});		
						
						 
					}
		
				
					
				
				}else if(payment_mode == 'twocheckout'){
					// Prevent form submission
					form.preventDefault();
					
					if(twocheckoutpublishkey != ""){
						
						try {
							TCO.loadPubKey(twocheckoutmode);
							jQuery('.loading-area').show();
							tokenRequest();
						} catch(e) {
							jQuery('.loading-area').hide();
							jQuery('.alert').remove();
							jQuery( "<div class='alert alert-danger'>"+e.toSource()+"</div>" ).insertBefore( "form.provider_registration_page" );
							jQuery("html, body").animate({
									scrollTop: jQuery(".alert-danger").offset().top
								}, 1000);
							return false;
	
						}
					
					}else{
						jQuery('.loading-area').hide();
						jQuery( "<div class='alert alert-danger'>You did not set a valid publishable key.</div>" ).insertBefore( "form.provider_registration_page" );
						jQuery("html, body").animate({
								scrollTop: jQuery(".alert-danger").offset().top
							}, 1000);
						return false;
					}	
					
				}
				
				}
		});
		
		function service_finder_get_cities(selectedcountry){

			var data = {
					  "action": "load_cities_by_country",
					  "country": selectedcountry
					};
		
			var formdata = jQuery.param(data);

			jQuery.ajax({
								type: 'POST',
								url: ajaxurl,
								data: formdata,
								dataType: "text",
								success:function (data, textStatus) {
									jQuery('#signup_city_bx').html(data);
									jQuery('#signup_city_bx').removeAttr('readonly');
									jQuery('#signup_city_bx').removeAttr('disabled');
									jQuery('.sf-select-box').selectpicker('refresh');
								}
		
							});
		}
		
		//Stripe handler for singup
		function service_finder_stripeRegPageHandler(status, response) {
  
			  if (response.error) {
				  // Show the errors on the form
				  jQuery('.loading-area').hide();
				  jQuery(".alert-success,.alert-danger").remove();
				  jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
				  jQuery( "<div class='alert alert-danger'>"+response.error.message+"</div>" ).insertBefore( "form.provider_registration_page" );
				
			  } else {
				// response contains id and card, which contains additional card details
				var token = response.id;
				
				var data = {
					  "action": "signup",
					  "stripeToken": token,
					};
					
				var formdata = jQuery('form.provider_registration_page').serialize() + "&" + jQuery.param(data);
				
				jQuery.ajax({
	
							type: 'POST',
	
							url: ajaxurl,
							
							dataType: "json",
							
							beforeSend: function() {
								jQuery(".alert-success,.alert-danger").remove();
							},
							
							data: formdata,
	
							success:function (data, textStatus) {
								jQuery('.loading-area').hide();
								jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
								if(data['status'] == 'success'){
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.provider_registration_page" );	
								jQuery("html, body").animate({
										scrollTop: jQuery(".alert").offset().top
									}, 1000);
								if(data['redirecturl'] != ''){
									window.location = data['redirecturl'];
								}
								}else{
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.provider_registration_page" );
								jQuery("html, body").animate({
										scrollTop: jQuery(".alert").offset().top
									}, 1000);
								}
							
							}
	
						});
				
				}
		}
		
	/*Customer Signup*/
	jQuery('.customer_registration_page')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				signup_user_name: {
					validators: {
						notEmpty: {
							message: param.signup_user_name
						}
					}
				},
				signup_first_name: {
					validators: {
						notEmpty: {
							message: param.signup_first_name
						}
					}
				},
				signup_last_name: {
					validators: {
						notEmpty: {
							message: param.signup_last_name
						}
					}
				},
				signup_user_email: {
					validators: {
						notEmpty: {
														message: param.req
													},
						emailAddress: {
							message: param.signup_user_email
						}
					}
				},
				customertermsncondition_bx: {
					validators: {
						notEmpty: {
							message: param.providertermsncondition
						}
					}
				},
				signup_password: {
					validators: {
						notEmpty: {
							message: param.signup_password_empty
						},
						stringLength: {
							min: 5,
							max: 15,
							message: param.signup_password_length
						},
						identical: {
							field: 'signup_confirm_password',
							message: param.signup_password_confirm
						},
					}
				},
				signup_confirm_password: {
					validators: {
						notEmpty: {
							message: param.signup_password_empty
						},
						stringLength: {
							min: 5,
							max: 15,
							message: param.signup_password_length
						},
						identical: {
							field: 'signup_password',
							message: param.signup_password_confirm
						},
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
				
				var response = jQuery(".customer_registration_page textarea[name='g-recaptcha-response']").val();
				if(response == "" || response == 'undefined'){
					jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.customer_registration_page" );	
					$form.find('input[type="submit"]').prop('disabled', false);
					return false;
				}else{
					jQuery(".alert-success,.alert-danger").remove();
				}
				
				var data = {
				  "action": "signup"
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
								jQuery('.customer_registration_page').bootstrapValidator('resetForm',true); // Reset form
								jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.customer_registration_page" );	
								jQuery("html, body").animate({
									scrollTop: jQuery(".alert").offset().top
								}, 1000);
								if(data['redirecturl'] != ''){
									window.location = data['redirecturl'];
								}
								}else{
								jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.customer_registration_page" );
								jQuery("html, body").animate({
									scrollTop: jQuery(".alert").offset().top
								}, 1000);
								}
							
							}
	
						});
		});	
		
		
		/*User Login*/
	jQuery('.loginform_page')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				login_user_name: {
					validators: {
						notEmpty: {
							message: param.login_user_name
						}
					}
				},
				login_password: {
					validators: {
						notEmpty: {
							message: param.login_password
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
				
				var data = {
				  "action": "login"
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
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.loginform_page" );	
									window.location = data['redirect'];
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.loginform_page" );
								}
							
							}
	
						});
		});
		
		/*Forgot Password Form*/
	jQuery('.forgotpassform_page')
        .bootstrapValidator({
            message: param.not_valid,
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
				fp_user_login: {
					validators: {
						notEmpty: {
							message: param.fp_user_login
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
				
				var data = {
				  "action": "forgotpassword"
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
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.forgotpassform_page" );	
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.forgotpassform_page" );
								}
							
							}
	
						});
		});	
	
  });
  
var tokenRequest = function() {

var twocheckout_card_number = jQuery('input[name="twocheckout_scd_number"]').val();
var twocheckout_card_cvc = jQuery('input[name="twocheckout_scd_cvc"]').val();
var twocheckout_card_month = jQuery('select[name="twocheckout_scd_month"]').val();
var twocheckout_card_year = jQuery('select[name="twocheckout_scd_year"]').val();

// Setup token request arguments
var args = {
  sellerId: twocheckoutaccountid,
  publishableKey: twocheckoutpublishkey,
  ccNo: twocheckout_card_number,
  cvv: twocheckout_card_cvc,
  expMonth: twocheckout_card_month,
  expYear: twocheckout_card_year
};

// Make the token request
TCO.requestToken(successCallback, errorCallback, args);
};

// Called when token created successfully.
var successCallback = function(data) {
	// Set the token as the value for the token input
	var token = data.response.token.token;
		
		/*To Add Service cost also in minimum cost*/
		
		var data = {
				  "action": "twocheckout_signup",
				  "twocheckouttoken": token,
				};
				
		var formdata = jQuery('form.provider_registration_page').serialize() + "&" + jQuery.param(data);
		
		jQuery.ajax({

				type: 'POST',

				url: ajaxurl,
				
				dataType: "json",
				
				beforeSend: function() {
					jQuery(".alert-success,.alert-danger").remove();
				},
				
				data: formdata,

				success:function (data, textStatus) {
					jQuery('.loading-area').hide();
					jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
					if(data['status'] == 'success'){
						jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.provider_registration_page" );	
					}else{
						jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.provider_registration_page" );
					}
					
				}

			});

  };

// Called when token creation fails.
var errorCallback = function(data) {
	if (data.errorCode === 200) {
	  // This error code indicates that the ajax call failed. We recommend that you retry the token request.
	} else {
	  jQuery('.loading-area').hide();
	  jQuery('.alert').remove();
	  jQuery('form.provider_registration_page').find('input[type="submit"]').prop('disabled', false);
	  jQuery( "<div class='alert alert-danger'>"+data.errorMsg+"</div>" ).insertBefore( "form.provider_registration_page" );
	  jQuery("html, body").animate({
							scrollTop: jQuery(".alert-danger").offset().top
						}, 1000);
	}
  };  