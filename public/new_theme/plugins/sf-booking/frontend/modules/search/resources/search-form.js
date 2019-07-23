/*****************************************************************************

*

*	copyright(c) - sedatelab.com - SedateTheme

*	More Info: http://sedatelab.com/

*	Coder: SedateLab Team

*	Email: sedatelab@gmail.com

*

******************************************************************************/



// When the browser is ready...

  jQuery(function() {
				  
	var date = new Date();
	date.setDate(date.getDate()+1);
	
	jQuery('.srhdatepicker').datepicker({
		format: 'yyyy-mm-dd',													
		startDate: date
	})
	.on('hide', function(event) {
		event.preventDefault();
		event.stopPropagation();
	});		
	
	jQuery('body').on('change', '#srhbybooking', function(){
		var srhbased = jQuery(this).val();
		
		if(srhbased == 'off'){
			jQuery('#avlsrhfilter').hide();
		}else{
			jQuery('#avlsrhfilter').show();
		}
	});
				  
	jQuery('body').on('change', '#country', function(){
													 
        // Get the record's ID via attribute
        var country = jQuery(this).val();
		
		var data = {
			  "action": "load_cities",
			  "country": country
			};
			
	  var formdata = jQuery.param(data);
	  
	  jQuery.ajax({

						type: 'POST',

						url: ajaxurl,

						data: formdata,
						
						dataType: "json",
						
						beforeSend: function() {
							jQuery('.loading-srh-bar').show();
						},

						success:function (data, textStatus) {
							jQuery('.loading-srh-bar').hide();
							if(data['status'] == 'success'){
								jQuery('select[name="city"]').html(data['html']);
								jQuery('select[name="city"]').selectpicker('refresh');
							}
						
						}

					});
		
	
	});

	
  });
  
  // Window Load START========================================================//

	jQuery(window).load(function () {
		jQuery('#categorysrh').selectpicker('refresh');						  
		jQuery('#country').selectpicker('refresh');
		jQuery('#city').selectpicker('refresh');
	})
	
	// Current location detection
	
var findMeButton = jQuery('.find-me');

// Check if the browser has support for the Geolocation API
if (!navigator.geolocation) {

  findMeButton.addClass("disabled");
  jQuery('.no-browser-support').addClass("visible");

} else {

  findMeButton.on('click', function(e) {

    e.preventDefault();

    navigator.geolocation.getCurrentPosition(function(position) {

      // Get the coordinates of the current possition.
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
 
      // Create a new map and place a marker at the device location.
      
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(lat, lng);
      geocoder.geocode({
            'latLng': latlng
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                     jQuery("#searchAddress").val(results[0].formatted_address);
                } else {
                    alert('No results found');
                }
            } else {
                alert('Geocoder failed due to: ' + status);
            }
        });
    });
  });

}