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
   	var flag = 1;
	var package_flag = 1;
    var month_flag = 1;
	var year_flag = 1;
	var countryflag = 0;
	var cityflag = 1;
	var captchaflag = 0;
	var action = '';
	var mycountry = 0;
	var mycity;
	var singlecountry;
	var selectedpackage = '';
	var customerrecaptchaflag = 0;
	var providerrecaptchaflag = 0;
	var providerrecaptchainit;
	var customerrecaptchainit;
	
	if(quicksignup == false){
	if(totalcountry == 1 && !parseInt(allcountry)){
	singlecountry = jQuery('.provider_registration select[name="signup_country"] option:selected').val();	
	mycountry = jQuery('.provider_registration select[name="signup_country"]').find(':selected').data('code');
	
	if(!signupautosuggestion){
		var defaultcountry = jQuery('.provider_registration select[name="signup_country"]').find(':selected').val();
		service_finder_get_cities(defaultcountry);
	}
	}

	jQuery.fn.cityAutocomplete = function(options) {
        var autocompleteService = new google.maps.places.AutocompleteService();
        var predictionsDropDown = jQuery('<div class="city-autocomplete"></div>').appendTo('#autocity');
        var input = this;

        input.keyup(function() {
            var searchStr = jQuery(this).val();
            if (searchStr.length > 0) {
                var params = {
                    input: searchStr,
                    types: ['(cities)']
                };

				if(mycountry != 0){

					params.componentRestrictions = {country: mycountry}	
					
				}

                autocompleteService.getPlacePredictions(params, updatePredictions);
            } else {
                predictionsDropDown.hide();
            }
        });

        predictionsDropDown.delegate('div', 'click', function() {
			mycity = jQuery(this).text();
            input.val(jQuery(this).text());
            predictionsDropDown.hide();
        });

        jQuery(document).mouseup(function (e) {
            if (!predictionsDropDown.is(e.target) && predictionsDropDown.has(e.target).length === 0) {
                predictionsDropDown.hide();
            }
        });

        jQuery(window).resize(function() {
            updatePredictionsDropDownDisplay(predictionsDropDown, input);
        });

        updatePredictionsDropDownDisplay(predictionsDropDown, input);

        function updatePredictions(predictions, status) {
            if (google.maps.places.PlacesServiceStatus.OK != status) {
                predictionsDropDown.hide();
                return;
            }

            predictionsDropDown.empty();
            jQuery.each(predictions, function(i, prediction) {
                predictionsDropDown.append('<div>' + jQuery.fn.cityAutocomplete.transliterate(prediction.terms[0].value) + '</div');
            });

            predictionsDropDown.show();
        }
        return input;
    };
	
	jQuery.fn.cityAutocomplete.transliterate = function (s2) {
        s2 = String(s2);

        return s2;
    };

	function updatePredictionsDropDownDisplay(dropDown, input) {
        dropDown.css({
            'width': input.outerWidth(),
            // 'left': input.offset().left,
            // 'top': input.offset().top + input.outerHeight()
        });
    }
	
	function service_finder_initSignupAutoComplete(){
	
	var city = '';
	var state = '';
	
				var address = document.getElementById('signup_address');
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
		
				google.maps.event.addListener(my_address, 'place_changed', function() {
            var place = my_address.getPlace();
            
            // if no location is found
            if (!place.geometry) {
                return;
            }
            
			var $city = jQuery("#signup_city");
            var $state = jQuery("#signup_state");
            var $zipcode = jQuery("#signup_zipcode");
			var $country = jQuery("#signup_country");
			
            var country_long_name = '';
            var country_short_name = '';
            
            for(var i=0; i<place.address_components.length; i++){
                var address_component = place.address_components[i];
                var ty = address_component.types;

                for (var k = 0; k < ty.length; k++) {
                    if (ty[k] === 'locality' || ty[k] === "sublocality" || ty[k] === "sublocality_level_1"  || ty[k] === 'postal_town') {
                        city = address_component.long_name;
                    } else if (ty[k] === "administrative_area_level_1" || ty[k] === "administrative_area_level_2") {
                        $state.val(address_component.long_name);
						state = address_component.long_name;
                    } else if (ty[k] === 'postal_code') {
                        $zipcode.val(address_component.short_name);
                    } else if(ty[k] === 'country'){
						var countrycode = address_component.short_name;

						if(!parseInt(allcountry)){
							if(countrycount > 1){
								if(jQuery.inArray(countrycode,allowedcountries) > -1){
								countryflag = 0;
								}else{
								countryflag = 1;
								}
								///jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_address');
							}
						}
                        country_long_name = address_component.long_name;
                        country_short_name = address_component.short_name;
						if(countryflag == 0){
						mycountry = address_component.short_name;
						//$country.val(address_component.long_name);
						jQuery("#signup_country option:contains(" + address_component.long_name + ")").attr('selected', 'selected'); 
						$city.val(city);
						mycity = city;
						///jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_city');
						///jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_country');
						jQuery('.sf-select-box').selectpicker('refresh');
						$city.removeAttr('readonly');
						$city.attr('placeholder',param.signup_city);
						}
                    }
                }
            }
			
            var address = jQuery("#signup_address").val();
			var new_address = address.replace(city,"");
            new_address = new_address.replace(state,"");
			
			new_address = new_address.replace(country_long_name,"");
            new_address = new_address.replace(country_short_name,"");
            new_address = jQuery.trim(new_address);
            
            
            new_address = new_address.replace(/,/g, '');
            new_address = new_address.replace(/ +/g," ");
			jQuery("#signup_address").val(new_address);
			///jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_address');
			
        
         });
			}
	}

	function recaptcha_callback(captchaid,sitekey,theme){

		if(sitekey != ""){
		
		

		if(captchaid == 'recaptcha_providersignup'){
		
		providerrecaptchainit = grecaptcha.render(captchaid, {

			  'sitekey' : sitekey,
	
			  'theme' : theme
	
		  });
		}else if(captchaid == 'recaptcha_customersignup'){
		
		customerrecaptchainit = grecaptcha.render(captchaid, {

			  'sitekey' : sitekey,
	
			  'theme' : theme
	
		  });
		}
		}
	}
	
	function reload_recaptcha(captchaid){
		if(captchaid == 'recaptcha_providersignup'){
		grecaptcha.reset(providerrecaptchainit);
		}else if(captchaid == 'recaptcha_customersignup'){
		grecaptcha.reset(customerrecaptchainit);	
		}
	}
	
	function recaptcha_initialize($this){
		var sitekey = $this.data('sitekey');
	
		var captchaid = $this.attr('id');
	
		var theme = $this.data('theme');	
		
		recaptcha_callback(captchaid,sitekey,theme);
	}
	
	jQuery('.register-modal a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		var target = jQuery(e.target).attr("href");																			   
		if(target == '#tab1'){
			if (jQuery('#recaptcha_customersignup').length > 0){
			reload_recaptcha('recaptcha_customersignup');
			}
		}else if(target == '#tab2'){
			if (jQuery('#recaptcha_providersignup').length > 0){
			reload_recaptcha('recaptcha_providersignup');
			}
		}

		service_finder_resetform();
		jQuery('.register-modal .nav-tabs li').removeClass('bv-tab-error');
	});
	
	jQuery('#login-Modal').on('hide.bs.modal', function() {
		service_finder_resetform();
	});
	
	function service_finder_resetform(){
		jQuery('.provider_registration').bootstrapValidator('resetForm',true); // Reset form
		
		jQuery('.provider_registration select[name="signup_category"]').parent('div').removeClass('has-error');
		jQuery('.provider_registration select[name="provider-role"]').parent('div').removeClass('has-error');
		jQuery('.provider_registration select[name="cd_month"]').parent('div').removeClass('has-error');
		jQuery('.provider_registration select[name="cd_year"]').parent('div').removeClass('has-error');
		
		jQuery('.customer_registration').bootstrapValidator('resetForm',true); // Reset form
		jQuery('.loginform').bootstrapValidator('resetForm',true); // Reset form
		jQuery('.forgotpassform').bootstrapValidator('resetForm',true); // Reset form	
		
		jQuery(".register-modal .alert").remove();
		jQuery('.login-bx-dynamic .alert').remove();
	}
	
	function load_captcha_form(){
		var data = {
		  "action": "load_captcha_form"
		};
		
		var formdata = jQuery.param(data);
		
		jQuery.ajax({

			type: 'POST',

			url: ajaxurl,
			
			dataType: "json",
			
			beforeSend: function() {
				jQuery('.loading-area').show();
			},
			
			data: formdata,

			success:function (data, textStatus) {
				if(data['status'] == 'success'){
					jQuery('#providersignup_captcha').html(data['providersignup']);
					jQuery('#customersignup_captcha').html(data['customersignup']);
					
					//Customer Captcha
					if (jQuery('#recaptcha_customersignup').length > 0){
					var $captchaid = jQuery("#recaptcha_customersignup");
					
					recaptcha_initialize($captchaid);
					}
					
					//Provider Captcha
					if (jQuery('#recaptcha_providersignup').length > 0){
					var $captchaid = jQuery("#recaptcha_providersignup");
					
					recaptcha_initialize($captchaid);
					}  
					
					jQuery('.loading-area').hide();
					jQuery('.provider_registration')
					.bootstrapValidator('addField', 'captcha_code', {
						validators: {
								notEmpty: {
									message: param.req
								},
								remote: {
								type: 'POST',
								url: captchavalidate+"?role=provider",
								message: param.captcha_validate
							}
								 
							}
					});
					jQuery('.customer_registration')
					.bootstrapValidator('addField', 'captcha_code', {
						validators: {
								notEmpty: {
									message: param.req
								},
								remote: {
								type: 'POST',
								url: captchavalidate+"?role=customer",
								message: param.captcha_validate
							}
								 
							}
					});
				}else{
				jQuery('.loading-area').hide();	
				}
			
			}

		});	
	}
	
	//Login modal popup box
	jQuery('#login-Modal').on('show.bs.modal', function (event) {
	  var button = jQuery(event.relatedTarget);
	  action = button.data('action');
	  if (jQuery('#providersignup_captcha').length > 0 || jQuery('#customersignup_captcha').length > 0){
			load_captcha_form();	  
	  }
	  
	  var package = button.data('package');
	  if(package > 0){
	  selectedpackage = 'package_'+(parseInt(package) - 1);
	  }
	  
	  var redirectoption = button.data('redirect');
	  jQuery('#redirectnonce').val(redirectoption);
	  if(signupautosuggestion){
	  if(quicksignup == false){
	  service_finder_initSignupAutoComplete();
	  jQuery('#signup_city').cityAutocomplete();
	  }
	  }
	  jQuery('.forgotpass-modal').addClass('hidden');
	  jQuery('.pac-container').css('z-index','9999');
	  jQuery('.city-autocomplete').css('z-index','9999');
	  if(action == 'signup'){
		  
		jQuery('.login-bx-dynamic').addClass('hidden');
		jQuery('.modal-dialog').removeClass('modal-sm');
		jQuery('.register-modal').removeClass('hidden');  
		if(selectedpackage != ''){
			jQuery('.nav-tabs a[href="#tab2"]').tab('show');
			jQuery('select[name="provider-role"]').val(selectedpackage);
			servce_finder_load_payment_method();
			jQuery('.sf-select-box').selectpicker('refresh');
		}else{
			jQuery('.nav-tabs a[href="#tab2"]').tab('show');
			jQuery('select[name="provider-role"]').val('');
			jQuery('.sf-select-box').selectpicker('refresh');																
		}
		
	  }else{
		jQuery('.login-bx-dynamic').removeClass('hidden');
		jQuery('.modal-dialog').addClass('modal-sm');
		jQuery('.register-modal').addClass('hidden');    
	  }
	  
	  
	});
	
	jQuery( "#signup_address" ).focus(function() {
	  jQuery('.pac-container').css('z-index','9999');
	  jQuery('.city-autocomplete').css('z-index','9999');
	});
				  
	/*User Login*/
	jQuery('.loginform')
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
								var redirrectnonce = jQuery('form.loginform #redirectnonce').val();
								jQuery('.loading-area').hide();
								$form.find('input[type="submit"]').prop('disabled', false);	
								if(data['status'] == 'success'){
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.loginform" );	
									if(redirrectnonce == 'no'){
										window.location.reload();
									}else{
										window.location = data['redirect'];
									}
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.loginform" );
								}
							
							}
	
						});
		});
		
	/*Forgot Password Form*/
	jQuery('.forgotpassform')
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
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.forgotpassform" );	
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.forgotpassform" );
								}
							
							}
	
						});
		});	
		
	jQuery('body').on('click', 'a.regform', function(){
		service_finder_resetform();													 
		jQuery('.login-bx-dynamic').addClass('hidden');
		jQuery('.modal-dialog').removeClass('modal-sm');
		jQuery('.register-modal').removeClass('hidden');
		jQuery('.forgotpass-modal').addClass('hidden');
	});
	
	jQuery('body').on('click', 'a.loginform', function(){
		service_finder_resetform();													   
		jQuery('.login-bx-dynamic').removeClass('hidden');
		jQuery('.modal-dialog').addClass('modal-sm');
		jQuery('.register-modal').addClass('hidden');
		jQuery('.forgotpass-modal').addClass('hidden');
	});
	
	jQuery('body').on('click', 'a.forgotpassform', function(){
		service_finder_resetform();															
		jQuery('.login-bx-dynamic').addClass('hidden');
		jQuery('.modal-dialog').addClass('modal-sm');
		jQuery('.register-modal').addClass('hidden');
		jQuery('.forgotpass-modal').removeClass('hidden');
	});
	
	function servce_finder_load_payment_method(){
		var free = jQuery('.provider_registration select[name="provider-role"] option:selected').attr('class');
		var paymode = jQuery('.provider_registration input[name="payment_mode"]:checked').val();
			if(free == 'free' || free == 'blank'){
				jQuery('#paymethod').hide();
				jQuery('#cardinfo').hide();
				jQuery('#twocheckoutcardinfo').hide();
				jQuery('#payulatamcardinfo').hide();
				jQuery('#signupwiredinfo').hide();
				jQuery('#freemode').val('yes');
				
											jQuery('.provider_registration')
											.bootstrapValidator('removeField', 'payment_mode');
											
				
			}else{
				jQuery('#paymethod').show();
				if(paymode == 'stripe'){
					jQuery('#cardinfo').show();
					jQuery('#twocheckoutcardinfo').hide();
					jQuery('#payulatamcardinfo').hide();
					jQuery('#signupwiredinfo').hide();
				}else if(paymode == 'twocheckout'){
					jQuery('#cardinfo').hide();
					jQuery('#twocheckoutcardinfo').show();
					jQuery('#payulatamcardinfo').hide();
					jQuery('#signupwiredinfo').hide();
				}else if(paymode == 'payulatam'){
					jQuery('#cardinfo').hide();
					jQuery('#twocheckoutcardinfo').hide();
					jQuery('#payulatamcardinfo').show();
					jQuery('#signupwiredinfo').hide();
				}else if(paymode == 'wired'){
					jQuery('#cardinfo').hide();
					jQuery('#signupwiredinfo').show();	
					jQuery('#payulatamcardinfo').hide();
					jQuery('#twocheckoutcardinfo').hide();
				}
				jQuery('#freemode').val('no');
											jQuery('.provider_registration')
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
	jQuery('.provider_registration')
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
							message: param.signup_country
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
				providertermsncondition: {
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
		.on('click',  'input[name="user-register"]', function(e) {
			
			if(quicksignup == false){
			if(totalcountry == 1 && !parseInt(allcountry)){
			jQuery('.provider_registration select[name="signup_country"]').val(singlecountry);	
			}

			if(!signupautosuggestion){
			if(jQuery('.provider_registration select[name="signup_city"] option:selected').val()==""){cityflag = 1;jQuery('.provider_registration select[name="signup_city"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}else{cityflag = 0;jQuery('.provider_registration select[name="signup_city"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}	
			}
			
			if(jQuery('.provider_registration select[name="signup_country"] option:selected').val()==""){countryflag = 1;jQuery('.provider_registration select[name="signup_country"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}else{countryflag = 0;jQuery('.provider_registration select[name="signup_country"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}
			}
			
			if(jQuery('.provider_registration select[name="signup_category"] option:selected').val()==""){flag = 1;jQuery('.provider_registration select[name="signup_category"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}else{flag = 0;jQuery('.provider_registration select[name="signup_category"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}
			
			if(jQuery('.provider_registration select[name="provider-role"] option:selected').val()==""){package_flag = 1;jQuery('.provider_registration select[name="provider-role"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}else{package_flag = 0;jQuery('.provider_registration select[name="provider-role"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}
			
			if(jQuery('.provider_registration select[name="cd_month"] option:selected').val()==""){month_flag = 1;jQuery('.provider_registration select[name="cd_month"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}else{month_flag = 0;jQuery('.provider_registration select[name="cd_month"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}
			
			if(jQuery('.provider_registration select[name="cd_year"] option:selected').val()==""){year_flag = 1;jQuery('.provider_registration select[name="cd_year"]').parent('div').addClass('has-error').removeClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}else{year_flag = 0;jQuery('.provider_registration select[name="cd_year"]').parent('div').removeClass('has-error').addClass('has-success'); jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);}
			
	    })
		.on('error.field.bv', function(e, data) {
            data.bv.disableSubmitButtons(false); // disable submit buttons on errors
	    })
		.on('status.field.bv', function(e, data) {
            data.bv.disableSubmitButtons(false); // disable submit buttons on valid
        })
		.on('click', '.signupotp', function() {
				
				var emailid = jQuery('#signup_user_email').val();
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
							jQuery( '<div class="alert alert-success padding-5 signupotpsuccess">'+param.otp_mail+'</div>' ).insertAfter( ".signupotp-section .input-group" );
							service_finder_setCookie('signupotppass', data); 
							
							service_finder_setCookie('signupvaildemail',emailid);
							jQuery(".signupotp").remove();
							
											jQuery('.provider_registration')
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
																	jQuery(".signupotp").remove();
																	jQuery(".signupotpsuccess").remove();	
																	jQuery( '<a href="javascript:;" class="signupotp">'+param.gen_otp+'</a>' ).insertAfter( ".signupotp-section .input-group" );
																	
																	return false;	
																	}
																}
															}
														}
											});
						}

					});					  
		})
		.on('change', 'select[name="signup_country"]', function() {
			mycountry = jQuery(this).find(':selected').data('code');
			jQuery('#signup_city').val('');
			mycity = '';
			if(!signupautosuggestion){
				var selectedcountry = jQuery(this).val();
				service_finder_get_cities(selectedcountry);
				
			}else{
			jQuery('#signup_city').removeAttr('readonly');
			}
			jQuery('#signup_city').attr('placeholder',param.signup_city);
			jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_city');
		})
		.on('change', 'select[name="provider-role"]', function() {
		
			
		
			if(!woopayment){
				servce_finder_load_payment_method();
			}else{
				var free = jQuery('.provider_registration select[name="provider-role"] option:selected').attr('class');
				if(free == 'free' || free == 'blank'){
					jQuery('#freemode').val('yes');
				}else{
					jQuery('#freemode').val('no');
				}
				
			}
		
		})
		.on('change', 'input[name="payment_mode"]', function() {
			var paymode = jQuery('.provider_registration input[name="payment_mode"]:checked').val();
			if(paymode == 'stripe'){
				jQuery('#cardinfo').show();
				jQuery('#twocheckoutcardinfo').hide();
				jQuery('#payulatamcardinfo').hide();
				jQuery('#signupwiredinfo').hide();
											jQuery('.provider_registration')
											.bootstrapValidator('addField', 'cd_number', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'cd_cvc', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'cd_month', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'cd_year', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											});
											jQuery('.provider_registration')
											.bootstrapValidator('removeField', 'twocheckout_cd_number')
											.bootstrapValidator('removeField', 'twocheckout_cd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_cd_month')
											.bootstrapValidator('removeField', 'twocheckout_cd_year')
											.bootstrapValidator('removeField', 'payulatam_signup_cardtype')
											.bootstrapValidator('removeField', 'payulatam_cd_number')
											.bootstrapValidator('removeField', 'payulatam_cd_cvc')
											.bootstrapValidator('removeField', 'payulatam_cd_month')
											.bootstrapValidator('removeField', 'payulatam_cd_year');
			}else if(paymode == 'twocheckout'){
				jQuery('#cardinfo').hide();
				jQuery('#twocheckoutcardinfo').show();
				jQuery('#payulatamcardinfo').hide();
				jQuery('#signupwiredinfo').hide();
											jQuery('.provider_registration')
											.bootstrapValidator('addField', 'twocheckout_cd_number', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'twocheckout_cd_cvc', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'twocheckout_cd_month', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'twocheckout_cd_year', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											});
											jQuery('.provider_registration')
											.bootstrapValidator('removeField', 'cd_number')
											.bootstrapValidator('removeField', 'cd_cvc')
											.bootstrapValidator('removeField', 'cd_month')
											.bootstrapValidator('removeField', 'cd_year')
											.bootstrapValidator('removeField', 'payulatam_signup_cardtype')
											.bootstrapValidator('removeField', 'payulatam_cd_number')
											.bootstrapValidator('removeField', 'payulatam_cd_cvc')
											.bootstrapValidator('removeField', 'payulatam_cd_month')
											.bootstrapValidator('removeField', 'payulatam_cd_year');
			}else if(paymode == 'payulatam'){
				jQuery('#cardinfo').hide();
				jQuery('#twocheckoutcardinfo').hide();
				jQuery('#payulatamcardinfo').show();
				jQuery('#signupwiredinfo').hide();
											jQuery('.provider_registration')
											.bootstrapValidator('addField', 'payulatam_signup_cardtype', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_cd_number', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_cd_cvc', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_cd_month', {
												validators: {
													notEmpty: {
												message: param.req
											},
													digits: {message: param.only_digits},
												}
											})
											.bootstrapValidator('addField', 'payulatam_cd_year', {
												validators: {
													notEmpty: {
														message: param.req
													},
													digits: {message: param.only_digits},
												}
											});
											jQuery('.provider_registration')
											.bootstrapValidator('removeField', 'cd_number')
											.bootstrapValidator('removeField', 'cd_cvc')
											.bootstrapValidator('removeField', 'cd_month')
											.bootstrapValidator('removeField', 'cd_year')
											.bootstrapValidator('removeField', 'twocheckout_cd_number')
											.bootstrapValidator('removeField', 'twocheckout_cd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_cd_month')
											.bootstrapValidator('removeField', 'twocheckout_cd_year');
			}else if(paymode == 'wired'){
				jQuery('#cardinfo').hide();
				jQuery('#twocheckoutcardinfo').hide();
				jQuery('#payulatamcardinfo').hide();
				jQuery('#signupwiredinfo').show();
											jQuery('.provider_registration')
											.bootstrapValidator('removeField', 'cd_number')
											.bootstrapValidator('removeField', 'cd_cvc')
											.bootstrapValidator('removeField', 'cd_month')
											.bootstrapValidator('removeField', 'cd_year')
											.bootstrapValidator('removeField', 'twocheckout_cd_number')
											.bootstrapValidator('removeField', 'twocheckout_cd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_cd_month')
											.bootstrapValidator('removeField', 'twocheckout_cd_year')
											.bootstrapValidator('removeField', 'payulatam_signup_cardtype')
											.bootstrapValidator('removeField', 'payulatam_cd_number')
											.bootstrapValidator('removeField', 'payulatam_cd_cvc')
											.bootstrapValidator('removeField', 'payulatam_cd_month')
											.bootstrapValidator('removeField', 'payulatam_cd_year');
			}else{
				jQuery('#cardinfo').hide();
				jQuery('#twocheckoutcardinfo').hide();
				jQuery('#payulatamcardinfo').hide();
				jQuery('#signupwiredinfo').hide();
											jQuery('.provider_registration')
											.bootstrapValidator('removeField', 'cd_number')
											.bootstrapValidator('removeField', 'cd_cvc')
											.bootstrapValidator('removeField', 'cd_month')
											.bootstrapValidator('removeField', 'cd_year')
											.bootstrapValidator('removeField', 'twocheckout_cd_number')
											.bootstrapValidator('removeField', 'twocheckout_cd_cvc')
											.bootstrapValidator('removeField', 'twocheckout_cd_month')
											.bootstrapValidator('removeField', 'twocheckout_cd_year')
											.bootstrapValidator('removeField', 'payulatam_signup_cardtype')
											.bootstrapValidator('removeField', 'payulatam_cd_number')
											.bootstrapValidator('removeField', 'payulatam_cd_cvc')
											.bootstrapValidator('removeField', 'payulatam_cd_month')
											.bootstrapValidator('removeField', 'payulatam_cd_year');
			}
		})
        .on('success.form.bv', function(form) {
				if(quicksignup == false){
				if(signupautosuggestion){
				jQuery("#signup_city").val(mycity);
				jQuery('.provider_registration').bootstrapValidator('revalidateField', 'signup_city');	
				if(mycity == ''){
					return false;	 
				}
				}
				}
				jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
				 
				if(flag==1 || package_flag==1){form.preventDefault();return false;}
				if(quicksignup == false){
				if(!signupautosuggestion){
					if(cityflag==1){form.preventDefault();return false;}	
				}
				}
				
				var response = jQuery(".provider_registration textarea[name='g-recaptcha-response']").val();
				if(response == "" || response == 'undefined'){
					jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.provider_registration" );	
					jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
					return false;
				}else{
					jQuery(".alert-success,.alert-danger").remove();
				}
				
				var payment_mode = jQuery('.provider_registration input[name=payment_mode]:checked').val();
				var freemode = jQuery('#freemode').val();
				
				var freechk = jQuery('.provider_registration select[name="provider-role"] option:selected').attr('class');
				
				if(woopayment && freechk != 'free' && freechk != 'blank' && freemode != 'yes'){
						var data = {
						  "action": "sf_add_to_woo_cart",
						  "wootype": "signup"
						};
							
						var formdata = jQuery('form.provider_registration').serialize() + "&" + jQuery.param(data);
						
						jQuery.ajax({
							type        : 'POST',
							url         : ajaxurl,
							data        : formdata,
							beforeSend: function() {
								jQuery(".alert-success,.alert-danger").remove();
								jQuery('.loading-area').show();
							},
							dataType    : 'json',
							xhrFields   : { withCredentials: true },
							crossDomain : 'withCredentials' in new XMLHttpRequest(),
							success     : function (response) {
								jQuery('.loading-area').hide();	
								if (response['success']) {
									window.location.href = cart_url;
								} else {
									jQuery(".alert-success,.alert-danger").remove();
									jQuery( "<div class='alert alert-danger'>"+response.error+"</div>" ).insertBefore( "form.provider_registration" );
									jQuery("html, body").animate({
											scrollTop: jQuery(".alert-danger").offset().top
										}, 1000);
								}
							}
						});  
						return false;						  
					  	
				}else{
				if(payment_mode == 'paypal' || freemode == 'yes' || payment_mode == 'wired' || payment_mode == 'payumoney'){
					return true;
				}else if(payment_mode == 'stripe'){
					
				
					// Prevent form submission
					form.preventDefault();
					
					var cd_number = jQuery('input[name="cd_number"]').val();
					var cd_cvc = jQuery('input[name="cd_cvc"]').val();
					var cd_month = jQuery('input[name="cd_month"]').val();
					var cd_year = jQuery('input[name="cd_year"]').val();
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
								  number: jQuery('#cd_number').val(),
								  cvc: jQuery('#cd_cvc').val(),
								  exp_month: jQuery('#cd_month').val(),
								  exp_year: jQuery('#cd_year').val()
								}, service_finder_stripeResponseHandler);		
								}else{
									jQuery('.loading-area').hide();
								    jQuery(".alert-success,.alert-danger").remove();
									jQuery( "<div class='alert alert-danger'>"+param.set_key+".</div>" ).insertBefore( "form.provider_registration" );
									return false;
								}
									 
								}
						});
					
						 
					}
		
				
				
				}else if(payment_mode == 'payulatam'){
					// Prevent form submission
					form.preventDefault();
					var crd_type = jQuery('#payulatam_signup_cardtype').val();
					var crd_number = jQuery('#payulatam_cd_number').val();
					var crd_cvc = jQuery('#payulatam_cd_cvc').val();
					var crd_month = jQuery('#payulatam_cd_month').val();
					var crd_year = jQuery('#payulatam_cd_year').val();
					if(crd_type != "" && crd_number != "" && crd_cvc != "" && crd_month != "" && crd_year != ""){	
					jQuery('.loading-area').show();
					
					var data = {
						  "action": "payulatam_signup",
						};
						
					var formdata = jQuery('form.provider_registration').serialize() + "&" + jQuery.param(data);
					
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
								jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
								if(data['status'] == 'success'){
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.provider_registration" );	
									jQuery("html, body").animate({
										scrollTop: 0
									}, 1000);
									if(data['redirecturl'] != ''){
										window.location = data['redirecturl'];
									}
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.provider_registration" );
									jQuery("html, body").animate({
										scrollTop: 0
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
							jQuery( "<div class='alert alert-danger'>"+e.toSource()+"</div>" ).insertBefore( "form.provider_registration" );
							jQuery("html, body").animate({
									scrollTop: jQuery(".alert-danger").offset().top
								}, 1000);
							return false;
	
						}
					
					}else{
						jQuery('.loading-area').hide();
						jQuery( "<div class='alert alert-danger'>You did not set a valid publishable key.</div>" ).insertBefore( "form.provider_registration" );
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
								jQuery('#signup_city').html(data);
								jQuery('#signup_city').removeAttr('readonly');
								jQuery('#signup_city').removeAttr('disabled');
								jQuery('.sf-select-box').selectpicker('refresh');
							}
	
						});
		}
		
		//Stripe handler for signup
		function service_finder_stripeResponseHandler(status, response) {
  
			  if (response.error) {
				  // Show the errors on the form
				  jQuery('.loading-area').hide();
				  jQuery(".alert-success,.alert-danger").remove();
				  jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
				  jQuery( "<div class='alert alert-danger'>"+response.error.message+"</div>" ).insertBefore( "form.provider_registration" );
				
			  } else {
				// response contains id and card, which contains additional card details
				var token = response.id;
				
				var data = {
					  "action": "signup",
					  "stripeToken": token,
					};
					
				var formdata = jQuery('form.provider_registration').serialize() + "&" + jQuery.param(data);
				
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
								jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
								if(data['status'] == 'success'){
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.provider_registration" );	
									jQuery("html, body").animate({
										scrollTop: 0
									}, 1000);
									if(data['redirecturl'] != ''){
										window.location = data['redirecturl'];
									}
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.provider_registration" );
									jQuery("html, body").animate({
										scrollTop: 0
									}, 1000);
								}
							
							}
	
						});
				
				}
		}
		
	/*Customer Signup*/
	jQuery('.customer_registration')
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
				customertermsncondition: {
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
				
				var response = jQuery(".customer_registration textarea[name='g-recaptcha-response']").val();
				if(response == "" || response == 'undefined'){
					jQuery( "<div class='alert alert-danger'>"+param.captchaverify+"</div>" ).insertBefore( "form.customer_registration" );	
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
									jQuery('.customer_registration').bootstrapValidator('resetForm',true); // Reset form
									jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.customer_registration" );	
									if(data['redirecturl'] != ''){
										window.location = data['redirecturl'];
									}
								}else{
									jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.customer_registration" );
								}
							
							}
	
						});
		});	
	
});
  
var tokenRequest = function() {

var twocheckout_card_number = jQuery('input[name="twocheckout_cd_number"]').val();
var twocheckout_card_cvc = jQuery('input[name="twocheckout_cd_cvc"]').val();
var twocheckout_card_month = jQuery('select[name="twocheckout_cd_month"]').val();
var twocheckout_card_year = jQuery('select[name="twocheckout_cd_year"]').val();

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
				
		var formdata = jQuery('form.provider_registration').serialize() + "&" + jQuery.param(data);
		
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
					jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
					if(data['status'] == 'success'){
						jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.provider_registration" );	
					}else{
						jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.provider_registration" );
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
	  jQuery('form.provider_registration').find('input[type="submit"]').prop('disabled', false);
	  jQuery( "<div class='alert alert-danger'>"+data.errorMsg+"</div>" ).insertBefore( "form.provider_registration" );
	  jQuery("html, body").animate({
							scrollTop: jQuery(".alert-danger").offset().top
						}, 1000);
	}
  };
  
  