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

jQuery('body').on('click', '.sf-couponcode-close', function(){
	jQuery('#addcouponcode,.sf-couponcode-popup-overlay').fadeOut("slow");
})

/*Display Services*/
jQuery('form.book-now').on('change', 'select[name="choose_customer"]', function(){
	var customerid = jQuery(this).val();
	
	var data = {
				  "action": "load_customer_data",
				  "customerid": customerid,
				};

	var formdata = jQuery.param(data);

	jQuery.ajax({
		type: 'POST',
		url: ajaxurl,
		data: formdata,
		dataType: "json",
		beforeSend: function() {
			jQuery('.loading-area').show();
		},
		success:function (data, textStatus) {
				jQuery('.loading-area').hide();
				if(data != null){
					jQuery('input[name="location"]').val(data['address']);
					jQuery('input[name="zipcode"]').val(data['zipcode']);
					jQuery('input[name="firstname"]').val(data['fname']);
					jQuery('input[name="lastname"]').val(data['lname']);
					jQuery('input[name="email"]').val(data['email']);
					jQuery('input[name="phone"]').val(data['phone']);
					jQuery('input[name="phone2"]').val(data['phone2']);
					jQuery('input[name="address"]').val(data['address']);
					jQuery('input[name="apt"]').val(data['apt']);
					jQuery('input[name="city"]').val(data['city']);
					jQuery('input[name="state"]').val(data['state']);
					jQuery('input[name="country"]').val(data['country']);

				}
		}

	});
});

});
