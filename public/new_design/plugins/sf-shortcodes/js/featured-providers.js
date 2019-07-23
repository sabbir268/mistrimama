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
	/*Make the providers favorite*/
	jQuery('body').on('click', '.add-favorite', function(){

				var providerid = jQuery(this).attr('data-proid');
				var userid = jQuery(this).attr('data-userid');
				var data = {
						  "action": "addtofavorite",
						  "userid": userid,
						  "providerid": providerid
						};
						
				var formdata = jQuery.param(data);
				
				jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						beforeSend: function() {
							jQuery('.loading-area').show();
						},
						
						data: formdata,
						
						dataType: "json",

						success:function (data, textStatus) {
							
							jQuery('.loading-area').hide();
							if(data['status'] == 'success'){
								if(themestyle == 'style-2'){
								jQuery( '<a href="javascript:;" class="remove-favorite sf-featured-item" data-proid="'+providerid+'" data-userid="'+userid+'"><i class="fa fa-heart"></i></a>' ).insertBefore( '#proid-'+providerid+' .add-favorite' );
								}else{
								jQuery( '<a href="javascript:;" class="remove-favorite btn btn-primary" data-proid="'+providerid+'" data-userid="'+userid+'">'+args.myfav+'<i class="fa fa-heart"></i></a>' ).insertBefore( '#proid-'+providerid+' .add-favorite' );
								}
								jQuery('#proid-'+providerid+' .add-favorite').remove();

							}

							
						}

					});																
	});
	/*Remove the providers from favorite*/
	jQuery('body').on('click', '.remove-favorite', function(){

				var providerid = jQuery(this).attr('data-proid');
				var userid = jQuery(this).attr('data-userid');
				var data = {
						  "action": "removefromfavorite",
						  "userid": userid,
						  "providerid": providerid
						};
						
				var formdata = jQuery.param(data);
				
				jQuery.ajax({

						type: 'POST',

						url: ajaxurl,
						
						beforeSend: function() {
							jQuery('.loading-area').show();
						},
						
						data: formdata,
						
						dataType: "json",

						success:function (data, textStatus) {
							jQuery('.loading-area').hide();
							if(data['status'] == 'success'){
								
								if(themestyle == 'style-2'){
								jQuery( '<a href="javascript:;" class="add-favorite sf-featured-item" data-proid="'+providerid+'" data-userid="'+userid+'"><i class="fa fa-heart-o"></i></a>' ).insertBefore( '#proid-'+providerid+' .remove-favorite' );
								}else{
								jQuery( '<a href="javascript:;" class="add-favorite btn btn-primary" data-proid="'+providerid+'" data-userid="'+userid+'">'+args.addtofav+'<i class="fa fa-heart"></i></a>' ).insertBefore( '#proid-'+providerid+' .remove-favorite' );
								}
								jQuery('#proid-'+providerid+' .remove-favorite').remove();

							}

							
						}

					});																
	});

  });
  
