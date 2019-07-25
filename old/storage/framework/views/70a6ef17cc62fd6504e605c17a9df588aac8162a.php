<script type="text/javascript">
	$('#starter').click(function(){
		val = $(this).attr('data-value');
		$('#commision').val(val);
	});

	$('#expert').click(function(){

		val = $(this).attr('data-value');
		$('#commision').val(val);
	});


	$('#professional').click(function(){
		val = $(this).attr('data-value');
		$('#commision').val(val);

	});

function checkbox(t)
{
		val = $(t).attr('id');
		check = $(t).prop('checked');		
		v = val.split('service');
		if(check==true)
		{
			$('#tr'+v[1]+' .service_price').each(function(){
			$(this).prop('disabled',false);
			});
		}else
		{
			$('#tr'+v[1]+' .service_price').each(function(){
	$(this).prop('disabled',true);

	});
		}

}
function getServicevalue(t)
{
	x = $(t).attr('data-index');
	val = $(t).val();	
	com = $('#commision').val();
	//per = 4000*15/100
	per = val*com;
	per = per/100;

	rem = val*(100-com);
	rem = rem/100;

$('#tr'+x+' .sp').val(rem);
$('#tr'+x+' .commission').val(per);

}

function clear_input(t)
{
	i = $(t).attr('data-btn');
$('#tr'+i+' input').each(function(){
	$(this).val('');
});

}



$(".phone_prefix").keydown(function(e) {
    var oldvalue=$(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('+88') !== 0) {
            $(field).val(oldvalue);
        } 
    }, 1);
});

$('#add-comrade').click(function(){
	count = $('#count_captain').val();
	if(count==0)
	{
		count = Number(count)+1;
		$('#count_captain').val(count);
	}
	else
	{
		count = Number(count)+1;
		$('#count_captain').val(count);
	                 $.ajax({
                     type: "GET",
                     url: '<?php echo e(url('add_another_captain')); ?>',
                     data:{id:count},
                     success:function(data){
						$('#comrade-info-add').append(data);
                     }
                 });		
	}

});
</script>