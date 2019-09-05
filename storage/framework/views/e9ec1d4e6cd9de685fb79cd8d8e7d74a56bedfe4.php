<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey <?php echo e(Request::route()->getName() == 'job-history-esp' ? 'bg-mm' : ''); ?>"><a
                href="<?php echo e(route('job-history-esp')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">পূর্বের কাজ</span></a></li>
        <li class="grey <?php echo e(Request::route()->getName() == 'esp.behalf.order' ? 'bg-mm' : ''); ?>"><a
                href="<?php echo e(route('esp.behalf.order')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">সার্ভিস অর্ডার</span></a></li>
        
        <li class="grey <?php echo e(Request::route()->getName() == 'offer' ? 'bg-mm' : ''); ?>">
            <a href="<?php echo e(route('offer')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">অফার দেখুন</span>
            </a>
        </li>

        

        <li class="grey <?php echo e(Request::route()->getName() == 'recharge' ? 'bg-mm' : ''); ?>"><a href="<?php echo e(route('recharge')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">রিচার্জ করুন</span></a></li>

        <li class="grey <?php echo e(Request::route()->getName() == 'esp-faq' ? 'bg-mm' : ''); ?>"><a href="<?php echo e(route('esp-faq')); ?>">
                <span class="glyphicon glyphicon-th"></span>

                <span class="lbl">জিজ্ঞাসা</span></a></li>

        <li class="grey with-sub <?php echo e(Request::route()->getName() == 'manual' ? 'bg-mm' : ''); ?> ">
                <span>
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="lbl">ব্যবহারবিধি</span>
                </span>

            <ul>
                <li><a href="<?php echo e(route('esp.manual-service-allocate')); ?>"><span class="lbl">নতুন কাজ পাওয়া এবং বন্টন করা</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-phone-dist')); ?>"><span class="lbl">ফোন থেকে মিস্ত্রি মামার কাজ বিতরণ</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-comrade-add-del')); ?>"><span class="lbl">সহকারী (কমরেড) যোগ বাতিল করা</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-comrade-login')); ?>"><span class="lbl">সহকারী (কমরেড) লগ ইন</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-comrade-work')); ?>"><span class="lbl">সহকারীর অর্ডার পাওয়া এবং কাজ শেষ করার নিয়ম</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-recharge')); ?>"><span class="lbl">সার্ভিস পার্টনার একাউন্ট রিচার্জ</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-cashout')); ?>"><span class="lbl">সার্ভিস পার্টনার ক্যাশ আউট করার নিয়ম</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-self-order')); ?>"><span class="lbl">সার্ভিস পার্টনার নিজের কাজ অর্ডার করার নিয়ম</span></a></li>
                <li><a href="<?php echo e(route('esp.manual-sp-login')); ?>"><span class="lbl">সার্ভিস পার্টনার লগ ইন</span></a></li>
            </ul>
        </li>

        <li class="grey "><a href="tel:+8809610222111">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">কাস্টমার কেয়ার </span></a></li>

    </ul>
</nav>
<!--.side-menu-->