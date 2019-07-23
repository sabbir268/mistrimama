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
	
	function initAutoComplete(){

				var address = document.getElementById('searchAddress');


				var options = {
						  componentRestrictions: {country: allowedcountry}
						 };
						
				var my_address = new google.maps.places.Autocomplete(address, options);
						
				var my_address = new google.maps.places.Autocomplete(address);

		

				google.maps.event.addListener(my_address, 'place_changed', function() {

            var place = my_address.getPlace();

            

            // if no location is found

            if (!place.geometry) {

                return;

            }


            var country_long_name = '';

            var country_short_name = '';

            

            for(var i=0; i<place.address_components.length; i++){

                var address_component = place.address_components[i];

                var ty = address_component.types;



                for (var k = 0; k < ty.length; k++) {

                    if (ty[k] === 'locality' || ty[k] === "sublocality" || ty[k] === "sublocality_level_1"  || ty[k] === 'postal_town') {

						var city = address_component.long_name;

                   } else if (ty[k] === "administrative_area_level_1" || ty[k] === "administrative_area_level_2") {

                        var state = address_component.long_name;

                    } else if(ty[k] === 'country'){

						var country = address_component.long_name;

                    }

                }

            }

			

            var address = jQuery("#searchAddress").val();

			var new_address = address.replace(city,"");

            new_address = new_address.replace(state,"");

			

			new_address = new_address.replace(country_long_name,"");

            new_address = new_address.replace(country_short_name,"");

            new_address = jQuery.trim(new_address);

            

            

            new_address = new_address.replace(/,/g, '');

            new_address = new_address.replace(/ +/g," ");

			jQuery("#searchAddress").val(address);

			

			var catid = jQuery("#categorysrh").val();

         });

			}
			
	function initAutoComplete2(){

			var address = document.getElementById('searchAddress2');


			var my_address = new google.maps.places.Autocomplete(address);

	

			google.maps.event.addListener(my_address, 'place_changed', function() {

		var place = my_address.getPlace();

		

		// if no location is found

		if (!place.geometry) {

			return;

		}


		var country_long_name = '';

		var country_short_name = '';

		

		for(var i=0; i<place.address_components.length; i++){

			var address_component = place.address_components[i];

			var ty = address_component.types;



			for (var k = 0; k < ty.length; k++) {

				if (ty[k] === 'locality' || ty[k] === "sublocality" || ty[k] === "sublocality_level_1"  || ty[k] === 'postal_town') {

					var city = address_component.long_name;

			   } else if (ty[k] === "administrative_area_level_1" || ty[k] === "administrative_area_level_2") {

					var state = address_component.long_name;

				} else if(ty[k] === 'country'){

					var country = address_component.long_name;

				}

			}

		}

		

		var address = jQuery("#searchAddress").val();

		var new_address = address.replace(city,"");

		new_address = new_address.replace(state,"");

		

		new_address = new_address.replace(country_long_name,"");

		new_address = new_address.replace(country_short_name,"");

		new_address = jQuery.trim(new_address);

		

		

		new_address = new_address.replace(/,/g, '');

		new_address = new_address.replace(/ +/g," ");

		jQuery("#searchAddress").val(address);

		var catid = jQuery("#categorysrh").val();

	 });

		}
		
	if (jQuery('#searchAddress').length){
	google.maps.event.addDomListener(window, 'load', initAutoComplete);
	}
	
	if (jQuery('#searchAddress2').length){
	google.maps.event.addDomListener(window, 'load', initAutoComplete2);
	}
	
});