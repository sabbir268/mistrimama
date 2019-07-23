                       
                       <?php $number = count(Session::get('mycat'));?>
                                                    <?php if($number>0): ?>   
                                                   <?php for($i=0; $i<$number;$i++): ?>
                                       
                                                    <div class="col-xs-12" style="border-bottom:1px solid #CCCCCC">
                                                    <b class="pull-left">
                                                     <p style="font-size:15px;color: #CCCCCC">  <?php echo e(Session::get('mycatName')[$i]); ?></p>
                                                     <small>Price | <?php echo e(Session::get('mycat_min_price')[$i]); ?> - <?php echo e(Session::get('mycat_max_price')[$i]); ?></small>
                                                     </b> 
                                                        <b class="pull-right">
                                                      <button disabled="true" class="btn btn-danger btn-xs " >Quantity |   <?php echo e(Session::get('myqty')[$i]); ?></button>
                                                      <a href="<?php echo e(url('Booking/service-categeory-delete')); ?>/<?php echo e($i); ?>/<?php echo e($i); ?>" class="btn btn-danger btn-xs deleteBtn" >X</a>
                                                     </b>
                                                 </div>
                                                   <?php endfor; ?>
                                                  <?php endif; ?>


<script src="<?php echo e(asset('assets/newfront/js/vendor/jquery-1.12.4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/newfront/js/vendor/bootstrap.min.js')); ?>"></script>
<script type="text/javascript">
  $('.deleteBtn').on('click',function(){
     $.ajax({
      url:$(this).attr('href'),
      type:'get',
      dataType:'html',
      success:function(response){
              $('.show_more_services_category').html(response);
      }
     });

     return false;
  });
</script>
