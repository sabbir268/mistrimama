/*Google map Initialize Functions*/
var gmarkers = [];
var current_place = 0;
var actions = [];
var categories = [];
var vertical_pan = -190;
var map_open = 0;
var vertical_off = 150;
var pins = '';
var markers = '';
var infoBox = null;
var category = null;
var categorycolor = null;
var company = null;
var address = null;
var width_browser = null;
var infobox_width = null;
var wraper_height = null;
var info_image = null;
var radius = '';
var map;
var found_id;
var selected_id = '';
var javamap;
var oms;
var bounds_list;
var googlecode_regular_vars;
var mapfunctions_vars;
var branch_marker = [];


var mcluster;

function initializeSearchMap(infostatus) {
	
    "use strict";
    var mapOptions, styles;
    mapOptions = {
        flat: false,
        noClear: false,
        zoom: parseInt(googlecode_regular_vars.page_custom_zoom, 10),
        scrollwheel: false,
        draggable: true,
		gestureHandling: 'greedy',
        center: new google.maps.LatLng(googlecode_regular_vars.general_latitude, googlecode_regular_vars.general_longitude),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false,
        mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP]
        },
        disableDefaultUI: true
};


    if (document.getElementById('googleMap')) {
		map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
    } else if (document.getElementById('google_map_prop_list')) {
        map = new google.maps.Map(document.getElementById('google_map_prop_list'), mapOptions);
        bounds_list = new google.maps.LatLngBounds();
    } else {
        return;
    }

    google.maps.visualRefresh = true;

    if (mapfunctions_vars.map_style !== '') {
        styles = JSON.parse(mapfunctions_vars.map_style);
        map.setOptions({styles: styles});
    }


    google.maps.event.addListener(map, 'tilesloaded', function () {
        jQuery('.loading-map').hide();
    });

    if (Modernizr.mq('only all and (max-width: 1025px)')) {
        map.setOptions({'draggable': false});
    }


    if (googlecode_regular_vars.generated_pins === '0') {
        pins = googlecode_regular_vars.markers;
        markers = jQuery.parseJSON(pins);
    } else {
        if (typeof (googlecode_regular_vars2.markers2) !== 'undefined' && googlecode_regular_vars2.markers2.length > 2) {
            pins = googlecode_regular_vars2.markers2;
            markers = jQuery.parseJSON(pins);
        }
    }
	
	if(branch_marker.length > 0) {
		markers = branch_marker;
	}

    if (markers.length > 0) {
        setGmapMarkers(map, markers,infostatus);
    }

    //set map cluster
    map_cluster();
    function scrollwhel(event) {
        if (map.scrollwheel === true) {
            event.stopPropagation();
        }
    }

    if (document.getElementById('googleMap')) {
        google.maps.event.addDomListener(document.getElementById('googleMap'), 'mousewheel', scrollwhel);
        google.maps.event.addDomListener(document.getElementById('googleMap'), 'DOMMouseScroll', scrollwhel);
    }

    if (document.getElementById('google_map_prop_list')) {

        if (!bounds_list.isEmpty()) {
            map.fitBounds(bounds_list);
        }

        google.maps.event.addDomListener(document.getElementById('google_map_prop_list'), 'mousewheel', scrollwhel);
        google.maps.event.addDomListener(document.getElementById('google_map_prop_list'), 'DOMMouseScroll', scrollwhel);
    }

    oms = new OverlappingMarkerSpiderfier(map, {markersWontMove: true, markersWontHide: true, keepSpiderfied: true, legWeight: 3});

}

/*Google map Functions*/
var pin_images = mapfunctions_vars.pin_images;
var images = jQuery.parseJSON(pin_images);
var ipad_time = 0;
var infobox_id = 0;
var shape = {
    coord: [1, 1, 1, 38, 38, 59, 59, 1],
    type: 'poly'
};

var mcOptions;
var mcluster;
var clusterStyles;
var infoBox;
var infobox_width;
/////////////////////////////////////////////////////////////////////////////////////////////////
//  set markers... loading pins over map
/////////////////////////////////////////////////////////////////////////////////////////////////  

