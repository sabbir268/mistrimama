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



	jQuery("#insert-add-media").on('click',function() {

        open_media_window();

    });

	

	function open_media_window() {

		var window = wp.media({

				title: 'Insert a media',

				library: {type: 'image'},

				multiple: false,

				button: {text: 'Insert'}

			});

		

		window.on('select', function(){

			var first = window.state().get('selection').first().toJSON();

			

			var imagehtml = '<img class="alignnone" src="'+first.url+'" alt="" width="'+first.width+'" height="'+first.height+'" />';

			

			tinymce.activeEditor.insertContent(imagehtml);

			

		});

		

		window.open();

	}

	

	jQuery('body').on('click','.alert-success,.alert-danger',function(){

		jQuery(this).remove();	

	});

	

	jQuery("[data-toggle=popover]").each(function() {

	  jQuery(this).popover({

		html: true,

		content: function() {

	   var id = jQuery(this).attr('id')

	   return jQuery('#popover-content-' + id).html();

		}

	  });

	 });

	

	//Comment Rating

	 jQuery(".add-custom-rating").rating({

		stars: 5,

		starCaptions: function(val) {

			return ' ';

		},

		starCaptionClasses: function(val) {

			if (val <= 1) {

				return 'aon-icon-angry';

			} else if (val <= 2){

				return 'aon-icon-cry';

			} else if (val <= 3){

				return 'aon-icon-sad';

			} else if (val <= 4){

				return 'aon-icon-happy';

			} else if (val <= 5){

				return 'aon-icon-awesome';

			}

		},

		clearCaptionClass: '',

		clearButton: '',

		clearCaption: '',

		hoverOnClear: false

	});

	 

	jQuery('body').on('click','.openadvsrh',function(){

		jQuery('.search-form .sf-advace-search').toggle();

		

		var isVisible = jQuery( ".search-form .sf-advace-search" ).is( ":visible" );

		

		if(isVisible){

			jQuery('.openadvsrh i').removeClass('fa-chevron-up');

			jQuery('.openadvsrh i').addClass('fa-chevron-down');	

		}else{

			jQuery('.openadvsrh i').removeClass('fa-chevron-down');	

			jQuery('.openadvsrh i').addClass('fa-chevron-up');

		}

		

	});	

	

	jQuery(document).on('click','.load-branch-address',function(){

       var branchid = jQuery(this).data("branchid") // activated tab

	   var userid = jQuery(this).data("userid") // activated tab

	   

	   jQuery('.sf-location-listing li').removeClass("sf-active-location") // activated tab

	   jQuery(this).closest('li').addClass("sf-active-location") // activated tab

	   

	   var data = {

			  "action": "load_branch_marker",

			  "branchid": branchid,

			  "userid": userid,

			};

			

		jQuery.ajax({

            type:'POST',

            url:ajaxurl,

            data:data,

			dataType: "json",

            success:function(data){



				googlecode_regular_vars.page_custom_zoom = data['zoomlevel'];







				googlecode_regular_vars.general_latitude = data['lat'];







				googlecode_regular_vars.general_longitude = data['long'];



				



				var  new_markers = jQuery.parseJSON(data['markers']);



				refresh_marker(map, new_markers);



				initializeSearchMap();



            }

        });

	   

    });

	

	jQuery(document).on('click','.showmorelocation',function(){

	   var $this = jQuery(this);

	   

	   var userid = jQuery(this).data("userid") // activated tab

	   

	   var data = {

			  "action": "load_more_branches",

			  "userid": userid,

			};

			

		jQuery.ajax({

            type:'POST',

            url:ajaxurl,

            data:data,

			beforeSend: function() {

				jQuery('.loading-area').show();

			},

            success:function(data){

				

			   jQuery('.loading-area').hide();

			   jQuery("#morebranches").html(data);

			   jQuery(".showalllocation").show('slow');

			   $this.removeClass('showmorelocation');

			   $this.addClass('showlesslocation');

			   $this.text(param.show_less);



            }

        });

    });

	

	jQuery(document).on('click','.showlesslocation',function(){

       jQuery(".showalllocation").hide('slow');

	   jQuery(this).addClass('showmorelocation');

	   jQuery(this).removeClass('showlesslocation');

	   jQuery(this).text(param.show_more);

	   jQuery("#morebranches").html('');

    });

	

	jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

	  var target = jQuery(e.target).attr("href") // activated tab

	  

	  var data = {

			  "action": "set_social_cookie",

			  "target": target,

			};

			

	  jQuery.ajax({

            type:'POST',

            url:ajaxurl,

            data:data,

            success:function(html){

            }

      });

	});

	

	  

	jQuery(document).on('click','.refreshCaptcha',function(){

		var where = jQuery(this).data('where');

		var img = document.images['captchaimg_'+where];

		img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?where="+where+"&rand="+Math.random()*1000;													 

	});

	

	jQuery('.display-ratings').rating();

	jQuery('.sf-show-rating').show();

	

	// tooltip function by = bootstrp.min.js ========================== //

	jQuery('[data-tool="tooltip"]').tooltip();

	

	jQuery('#quotes-Modal').on('show.bs.modal', function (event) {

	  var button = jQuery(event.relatedTarget);

	  var providerid = button.data('providerid');

	  if(providerid > 0){

		  jQuery("#quotes-Modal #proid").val(providerid);

		  jQuery("#quotes-Modal #proid").attr('data-provider',providerid);

	  }

	  

	});

	

	jQuery('#quotes-Modal').on('hide.bs.modal', function (event) {

		  jQuery("#quotes-Modal .alert").remove();

		  var where = 'requestquotepopup';

		  var elm = jQuery("#captchaimg_"+where).length;

		  if(elm > 0){

		  jQuery("input[name='captcha_code']").val('');

		  var img = document.images['captchaimg_'+where];

		  img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?where="+where+"&rand="+Math.random()*1000;	

		  }

	});

	

	jQuery(document).on('click','.sf-notifications',function(){

        var usertype = jQuery(this).data('usertype');

		var userid = jQuery(this).data('userid');

		

        var data = {

			  "action": "view_notificaions",

			  "usertype": usertype,

			  "userid": userid,

			};

			

		jQuery.ajax({

            type:'POST',

            url:ajaxurl,

            data:data,

            success:function(html){

            }

        }); 

    });

	

	//Tabbing on My Account Page

	jQuery("#myTab a").click(function(e){

		e.preventDefault();

		jQuery(this).tab('show');

		var tabid = jQuery(this).attr('href');

		if(tabid == '#schedule'){

			e.preventDefault();

		}

	});

	

	//Sub Tabbing on Availability Tab

	jQuery("#subTab a").click(function(e){

		e.preventDefault();

		jQuery(this).tab('show');

	});

	

	//Sub Tabbing on Availability Tab

	jQuery("#subTab2 a").click(function(e){

		e.preventDefault();

		var tabid = jQuery(this).attr('href');



		jQuery('#subTab2 a[href="'+tabid+'"]').tab('show');	

	

	});

	

	//Sub Tabbing on Business Hours Tab

	jQuery("#subTabHours a").click(function(e){

		e.preventDefault();

		jQuery(this).tab('show');

	});

	

	//Booking Tab

	jQuery("#bookingTab a").click(function(e){

		e.preventDefault();

		jQuery(this).tab('show');

	});

	

	/*Invite for job*/

	// Get Quotetion Form Validation

	jQuery('.inviteforjob')

	.bootstrapValidator({

		message: 'This value is not valid',

		feedbackIcons: {

			valid: 'glyphicon glyphicon-ok',

			invalid: 'glyphicon glyphicon-remove',

			validating: 'glyphicon glyphicon-refresh'

		},

		fields: {

			invitedjob: {

				validators: {

					notEmpty: {}

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

		  "action": "sendinvitation",

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

							jQuery( "<div class='alert alert-success'>"+data['suc_message']+"</div>" ).insertBefore( "form.inviteforjob" );	

							window.setTimeout(function(){

								jQuery('#invite-job').modal('hide');

							}, 2000); // 2 seconds expressed in milliseconds

						}else if(data['status'] == 'error'){

							jQuery( "<div class='alert alert-danger'>"+data['err_message']+"</div>" ).insertBefore( "form.inviteforjob" );

						}

						

					}



				});

		

	});

	

	jQuery(".aon-service-bx").click(function () {

		if (jQuery(this).hasClass('selected')) {

			jQuery(this).removeClass('selected').addClass('unselected');

		} else {

		jQuery(this).removeClass('unselected').addClass('selected');

		}

	});		

	

});

  

  	jQuery(window).load(function () {

	function hide_alert_box(){

	  

	  jQuery('.alert-success').remove();	

	  jQuery('.alert-danger').remove();	

	}

	setInterval(hide_alert_box, hide_msg_seconds);								  

								  

	// Bootstrap Select box function by  = bootstrap-select.min.js ================= // 

	jQuery('select').selectpicker();

		

// TouchSpin box function by  = jquery.bootstrap-touchspin.js ================= // 



	jQuery("input[name='demo_vertical2']").TouchSpin({

      verticalbuttons: true,

      verticalupclass: 'glyphicon glyphicon-plus',

      verticaldownclass: 'glyphicon glyphicon-minus'

    });	

								  });