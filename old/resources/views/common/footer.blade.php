
<!--Free Trial open-->
<section class="freeTrialWrap">
    <div class="container">
        <div class="freeTrialArea flex middle">
            @guest 
             <?php if(!menuActiveClass(['pre-register','signup'],true)){ ?>
                <div class="leftTrial"><h3>signup for you <strong>FREE</strong> 3 Month TRIAL NOW!</h3></div>
                <div class="rightTrialBtn"><a href="{{ route('provider-signup') }}" class="startBtn">Start Free Trial</a></div>
            <?php } ?>
            @else
            <div class="make_it_center"><h3>{{ getConfigValue('footer_text_signup') }}</h3></div>
            @endguest
        </div>
    </div>
</section>

<!--Free Trial close-->
<!--footer open-->
<footer class="footerWrap">
    <div class="container clear">
        <div class="topFooter">
            <ul>
                
                <?php if(!in_array(getConfigValue('linkedin_link'),['',"#"])){ ?>
                    <li><a href="<?= getConfigValue('linkedin_link'); ?>" class="fa fa-linkedin" target="_blank"></a></li>
                <?php } ?>
                    <?php if(!in_array(getConfigValue('instagram_link'),['',"#"])){ ?>
                    <li><a href="<?= getConfigValue('instagram_link'); ?>" class="fa fa-instagram" target="_blank"></a></li>
                <?php } ?>
                <?php if(!in_array(getConfigValue('fb_link'),['',"#"])){ ?>
                    <li><a href="<?= getConfigValue('fb_link'); ?>" class="fa fa-facebook" target="_blank"></a></li>
                <?php } ?>
                <?php if(!in_array(getConfigValue('gplus_link'),['',"#"])){ ?>
                    <li><a href="<?= getConfigValue('gplus_link'); ?>" class="fa fa-google-plus" target="_blank"></a></li>
                <?php } ?>
                <?php if(!in_array(getConfigValue('twitter_link'),['',"#"])){ ?>
                    <li><a href="<?= getConfigValue('twitter_link'); ?>" class="fa fa-twitter" target="_blank"></a></li>
                <?php } ?>
                <?php if(!in_array(getConfigValue('youtube_link'),['',"#"])){ ?>
                    <li><a href="<?= getConfigValue('youtube_link'); ?>" class="fa fa-youtube" target="_blank"></a></li>
                <?php } ?>
            </ul>
        </div>

        <div class="bottomFooter">
            <div class="flex row">
                <div class="col footerBox info">
                    <div class="footerLogo">
                        <?php $logo = getConfigValue('footer_logo', true); ?>
                        <a href="{{ route('home') }}">
                            <img src="<?= $logo->value ?>" alt="<?= $logo->alt_text ?>">
                        </a>
                    </div>
                    <p><?= getConfigValue('footer_text'); ?></p>

                </div>
                <div class="col footerBox service">
                    <h2>Important Links</h2>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fa fa-angle-right"></i>Home</a></li>
                        <li><a href="{{ route('blogs') }}"><i class="fa fa-angle-right"></i>Blogs</a></li>
                        <li><a href="{{ route('howitworks') }}"><i class="fa fa-angle-right"></i>How it works</a></li>
                        <li><a href="{{ route('provider-signup') }}"><i class="fa fa-angle-right"></i>Start free trial</a></li>
                        <li><a href="{{ route('about-us') }}"><i class="fa fa-angle-right"></i>About us</a></li>
                        <li><a href="{{ route('contact-us') }}"><i class="fa fa-angle-right"></i>Contact us</a></li>
                       
                        <li><a href="{{ route('privacy-policy') }}"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
                        <li><a href="{{ route('termsConditions') }}"><i class="fa fa-angle-right"></i>Terms  & Conditions</a></li>
                        <li><a href="{{ route('faq') }}"><i class="fa fa-angle-right"></i>FAQ's</a></li>
                        
                        
                        <li></li>
                    </ul>
                </div>
                <div class="col footerBox office">
                    <h2>Contact us</h2>
                    <ul>
                        <li><i class="fa fa-phone"></i><a href="tel:<?= getConfigValue('contact_phone'); ?>"><?= getConfigValue('contact_phone'); ?></a></li>
                        <li><i class="fa fa-clock-o"></i><?= getConfigValue('working_hours'); ?></li>
<!--                        <li><i class="fa fa-envelope-o"></i><a href="mailto:<?= getConfigValue('contact_email'); ?>"> <?= getConfigValue('contact_email'); ?></a></li>-->

                    </ul>
                </div>
            </div>	
        </div>

    </div>
</footer>

<div class="copyRight">
    <div class="container">
        <p>&copy; Redflagdata copyright {{ date("Y", strtotime('now')) }}</p>

    </div>
</div>
<!--footer close-->