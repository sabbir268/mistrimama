<?php $__env->startSection('content'); ?>
<section class="big-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>FAQ</h2>
            </div>
        </div>
    </div>
</section>
<!-- /.big-title -->


<div class="container">
    <div class="row ">
        <div class="col-xs-12">
            <p><i class="fa fa-pencil"></i>&nbsp;&nbsp; Having questions that not on the list? <a href="contact.html">Send us a message!</a></p>

            <!-- Accordion -->
            <div class="panel-group accordion-rn" id="accordion-faq" role="tablist" aria-multiselectable="true">

                                    <h3 >User FAQ's</h3>
                
                <?php foreach($models as $model){ 
                    if($model->type !=1){
                        continue;
                    }
                    ?>
                
                
                <div class="panel">
                    <div class="panel-heading" role="tab" id="faq-headingSix<?php echo e($model->id); ?>">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion-faq" href="#collapseSix<?php echo e($model->id); ?>" aria-expanded="true" aria-controls="collapseSix">
                                <?php echo e($model->question); ?>

                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix<?php echo e($model->id); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faq-headingSix">
                        <div class="panel-body">
                        <?php echo e($model->answer); ?>

                        
                        </div>
                    </div>
                </div>
                <?php } ?>
                
 
  

               
                
                
                
                
                
                
                
                <h3 >ESP FAQ's</h3>

                 <?php foreach($models as $model){ 
                    if($model->type !=2){
                        continue;
                    }
                    ?>
                
                
                <div class="panel">
                    <div class="panel-heading" role="tab" id="faq-headingSix">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion-faq" href="#collapseSix<?php echo e($model->id); ?>" aria-expanded="true" aria-controls="collapseSix">
                                <?php echo e($model->question); ?>

                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix<?php echo e($model->id); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faq-headingSix">
                        <div class="panel-body">
                        <?php echo e($model->answer); ?>

                        
                        </div>
                    </div>
                </div>
                <?php } ?>


                                  <h3 >Referral FAQ's</h3>
                
              <?php foreach($models as $model){ 
                    if($model->type !=3){
                        continue;
                    }
                    ?>
                
                
                <div class="panel">
                    <div class="panel-heading" role="tab" id="faq-headingSix">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion-faq" href="#collapseSix<?php echo e($model->id); ?>" aria-expanded="true" aria-controls="collapseSix">
                                <?php echo e($model->question); ?>

                            </a>
                        </h4>
                    </div>
                    <div id="collapseSix<?php echo e($model->id); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faq-headingSix">
                        <div class="panel-body">
                        <?php echo e($model->answer); ?>

                        
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <!-- /#accordion-faq -->
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>