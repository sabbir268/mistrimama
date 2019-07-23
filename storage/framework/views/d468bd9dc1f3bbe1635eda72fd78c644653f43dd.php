<?php

use Illuminate\Support\Facades\Route;

if (!isset($breadcrumbs)) {
    $breadcrumbs = array();
    $currentPath = Request::route()->getName();
    $currentPathAry = explode(".", $currentPath);
    if (count($currentPathAry) > 1) {
        $controller = $currentPathAry[0];
        $breadcrumbs[ucfirst($controller)] = route($controller . ".index");
        if (end($currentPathAry) == "index") {
            $breadcrumbs["Manage"] = "";
        }
        if (end($currentPathAry) == "create") {
            $breadcrumbs["Create"] = "";
        }
        if (end($currentPathAry) == "edit") {
            $breadcrumbs["Edit"] = "";
        }
        if (end($currentPathAry) == "show") {
            $breadcrumbs["View"] = "";
        }
    }
    if (!count($breadcrumbs)) {
        $breadcrumbs = null;
    }
}
?>



<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?php echo e(route('admin.dashboard')); ?>">Home</a>
            <i class="fa fa-circle"></i>
        </li>

        <?php if (isset($breadcrumbs)) { ?>
            <?php
            end($breadcrumbs);
            $endValue = key($breadcrumbs);
            foreach ($breadcrumbs as $key => $val) {
                ?>

                <?php if ($endValue == $key) { ?>
                    <li><a ><?php echo e($key); ?></a></li>
                <?php } else { ?>
                    <li>
                        <a href="<?php echo e($val); ?>"><?php echo e(ucwords(str_replace('-',' ',$key))); ?></a>
                        <i class="fa fa-circle"></i>
                    </li>
                <?php } ?>


            <?php } ?>
        <?php } ?>
    </ul>

</div>









