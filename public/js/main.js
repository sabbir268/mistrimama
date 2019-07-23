$(document).ready(function() {
  "use strict";

  /*--------------------------------------------*/
  /* ------------ Menu mobile: mmenu ---------- */
  /*--------------------------------------------*/
  $("#primary-menu-mobile").mmenu({
    // Options
    extensions	: [ 'effect-slide-menu', 'pageshadow' ],
    counters	: true,
    navbar 		: {
      title		: 'Menu'
    },
    navbars		: [
      {
        position	: 'top',
        content		: [
          '<a class="social-menu-mobile" href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>',
          '<a class="social-menu-mobile" href="https://www.plus.google.com/"><i class="fa fa-google-plus"></i></a>',
          '<a class="social-menu-mobile" href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>',
          '<a class="social-menu-mobile" href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>'
        ]
      }, {
        position	: 'top',
        content		: [
          'prev',
          'title',
          'close'
        ]
      }
    ]
  });
  var API = $("#primary-menu-mobile").data( "mmenu" );

  $("#menu-button").on('click', function() {
    API.open();
  });

  /*--------------------------------------------*/
  /* ----------------- Slider ----------------- */
  /*--------------------------------------------*/
  var revapi1;
  if($("#rev_slider_1_1").revolution == undefined){
    revslider_showDoubleJqueryError("#rev_slider_1_1");
  }else{
    revapi1 = $("#rev_slider_1_1").show().revolution({
      sliderType:"standard",
      jsFileLocation:"js/",
      sliderLayout:"auto",
      dottedOverlay:"none",
      delay:9000,
      navigation: {
        keyboardNavigation:"on",
        keyboard_direction: "horizontal",
        mouseScrollNavigation:"off",
        onHoverStop:"on",
        touch:{
          touchenabled:"on",
          swipe_threshold: 75,
          swipe_min_touches: 50,
          swipe_direction: "horizontal",
          drag_block_vertical: false
        }
        ,
        arrows: {
          style:"metis",
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          tmp:'',
          left: {
            h_align:"left",
            v_align:"center",
            h_offset:30,
            v_offset:0
          },
          right: {
            h_align:"right",
            v_align:"center",
            h_offset:30,
            v_offset:0
          }
        }
        ,
        bullets: {
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          style:"custom",
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          direction:"horizontal",
          h_align:"center",
          v_align:"bottom",
          h_offset:0,
          v_offset:30,
          space:5,
          tmp:''
        }
      },
      responsiveLevels:[1240,1024,778,480],
      gridwidth:[1920,1024,778,480],
      gridheight:[655,500,800,720],
      lazyType:"smart",
      parallax: {
        type:"mouse",
        origo:"enterpoint",
        speed:2000,
        levels:[2,3,4,5,6,7,12,16,10,50],
      },
      shadow:0,
      spinner:"spinner2",
      stopLoop:"off",
      stopAfterLoops:-1,
      stopAtSlide:-1,
      shuffle:"off",
      autoHeight:"off",
      hideThumbsOnMobile:"off",
      hideSliderAtLimit:0,
      hideCaptionAtLimit:0,
      hideAllCaptionAtLilmit:0,
      debugMode:false,
      fallbacks: {
        simplifyAll:"off",
        nextSlideOnWindowFocus:"off",
        disableFocusListener:false,
      }
    });
  }

  var revapi2;
  if($("#rev_slider_2_1").revolution == undefined){
    revslider_showDoubleJqueryError("#rev_slider_2_1");
  }else{
    revapi2 = $("#rev_slider_2_1").show().revolution({
      sliderType:"standard",
      jsFileLocation:"js/",
      sliderLayout:"auto",
      dottedOverlay:"none",
      delay:9000,
      navigation: {
        keyboardNavigation:"on",
        keyboard_direction: "horizontal",
        mouseScrollNavigation:"off",
        onHoverStop:"on",
        touch:{
          touchenabled:"on",
          swipe_threshold: 75,
          swipe_min_touches: 50,
          swipe_direction: "horizontal",
          drag_block_vertical: false
        }
        ,
        arrows: {
          style:"metis",
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          tmp:'',
          left: {
            h_align:"left",
            v_align:"center",
            h_offset:30,
            v_offset:0
          },
          right: {
            h_align:"right",
            v_align:"center",
            h_offset:30,
            v_offset:0
          }
        }
        ,
        bullets: {
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          style:"custom",
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          direction:"horizontal",
          h_align:"center",
          v_align:"bottom",
          h_offset:0,
          v_offset:30,
          space:5,
          tmp:''
        }
      },
      responsiveLevels:[1240,1024,778,480],
      gridwidth:[1920,1024,778,480],
      gridheight:[550,500,800,720],
      lazyType:"smart",
      parallax: {
        type:"mouse",
        origo:"enterpoint",
        speed:2000,
        levels:[2,3,4,5,6,7,12,16,10,50],
      },
      shadow:0,
      spinner:"spinner2",
      stopLoop:"off",
      stopAfterLoops:-1,
      stopAtSlide:-1,
      shuffle:"off",
      autoHeight:"off",
      hideThumbsOnMobile:"off",
      hideSliderAtLimit:0,
      hideCaptionAtLimit:0,
      hideAllCaptionAtLilmit:0,
      debugMode:false,
      fallbacks: {
        simplifyAll:"off",
        nextSlideOnWindowFocus:"off",
        disableFocusListener:false,
      }
    });
  }

  var revapi3;
  if($("#rev_slider_3_1").revolution == undefined){
    revslider_showDoubleJqueryError("#rev_slider_3_1");
  }else{
    revapi3 = $("#rev_slider_3_1").show().revolution({
      sliderType:"standard",
      jsFileLocation:"js/",
      sliderLayout:"auto",
      dottedOverlay:"none",
      delay:9000,
      navigation: {
        keyboardNavigation:"on",
        keyboard_direction: "horizontal",
        mouseScrollNavigation:"off",
        onHoverStop:"on",
        touch:{
          touchenabled:"on",
          swipe_threshold: 75,
          swipe_min_touches: 50,
          swipe_direction: "horizontal",
          drag_block_vertical: false
        }
        ,
        arrows: {
          style:"metis",
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          tmp:'',
          left: {
            h_align:"left",
            v_align:"center",
            h_offset:30,
            v_offset:0
          },
          right: {
            h_align:"right",
            v_align:"center",
            h_offset:30,
            v_offset:0
          }
        }
        ,
        bullets: {
          enable:true,
          hide_onmobile:true,
          hide_under:600,
          style:"custom",
          hide_onleave:true,
          hide_delay:200,
          hide_delay_mobile:1200,
          direction:"horizontal",
          h_align:"center",
          v_align:"bottom",
          h_offset:0,
          v_offset:30,
          space:5,
          tmp:''
        }
      },
      responsiveLevels:[1240,1024,778,480],
      gridwidth:[1920,1024,778,480],
      gridheight:[700,370,283,175],
      lazyType:"smart",
      parallax: {
        type:"mouse",
        origo:"enterpoint",
        speed:2000,
        levels:[2,3,4,5,6,7,12,16,10,50],
      },
      shadow:0,
      spinner:"spinner2",
      stopLoop:"off",
      stopAfterLoops:-1,
      stopAtSlide:-1,
      shuffle:"off",
      autoHeight:"off",
      hideThumbsOnMobile:"off",
      hideSliderAtLimit:0,
      hideCaptionAtLimit:0,
      hideAllCaptionAtLilmit:0,
      debugMode:false,
      fallbacks: {
        simplifyAll:"off",
        nextSlideOnWindowFocus:"off",
        disableFocusListener:false,
      }
    });
  }

  /*-----------------------------------------*/
  /* --------- Search box toggle ----------- */
  /*-----------------------------------------*/
  var submitIcon = $('.search-box-icon');
  var inputBox = $('.search-field');
  var searchBox = $('.search-form');
  var isOpen = false;
  submitIcon.on('click', function(){
    if(isOpen == false){
      searchBox.addClass('searchbox-open');
      inputBox.focus();
      isOpen = true;
    } else {
      searchBox.removeClass('searchbox-open');
      inputBox.focusout();
      isOpen = false;
    }
  });
  submitIcon.on('mouseup', function(){
    return false;
  });
  searchBox.on('mouseup', function(){
    return false;
  });
  $(document).on('mouseup', function(){
    if(isOpen == true){
      submitIcon
        .css('display','block')
        .click();
    }
  });

  /*--------------------------------------------*/
  /* ---------------- Mini Cart ----------------*/
  /*--------------------------------------------*/
  var cartIcon = $('.mini-cart__button');
  var cartBox = $('.mini-cart__content');
  var isOpen = false;
  cartIcon.on('click', function(){
    if(isOpen == false){
      cartBox.addClass('mini-cart__content-open');
      isOpen = true;
    } else {
      cartBox.removeClass('mini-cart__content-open');
      isOpen = false;
    }
  });
  cartIcon.on('mouseup', function(){
    return false;
  });
  cartBox.on('mouseup', function(){
    return false;
  });
  $(document).on('mouseup', function(){
    if(isOpen == true){
      cartIcon
        .css('display','block')
        .click();
    }
  });

  /*--------------------------------------------*/
  /* -------------- OwlCarousel2 -------------- */
  /*--------------------------------------------*/
  var owl = $(".testi-owl");

  owl.owlCarousel({
    //autoplay: 3000,
    items : 1,
    loop: true,
    margin: 20,
  });

  // #Portfolio
  var owl2 = $(".brand-owl");

  owl2.owlCarousel({
    loop: true,
    margin: 10,
    responsiveClass:true,
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 6,
      }
    }
  });

  /*--------------------------------------------*/
  /* --------------- Isotope ---------------- */
  /*--------------------------------------------*/
  // #Our work
  // Hover isotope
  $('.item-dir').directionalHover({
    overlay: "grid-overlay",
    easing: "swing",
    speed: 450
  });

  // init Isotope
  var $grid = $('.grid').isotope({
    itemSelector: '.element-item'
  });
  $grid.imagesLoaded().progress( function() {
    // filter functions
    $grid.isotope('layout');
    // bind filter button click
    $('.filters-button-group').on( 'click', 'button', function() {
      var $this = $(this);

      var filterValue = $this.attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      var $this = $(this);
      $buttonGroup.on( 'click', 'button', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $this.addClass('is-checked');
      });
    });

  });

  /*--------------------------------------------*/
  /* --------------- Scroll up ---------------- */
  /*--------------------------------------------*/
  $.scrollUp({
    scrollName: 'scrollUp', // Element ID
    topDistance: '300', // Distance from top before showing element (px)
    topSpeed: 300, // Speed back to top (ms)
    animation: 'fade', // Fade, slide, none
    animationInSpeed: 500, // Animation in speed (ms)
    animationOutSpeed: 500, // Animation out speed (ms)
    scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
    activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
  });

  /*--------------------------------------------*/
  /* ------------- LightGallery --------------- */
  /*--------------------------------------------*/
  $('.images-product').lightGallery({
    thumbnail:true
  });

  /*--------------------------------------------*/
  /* ------- Ship to different address--------- */
  /*--------------------------------------------*/
  $('.collapse').collapse();

  $('input#ship-different-checkbox').on('change', function(){
    var $this = $(this),
        $btn = $( $this.closest('.customCollapse').data('href') );

    if ($this.is(":checked") ) {
      $btn
        .addClass('in')
        .css('height', 'auto');
    } else {
      $btn
        .css('height', 'auto')
        .removeClass('in');
    }
  });

  /*--------------------------------------------*/
  /* ------------------- Map ------------------ */
  /*--------------------------------------------*/
  var gmMapDiv = $( "#map-canvas" );

  if ( gmMapDiv.length ) {

    var gmMarkerAddress = gmMapDiv.attr( "data-address" );
    var gmHeight = gmMapDiv.attr( "data-height" );
    var gmWidth = gmMapDiv.attr( "data-width" );
    var gmZoomEnable = gmMapDiv.attr( "data-zoom_enable" );
    var gmZoom = gmMapDiv.attr( "data-zoom" );

    gmMapDiv.gmap3( {
      action: "init",
      marker: {
        address: gmMarkerAddress,
        options: {
          icon: "images/map-marker.png",
        },
      },
      map: {
        options: {
          zoom: parseInt( gmZoom, 10 ),
          zoomControl: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          mapTypeControl: false,
          scaleControl: false,
          scrollwheel: gmZoomEnable == 'enable' ? true : false,
          streetViewControl: false,
          draggable: true,
          styles: [{"featureType":"all","elementType":"all","stylers":[{"saturation":-100},{"gamma":0.5}]}],
        }
      }
    } ).width( gmWidth ).height( gmHeight );
  }
});