function setGmapMarkers(map, locations,infostatus) {
    "use strict";
    var  beach, id, lat, proid, lng, title, pin, counter, image, link, open_height, boxText, closed_height, width_browser, infobox_width, vertical_pan, myOptions, i;
    selected_id = parseInt(jQuery('#gmap_wrapper').attr('data-post_id'), 10);
    if (isNaN(selected_id)) {
        selected_id = parseInt(jQuery('#google_map_on_list').attr('data-post_id'), 10);
    }

    open_height = parseInt(mapfunctions_vars.open_height, 10);
    closed_height = parseInt(mapfunctions_vars.closed_height, 10);
    boxText = document.createElement("div");
    width_browser = jQuery(window).width();

    infobox_width = 700;
    vertical_pan = -215;
    if (width_browser < 900) {
        infobox_width = 500;
    }
    if (width_browser < 600) {
        infobox_width = 400;
    }
    if (width_browser < 400) {
        infobox_width = 200;
    }


    myOptions = {
        content: boxText,
        disableAutoPan: true,
        maxWidth: infobox_width,
        boxClass: "mybox",
        zIndex: null,
        closeBoxMargin: "-13px 0px 0px 0px",
        closeBoxURL: "",
        infoBoxClearance: new google.maps.Size(1, 1),
        isHidden: false,
        pane: "floatPane",
        enableEventPropagation: false
    };
    infoBox = new InfoBox(myOptions);

    for (i = 0; i < locations.length; i++) {
        beach = locations[i];
        lat = beach[1];
        lng = beach[2];
        title = decodeURIComponent(beach[0]);
        pin = beach[4];
        image = decodeURIComponent(beach[3]);
        link = decodeURIComponent(beach[5]);
		proid = beach[6];
		category = beach[7];
		address = beach[8];
		company = beach[9];
		categorycolor = beach[10];
		radius = beach[11];

        createGmapMarker(infobox_width , i, lat, lng, pin, title, image, link, proid, category, categorycolor, address, company,infostatus,radius);
        // found the property

        if (selected_id === id) {
            found_id = i;
        }
    }//end for

    // pan to the latest pin for taxonmy and adv search  
    if (mapfunctions_vars.generated_pins !== '0') {
        myLatLng = new google.maps.LatLng(lat, lng);
        service_finder_end_pin(myLatLng);
    }
}// end setGmapMarkers


/////////////////////////////////////////////////////////////////////////////////////////////////
//  create marker
/////////////////////////////////////////////////////////////////////////////////////////////////  

