<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
        crossorigin="anonymous"></script>
<script src="<?php echo e(asset('/js/login-register.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/mistri/components/owl.carousel/owl.carousel.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/components/parallax.js/parallax.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/components/scrollup/jquery.scrollUp.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/components/lightgallery/js/lightgallery.js')); ?>"></script>

<!-- Mobile Menu -->
<script src="<?php echo e(asset('assets/mistri/components/mmenu/jquery.mmenu.min.all.js')); ?>"></script>

<!-- REVOLUTION JS FILES -->
<script src="<?php echo e(asset('assets/mistri/components/slider/jquery.themepunch.tools.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/components/slider/jquery.themepunch.revolution.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/components/isotope.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/components/jquery.directional-hover.min.js')); ?>"></script>

<!-- Image loaded ISOTOPE -->
<script src="<?php echo e(asset('assets/mistri/components/imagesloaded.pkgd.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/mistri/js/main.js')); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal("show");
        $("#next").click(function(event){
            event.preventDefault();
            $('#first').addClass('hidden');
            $('#second').removeClass('hidden');
        });
        $("#back").click(function(event){
            event.preventDefault();
            $('#first').removeClass('hidden');
            $('#second').addClass('hidden');
        });
    });
</script>








<script src="<?php echo e(asset('assets/mistri/jquery.rwdImageMaps.min.js')); ?>"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js"></script>
<script src="<?php echo e(asset('assets/mistri/smooth-scroll.polyfills.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/newfront/js/jquery.sticky.js')); ?>"></script>

<script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("dis");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<script>
    console.log("hello");

    var xmap='';
    $(document).ready(function(e) {
        $('img[usemap]').rwdImageMaps();
        $('.map').maphilight({
            fillColor: 'FBD132',
            fillOpacity:0.4,
            stroke:false,
            neverOn:true
        });

        $('area').click(function(){
            // Reset all areas with class 'selected'
            $('.punto').data('maphilight', {alwaysOn: false}).trigger('alwaysOn.maphilight');
            // Remove class selected
            $('area').removeClass('punto');
            // select and highlight this area
            $(this).addClass('punto');
            $(this).data('maphilight', {alwaysOn: true}).trigger('alwaysOn.maphilight');
        });



    });

    var allStates = $("svg.us > path");
    var allStates2 = $("text");

    allStates.on("click", function() {

        allStates.css('fill','transparent');
        $('text').css('stroke','#febf13');

        $(this).css('fill','#febf13');
        $('#T'+this.id).css('stroke','black');
        map=$('#T'+this.id).text();
        $('#sa').val(this.id);


    });

    allStates2.on("click", function() {
        var id=this.id.substring(1);
        allStates.css('fill','transparent');
        $('text').css('stroke','#febf13');

        $('#'+id).css('fill','#febf13');
        $(this).css('stroke','black');
        map=$(this).text();
        $('#sa').val(id);



    });

    function combomap(id){
        if(id!=='0'){
            allStates.css('fill','transparent');
            $('text').css('stroke','#febf13');

            $('#'+id).css('fill','#febf13');
            $('#T'+id).css('stroke','black');
            map=$('#T'+id).text();


        }
    }

    function comboservice(val){
        if(val!='0'){
            var t=$('#ss option[value='+val+']').text();
            var b=parseInt(val)+6;
            setservice(t,val,b);

        }
    }

    var scroll = new SmoothScroll('a[href*="#"]', {

        // Selectors
        ignore: '[data-scroll-ignore]', // Selector for links to ignore (must be a valid CSS selector)
        header: null, // Selector for fixed headers (must be a valid CSS selector)
        topOnEmptyHash: true, // Scroll to the top of the page for links with href="#"

        // Speed & Easing
        speed: 1800, // Integer. How fast to complete the scroll in milliseconds


    });

    var imgflag=1;
    var n=3;

    setInterval(function(){
        if(imgflag>=n){
            imgflag=1;
        }

        $('#fslider').css('background','url(assets/tempslider/slide'+imgflag+'.jpg)');
        $('#fslider').fadeIn('slow');
        imgflag++;

    }, 9000);




    var map="";
    var service="";






    var ximg='';



    function setservice(x,a,b){


        if(ximg!=''){
            // $('#img'+ximg).attr('src','assets/tempslider/slide'+ximg+'.jpg');
        }
        service=x;

        // $('#img'+a).attr('src','assets/tempslider/slide'+b+'.jpg');

        ximg=a;
        $('#ss').val(a);

    }
</script>
<script type="text/javascript" src="<?php echo e(asset('assets/mistri/assets/js/modal.js')); ?>"></script>



<script src="<?php echo e(asset('assets/mistri/jquery-confirm.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/funcybox/jquery.fancybox.min.js')); ?>"></script>

<script>
    $(document).ready(function () {
        $('.preview2').on("click", function (e) {
            e.preventDefault();
            callBookingForm();
        }); // on
    }); // ready



    function callBookingForm(){
        $.fancybox.open({
            //maxWidth  : '',
            /*fitToView : true,*/
            // width     : '100%',
            /*height    : '400',
            autoSize  : false,*/
            type        : "ajax",
            src         : "<?php echo e(route('service-booking-popup')); ?>",
            ajax: {
                settings: { data : $('#booking-popup-form').serialize(), type : 'GET' }
            }
        });
    }
</script>



