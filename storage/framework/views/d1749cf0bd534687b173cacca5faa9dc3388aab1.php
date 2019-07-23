<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey <?php echo e(Request::route()->getName() == 'job-history-esp' ? 'bg-mm' : ''); ?>"><a href="<?php echo e(route('job-history-esp')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">পূর্বের কাজ</span></a></li>
        <li class="grey <?php echo e(Request::route()->getName() == 'esp.behalf.order' ? 'bg-mm' : ''); ?>"><a href="<?php echo e(route('esp.behalf.order')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">সার্ভিস অর্ডার</span></a></li>
        <li class="grey <?php echo e(Request::route()->getName() == 'esp.refer' ? 'bg-mm' : ''); ?>">
            <a href="<?php echo e(route('esp.refer')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">রেফার করুন</span>
            </a>
        </li>
        <li class="grey <?php echo e(Request::route()->getName() == 'offer' ? 'bg-mm' : ''); ?>">
            <a href="<?php echo e(route('offer')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">অফার দেখুন</span>
            </a>
        </li>
        
        <li class="grey <?php echo e(Request::route()->getName() == 'recharge' ? 'bg-mm' : ''); ?>"><a href="<?php echo e(route('recharge')); ?>">
            <span class="glyphicon glyphicon-th"></span>
            <span
                    class="lbl">রিচার্জ করুন</span></a></li>

        <li class="grey <?php echo e(Request::route()->getName() == 'esp-faq' ? 'bg-mm' : ''); ?>"><a href="<?php echo e(route('esp-faq')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                    
                    <span class="lbl">জিজ্ঞাসা</span></a></li>

        <li class="grey "><a href="tel:+8809610222111">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">কাস্টমার কেয়ার </span></a></li>

    </ul>
</nav>
<!--.side-menu-->