function createGmapMarker(infobox_width , i, lat, lng, pin, title, image, link, proid, category, categorycolor, address, company,infostatus,radius) {
    "use strict";
    var marker, myLatLng;
    myLatLng = new google.maps.LatLng(lat, lng);
    if (mapfunctions_vars.custom_search === 'yes') {
        marker = new RichMarker({
            position: myLatLng,
            map: map,
			content: '<div class="map-marker" style="background-color:'+categorycolor+'" id="proid_'+proid+'"><div class="icon"><img src="'+pin+'"></div> </div>',
			shadow: '',
            custompin: pin,
			idul: proid,
			category: category,
			company: company,
			address: address,
            shape: shape,
            title: decodeURIComponent(title.replace(/\+/g, ' ')),
            zIndex: 3,
            image: image,
            link: link,
            infoWindowIndex: i,
			infostatus: infostatus,
        });

    } else {
        marker = new RichMarker({
            position: myLatLng,
            map: map,
		    content: '<div class="map-marker" style="background-color:'+categorycolor+'" id="proid_'+proid+'"><div class="icon"><img src="'+pin+'"></div> </div>',
			shadow: '',
            custompin: pin,
			idul: proid,
			category: category,
			company: company,
			address: address,
            shape: shape,
            title: title,
            zIndex: 3,
            image: image,
            link: link,
            infoWindowIndex: i,
			infostatus: infostatus,
        });

    }
	radius = parseFloat(radius);
	if(radius != "" && radius != "undefined" && radius > 0){
	// Add circle overlay and bind to marker
	var circle = new google.maps.Circle({
	  map: map,
	  radius: radius,    // 10 miles in metres
	  fillColor: radiusfillcolor,
	  strokeColor: radiusbordercolor,
	  strokeWeight: radiusborderthickness,
	  fillOpacity: radiusfillcoloropacity,
	  strokeOpacity: radiusbordercoloropacity,
	});
	circle.bindTo('center', marker, 'position');
	}

    gmarkers.push(marker);

    if (typeof (bounds_list) !== "undefined") {
        bounds_list.extend(marker.getPosition());
    }


    google.maps.event.addListener(marker, 'click', function (event) {
        var title, info_image;
        info_image = this.image;

        title = this.title.toString();
        title = title.substr(0, 22);
        if (this.title.length > 22) {
            title = title + "...";
        }
		if(showaddressinfo && accessaddressinfo && showpostaladdress){
			var addressbox = '<div class="map-address">'+ this.address +'</div>';
		}else{
			var addressbox = '';	
		}
        infoBox.setContent('<div class="info_details"><span id="infocloser" onClick=\'javascript:infoBox.close();\' ><i class="fa fa-close"></i></span><a href="' + this.link + '"><div class="infogradient"></div><div class="infoimage" style="background-image:url(' + info_image + ')"  ></div></a><a href="' + this.link + '" id="infobox_title">' + title + '</a><div class="map-company">'+ this.company +'</div><div class="map-category">'+ this.category +'</div>'+ addressbox +'</div>');
        if(this.infostatus != 'no'){
		infoBox.open(map, this);
        map.setCenter(this.position);
		}

        switch (infobox_width) {
            case 700:
                if (!document.getElementById('google_map_on_list')) {
                    if (mapfunctions_vars.listing_map === 'top') {
                        if( document.getElementById('google_map_prop_list') ){
                            map.panBy(0, -100);   
                         
                        }else{
                            map.panBy(100, -100);      console.log('pan12');
                        }
                    } else {        
                        map.panBy(10, -110);
                    }
                } else {
                 
                    map.panBy(0, -160);
                }
                vertical_off = 0;
                break;
            case 500:
                if( document.getElementById('google_map_prop_list') ){
                    map.panBy(50, -120);   
                }else{
                    map.panBy(50, -150);   
                }
                break;
            case 400:
              
                if( document.getElementById('google_map_prop_list') ){
                     map.panBy(100, -220); 
                }else{
                    map.panBy(0, -150);   
                }
                break;
            case 200:
                map.panBy(20, -170);
                break;
        }

    });/////////////////////////////////// end event listener

    if (mapfunctions_vars.generated_pins !== '0') {
        service_finder_end_pin(myLatLng);
    }
}

function service_finder_end_pin(myLatLng) {
    "use strict";
    map.setCenter(myLatLng);
}


/////////////////////////////////////////////////////////////////////////////////////////////////
//  build map cluter
/////////////////////////////////////////////////////////////////////////////////////////////////   
function map_cluster() {
    "use strict";
    if (mapfunctions_vars.user_cluster === 'yes') {
        clusterStyles = [
            {
                textColor: '#ffffff',
                opt_textColor: '#ffffff',
                url: mapfunctions_vars.path + '/cloud.png',
                height: 72,
                width: 72,
                textSize: 15
            }
        ];
        mcOptions = {gridSize: 50,
            ignoreHidden: true,
            maxZoom: mapfunctions_vars.zoom_cluster,
            styles: clusterStyles
        };
        mcluster = new MarkerClusterer(map, gmarkers, mcOptions);
        mcluster.setIgnoreHidden(true);
    }

}



/////////////////////////////////////////////////////////////////////////////////////////////////
/// zoom
/////////////////////////////////////////////////////////////////////////////////////////////////


if (document.getElementById('gmapzoomplus')) {
    google.maps.event.addDomListener(document.getElementById('gmapzoomplus'), 'click', function () {
        "use strict";
        var current = parseInt(map.getZoom(), 10);
        current = current + 1;
        if (current > 20) {
            current = 20;
        }
        map.setZoom(current);
    });
}


if (document.getElementById('gmapzoomminus')) {
    google.maps.event.addDomListener(document.getElementById('gmapzoomminus'), 'click', function () {
        "use strict";
        var current = parseInt(map.getZoom(), 10);
        current = current - 1;
        if (current < 0) {
            current = 0;
        }
        map.setZoom(current);
    });
}




jQuery('#gmapstreet').click(function () {
    "use strict";
    toggleStreetView();
});

/////////////////////////////////////////////////////////////////////////////////////////////////
/// geolocation
/////////////////////////////////////////////////////////////////////////////////////////////////

