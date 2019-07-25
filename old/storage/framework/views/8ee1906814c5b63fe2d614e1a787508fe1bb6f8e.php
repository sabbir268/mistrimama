<?php $__env->startSection('content'); ?>



<section class="big-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>BLOG</h2>
            </div>
        </div>
    </div>
</section>
<!-- /.big-title -->
<div class="container">
    <h2 class="d-xs-none" style="padding-left:20px;">Mediumish</h2>
    
    
    
    
<div class="showblogCategoryById">   

 <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
 
 
 
 
 <h2 class="d-xs-none" style="padding:20px 0px 20px 30px;"> <?php echo e($data->title); ?> </h2>
 <?php foreach($models as $model){ ?>
<?php if($model->category_id==$data->id): ?>
<div class="col-md-4 col-sm-12">
<div class="card"  style="border: 2px solid #eee;">
   <img class="card-img-top img-fluid" style="width: 100%; height:230px;" src="<?php echo e(url('images/blogs/thumbnail')); ?>/<?php echo e($model->image); ?>">
  <div class="card-body" style="padding:10px;">
    <h5 class="card-title" style="margin-top: 10px;font-weight: 700;text-align: justify;">
         <?php echo e($model->title); ?>

    </h5>
			<p class="card-text text-center" style="text-align:justify"><?php echo substr($model->content, 0,250); ?></p>
			 <a href="<?php echo e(url('showOneBlog/')); ?>/<?php echo e($model->id); ?>">Learn more ...</a>
	</div>
  </div>
</div>
<?php endif; ?>
<?php } ?>
<hr style="width: 100%; color: black; height: 1px;" />
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

<script type="text/javascript">
	$('.categoriesSelectbox').on('change',function(){
		var catId=$(this).val();
		urls="showBlogByCategories/"+catId;
		
        $.ajax({
       	 url:urls,
       	 type:'get',
       	 dataType:'html',
       	 success:function(response){
       	 	$(".showblogCategoryById").html(response);
       	 }
       });
       
		return false;
	});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>