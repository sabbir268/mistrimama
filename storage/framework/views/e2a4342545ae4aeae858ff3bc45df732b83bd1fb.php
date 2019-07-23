<footer class="footer"  style='padding:5px 0 5px 0 !important;margin:5px 0 5px 0 !important;'>
    <div class="container">
        <div class="row"  style="margin-top:0px; padding-top:25px;">
            <div class="col-md-4 footer-style-center">
                <div class="footer-about">
                    
                    <div class="footer-info">
                        <h3 class="widget-tittle">Mistri Mama Office</h3>
                        <ul>
                            <li><i style='color:#FBD232;' class="fa fa-map-marker"></i><span> Skyview Ocean Tower (1st floor) 
</span> <div style='margin-left:38px;'> 38 Segunbagicha, Dhaka, Bangladesh </div></li>
                            <li><i style='color:#FBD232;' class="fa fa-phone"></i><?php echo e(getConfigValue('contact_phone')); ?></li>
                            <li><i style='color:#FBD232;' class="fa fa-envelope"></i><?php echo e(getConfigValue('contact_email')); ?></li>
                            <li><i style='color:#FBD232;' class="fa fa-clock-o"></i><?php echo e(getConfigValue('working_hour')); ?></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-md-3 pdlr0 footer-style-center">
                <div >
                    <h3 class="widget-tittle footer-title">Services</h3>
                    <ul class="menu-infomation">
                        <li><a href="<?php echo e(url('/electrical')); ?>" >
                            <i class="fa fa-arrow-right"></i>Electrical</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/plumbing')); ?>">
                                <i class="fa fa-arrow-right"></i>Plumbing&nbsp;Services &nbsp; &nbsp;
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/air-conditional')); ?>" class="ng-binding"><i class="fa fa-arrow-right"></i>AC Services</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/generator')); ?>" >
                                <i class="fa fa-arrow-right"></i>Generator Services
                            </a>
                        </li>
                      
                        <li>
                            <a href="<?php echo e(url('/ict')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>IT Services
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/cctv')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>CCTV Services
                            </a>
                        </li>

                        
                        
                    </ul>
                </div>
            </div>
            <div class="col-md-3 pdlr0 footer-style-center">
                <div class="">
                    <h3 class="widget-tittle footer-title">Company</h3>
                    <ul class="menu-infomation">
                        <li>
                            <a href="<?php echo e(url('/about')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>About Us
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/career')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>Career
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/community-guidelines')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>Community Guidelines</a>
                        </li>
                        <li><a href="<?php echo e(url('/terms')); ?>"  class="ng-binding">
                            <i class="fa fa-arrow-right"></i>Terms Conditions</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/privacy')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>Privacy Policy</a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/contact')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 pdlr0 footer-style-center">
                <div >
                    <h3 class="widget-tittle footer-title">Discover</h3>
                    <ul class="menu-infomation">
                        <li>
                            <a href="<?php echo e(url('/how-it-works')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>How it Works
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(asset('/blog')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>Blog and News
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/earn-money')); ?>" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>Earn Money
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/faq')); ?>" target="_blank" class="ng-binding">
                                <i class="fa fa-arrow-right"></i>FAQ
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-md-2">
                <div class="footer-about barcode_link">
                    <p><a href="#"><img src="<?php echo e(getConfigValue('barcode_link')); ?>" class="mobresp" alt="Google play"></a></p>

                </div>
            </div> -->
        </div>
    </div>
    <br>    
    <br>
    <div class="social-menu social-menu_right-arrow" style="margin-top: -25px; ">
        <ul class="menu">
            
             <li class="menu-item"><a href="<?php echo e(getConfigValue('youtube_link')); ?>">youtube</a></li>
             <li class="menu-item"><a href="<?php echo e(getConfigValue('twitter_link')); ?>" target="_blank"  >twitter</a></li>
               <li class="menu-item"><a href="<?php echo e(getConfigValue('instagram_link')); ?>">instagram</a></li>
             <li class="menu-item"><a href="<?php echo e(getConfigValue('linkedin_link')); ?>">linkedin</a></li>
            <li class="menu-item"><a href="<?php echo e(getConfigValue('fb_link')); ?>">facebook</a></li>
        </ul>
    </div>
</footer>



<div class="copyright" style="margin-top:-5px; margin-bottom:-40px; ">
    <div class="container" >
        <p  class="shohokari_company_details"><?php echo date('Y'); ?> © All rights are reserved by mistrimama.com</p>
    </div>
</div>