if (document.getElementById('geolocation-button')) {
    google.maps.event.addDomListener(document.getElementById('geolocation-button'), 'click', function () {
        "use strict";
        getcurrentposition(map);
    });
}


if (document.getElementById('mobile-geolocation-button')) {
    google.maps.event.addDomListener(document.getElementById('mobile-geolocation-button'), 'click', function () {
        "use strict";
        getcurrentposition(map);
    });
}


jQuery('#mobile-geolocation-button,#geolocation-button').click(function () {
    "use strict";
    getcurrentposition(map);
});



function getcurrentposition(map) {
    "use strict";
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(displayPosition, errorCallback, {timeout: 10000});
    } else {
        alert(mapfunctions_vars.geo_no_brow);
    }
}


function errorCallback() {
    "use strict";
    alert(mapfunctions_vars.geo_no_pos);
}

function displayPosition(pos) {
    "use strict";
    var shape, MyPoint, marker, populationOptions, cityCircle, label;
    shape = {
        coord: [1, 1, 1, 38, 38, 59, 59, 1],
        type: 'poly'
    };

    MyPoint = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
    map.setCenter(MyPoint);

    marker = new google.maps.Marker({
        position: MyPoint,
        map: map,
        icon: mypin(),
        shape: shape,
        title: '',
        zIndex: 999999999,
        image: '',
        price: '',
        category: '',
        action: '',
        link: '',
        infoWindowIndex: 99,
        radius: parseInt(mapfunctions_vars.geolocation_radius, 10) + ' ' + mapfunctions_vars.geo_message
    });

    populationOptions = {
        strokeColor: '#67cfd8',
        strokeOpacity: 0.6,
        strokeWeight: 1,
        fillColor: '#67cfd8',
        fillOpacity: 0.2,
        map: map,
        center: MyPoint,
        radius: parseInt(mapfunctions_vars.geolocation_radius, 10)
    };
    cityCircle = new google.maps.Circle(populationOptions);

    label = new MyLabel({
        map: map
    });
    label.bindTo('position', marker);
    label.bindTo('text', marker, 'radius');
    label.bindTo('visible', marker);
    label.bindTo('clickable', marker);
    label.bindTo('zIndex', marker);

}



function mypin() {
    "use strict";
    var custom_img, image;

    if (images['userpin'] === '') {
        custom_img = mapfunctions_vars.path + '/' + 'userpin' + '.png';
    } else {
        custom_img = images['userpin'];
    }

    image = {
        url: custom_img,
        size: new google.maps.Size(59, 59),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(16, 59)
    };
    return image;
}



// same thing as above but with ipad double click workaroud solutin
jQuery('#googleMap').click(function (event) {
    "use strict";
    var time_diff;
    time_diff = event.timeStamp - ipad_time;
	
    if (time_diff > 300) {
        ipad_time = event.timeStamp;
        if (map.scrollwheel === false) {
            if(googlecode_regular_vars.scrollwheel == false){
			map.setOptions({'scrollwheel': false});
			}else{
			map.setOptions({'scrollwheel': true});
			}
            jQuery('#googleMap').addClass('scrollon');
        } else {
            map.setOptions({'scrollwheel': false});
            jQuery('#googleMap').removeClass('scrollon');
        }
        jQuery('.tooltip').fadeOut("fast");


        if (Modernizr.mq('only all and (max-width: 1025px)')) {
            if (map.draggable === false) {
                map.setOptions({'draggable': true});
            } else {
                map.setOptions({'draggable': false});
            }
        }

    }
});


/////////////////////////////////////////////////////////////////////////////////////////////////
/// 
/////////////////////////////////////////////////////////////////////////////////////////////////

if (document.getElementById('gmap')) {
    google.maps.event.addDomListener(document.getElementById('gmap'), 'mouseout', function () {
        "use strict";
        map.setOptions({'scrollwheel': true});
        google.maps.event.trigger(map, "resize");
    });
}


if (document.getElementById('search_map_button')) {
    google.maps.event.addDomListener(document.getElementById('search_map_button'), 'click', function () {
        "use strict";
        infoBox.close();
    });
}



if (document.getElementById('advanced_search_map_button')) {
    google.maps.event.addDomListener(document.getElementById('advanced_search_map_button'), 'click', function () {
        "use strict";
        infoBox.close();
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////
/// navigate troguh pins 
///////////////////////////////////////////////////////////////////////////////////////////////
 jQuery('#gmap-full').click(function () {
        if (jQuery('#gmap_wrapper').hasClass('fullmap')) {
            jQuery('#gmap_wrapper').removeClass('fullmap').css('height', wrap_h + 'px');
			jQuery('body').removeClass('full-screen-map');
            jQuery('#googleMap').removeClass('fullmap').css('height', map_h + 'px');
            jQuery('#search_wrapper').removeClass('fullscreen_search');
            jQuery('#search_wrapper').removeClass('fullscreen_search_open');
            jQuery('.master_header').removeClass('hidden');
            jQuery('#gmap-controls-wrapper ').removeClass('fullscreenon');
            jQuery('.content_wrapper,#colophon,#openmap').show();
            jQuery('#gmap-controls-wrapper ').removeClass('fullscreenon');

            jQuery('body,html').animate({
                scrollTop: 0
            }, "slow");
            jQuery('#openmap').show();
            jQuery(this).removeClass('spanselected');
        } else {
            wrap_h = jQuery('#gmap_wrapper').outerHeight();
            map_h = jQuery('#googleMap').outerHeight();
            jQuery('#gmap_wrapper,#googleMap').css('height', '100%').addClass('fullmap');
			jQuery('body').addClass('full-screen-map');
            jQuery('#search_wrapper').addClass('fullscreen_search');
            jQuery('.master_header ').addClass('hidden');
            jQuery('.content_wrapper,#colophon,#openmap').hide();
            jQuery('#gmap-controls-wrapper ').addClass('fullscreenon');
            jQuery(this).addClass('spanselected');
        }

        if (jQuery('#google_map_prop_list_wrapper').hasClass('halfmapfull')) {
            jQuery('#google_map_prop_list_wrapper').removeClass('halfmapfull');
            jQuery('#google_map_prop_list_wrapper').removeClass('halfmapfullx');
            jQuery('.master_header').removeClass('hidden');
            jQuery('#gmap-controls-wrapper ').removeClass('fullscreenon');
             jQuery(this).removeClass('spanselected');
        } else {
            jQuery('#google_map_prop_list_wrapper').addClass('halfmapfull');
            jQuery('#google_map_prop_list_wrapper').addClass('halfmapfullx');
            
        }
        google.maps.event.trigger(map, "resize");
    });


jQuery('#gmap-next').click(function () {
    "use strict";
    current_place++;
    if (current_place > gmarkers.length) {
        current_place = 1;
    }
    while (gmarkers[current_place - 1].visible === false) {
        current_place++;
        if (current_place > gmarkers.length) {
            current_place = 1;
        }
    }

    if (map.getZoom() < 15) {
        map.setZoom(15);
    }
    google.maps.event.trigger(gmarkers[current_place - 1], 'click');
});


jQuery('#gmap-prev').click(function () {
    current_place--;
    if (current_place < 1) {
        current_place = gmarkers.length;
    }
    while (gmarkers[current_place - 1].visible === false) {
        current_place--;
        if (current_place > gmarkers.length) {
            current_place = 1;
        }
    }
    if (map.getZoom() < 15) {
        map.setZoom(15);
    }
	google.maps.event.trigger(gmarkers[current_place - 1], 'click');
});


///////////////////////////////////////////////////////////////////////////////////////////////////////////
/// filter pins 
//////////////////////////////////////////////////////////////////////////////////////////////////////////

jQuery('.advanced_action_div li').click(function () {
    "use strict";
    var action = jQuery(this).val();
});


/////////////////////////////////////////////////////////////////////////////////////////////////
/// get pin image
/////////////////////////////////////////////////////////////////////////////////////////////////
function convertToSlug(Text) {
    "use strict";
    return Text.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
}


function mypinimage(image) {
    "use strict";
    var custom_img;
    if (image !== '') {

			custom_img = image;

	} else {
        custom_img = mapfunctions_vars.path + '/none.png';
    }

    if (typeof (custom_img) === 'undefined') {
        custom_img = mapfunctions_vars.path + '/none.png';
    }

    image = {
        url: custom_img,
        size: new google.maps.Size(44, 50),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(26, 25)
    };
	return image;
}


function mypinhover() {
    "use strict";
    var custom_img, image;
    custom_img = mapfunctions_vars.path + '/hover.png';


    image = {
        url: custom_img,
        size: new google.maps.Size(44, 50),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(26, 25)
    };
    return image;
}

function wpestate_hover_action_pin(listing_id) {
    "use strict";
    for (var i = 0; i < gmarkers.length; i++) {
        if (parseInt(gmarkers[i].idul, 10) === parseInt(listing_id, 10)) {
           jQuery('#proid_'+listing_id).addClass('active');
        }
    }
}

function wpestate_return_hover_action_pin(listing_id) {
    "use strict";
    for (var i = 0; i < gmarkers.length; i++) {
        if (parseInt(gmarkers[i].idul, 10) === parseInt(listing_id, 10)) {
            jQuery('#proid_'+listing_id).removeClass('active');
        }
    }
}

function mypin2(image) {
    "use strict";
    image = {
        url: mapfunctions_vars.path + '/' + image + '.png',
        size: new google.maps.Size(59, 59),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(16, 59)
    };
    return image;
}


/////////////////////////////////////////////////////////////////////////////////////////////////
//// Circle label
/////////////////////////////////////////////////////////////////////////////////////////////////

function MyLabel(opt_options) {
    "use strict";
    // Initialization
    this.setValues(opt_options);
    // Label specific
    var span = this.span_ = document.createElement('span');
    span.style.cssText = 'position: relative; left: -50%; top: 8px; ' +
            'white-space: nowrap;  ' +
            'padding: 2px; background-color: white;opacity:0.7';


    var div = this.div_ = document.createElement('div');
    div.appendChild(span);
    div.style.cssText = 'position: absolute; display: none';
}
;
MyLabel.prototype = new google.maps.OverlayView;


// Implement onAdd
MyLabel.prototype.onAdd = function () {
    var pane = this.getPanes().overlayImage;
    pane.appendChild(this.div_);

    // Ensures the label is redrawn if the text or position is changed.
    var me = this;
    this.listeners_ = [
        google.maps.event.addListener(this, 'position_changed', function () {
            me.draw();
        }),
        google.maps.event.addListener(this, 'visible_changed', function () {
            me.draw();
        }),
        google.maps.event.addListener(this, 'clickable_changed', function () {
            me.draw();
        }),
        google.maps.event.addListener(this, 'text_changed', function () {
            me.draw();
        }),
        google.maps.event.addListener(this, 'zindex_changed', function () {
            me.draw();
        }),
        google.maps.event.addDomListener(this.div_, 'click', function () {
            if (me.get('clickable')) {
                google.maps.event.trigger(me, 'click');
            }
        })
    ];
};


// Implement onRemove
MyLabel.prototype.onRemove = function () {
    this.div_.parentNode.removeChild(this.div_);
    // Label is removed from the map, stop updating its position/text.
    for (var i = 0, I = this.listeners_.length; i < I; ++i) {
        google.maps.event.removeListener(this.listeners_[i]);
    }
};


// Implement draw
MyLabel.prototype.draw = function () {
    var projection = this.getProjection();
    var position = projection.fromLatLngToDivPixel(this.get('position'));
    var div = this.div_;
    div.style.left = position.x + 'px';
    div.style.top = position.y + 'px';


    var visible = this.get('visible');
    div.style.display = visible ? 'block' : 'none';


    var clickable = this.get('clickable');
    this.span_.style.cursor = clickable ? 'pointer' : '';


    var zIndex = this.get('zIndex');
    div.style.zIndex = zIndex;


    this.span_.innerHTML = this.get('text').toString();
};


function refresh_marker(map, new_markers) {
    "use strict";
    for (var i = 0; i < gmarkers.length; i++) {
        gmarkers[i].setMap(null);
    }
    gmarkers = [];
    
    if( typeof (mcluster)!=='undefined'){
       mcluster.clearMarkers();  
    }
   
    bounds_list = new google.maps.LatLngBounds();
    setGmapMarkers(map, new_markers);

    if (!bounds_list.isEmpty()) {
        if( typeof (map)!=='undefined'){
            map.fitBounds(bounds_list);
        }
    }

}

function return_marker(new_markers) {
    "use strict";
    branch_marker = new_markers;
}


String.prototype.capitalize = function () {
    return this.replace(/(?:^|\s)\S/g, function (a) {
        return a.toUpperCase();
    });
};