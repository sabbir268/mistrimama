title= '<div style="height:60px;margin-left:10px;color:darkorange;background:url(assets/images/service/service'+ximg+'.png); background-repeat: no-repeat;"><center><h4>'+service+'[<strong style="color:#4caf50;">'+map+'</strong>]</h4></center></div>';
var p1='<div id="subcat" class="modal-body" style="height:400px;"><span>Total: </span><label id="total" style="color:maroon;">0</label><span> tk</span>';

var p21='<div class="list-group-item radio"><label>\
 <h4 class="list-group-item-heading" id="sebservice">Ceiling fan installation/সিলিং ফ্যান ফিট করানো\
 <button id="addbtn" onclick="subservice(this,1,150)" type="button" class="rounded-ghost-btn pull-right">Add</button></h4>\
 <p class="list-group-item-text desc "><span>Starting Price: <strong>৳ 150</strong></span><br>\
Get your car battery replaced by our service providers, either at your comfort of your home or at our service providers garage.\
<div style="display:none;" id="f1"><div class="col-md-1"><button style="background:#673ab7;color:white;" type="button" onclick="minus(1,150)">-</button></div> <div class="col-md-3"><input id="n1" type="number" min="1"  value="0"></div><div><button style="background:#673ab7;color:white;"  type="button" onclick="plus(1,150)">+</button></div></div></p>\
  </label></div>';
var p22='<div class="list-group-item radio"><label>\
 <h4 class="list-group-item-heading" id="sebservice">Ceiling fan installation/সিলিং ফ্যান ফিট করানো\
 <button id="addbtn" onclick="subservice(this,2,150)" type="button" class="rounded-ghost-btn pull-right">Add</button></h4>\
 <p class="list-group-item-text desc "><span>Starting Price: <strong>৳ 150</strong></span><br>\
Get your car battery replaced by our service providers, either at your comfort of your home or at our service providers garage.\
<div style="display:none;" id="f2"><div class="col-md-1"><button style="background:#673ab7;color:white;" type="button" onclick="minus(2,150)">-</button></div> <div class="col-md-3"><input id="n2" type="number" min="1"  value="0"></div><div><button style="background:#673ab7;color:white;"  type="button" onclick="plus(2,150)">+</button></div></div></p>\
  </label></div>';

var p23='<div class="list-group-item radio"><label>\
 <h4 class="list-group-item-heading" id="sebservice">Full Coil Repair/ কয়েল মেরামত\
 <button id="addbtn" onclick="subservice(this,3,450)" type="button" class="rounded-ghost-btn pull-right">Add</button></h4>\
 <p class="list-group-item-text desc "><span>Starting Price: <strong>৳ 450</strong></span><br>\
Get your car battery replaced by our service providers, either at your comfort of your home or at our service providers garage.\
<div style="display:none;" id="f3"><div class="col-md-1"><button style="background:#673ab7;color:white;" type="button" onclick="minus(3,450)">-</button></div> <div class="col-md-3"><input id="n3" type="number" min="1"  value="0"></div><div><button style="background:#673ab7;color:white;"  type="button" onclick="plus(3,450)">+</button></div></div></p>\
  </label></div>';

  var p24='<div class="list-group-item radio"><label>\
 <h4 class="list-group-item-heading" id="sebservice">Full Coil Repair/ কয়েল মেরামত\
 <button id="addbtn" onclick="subservice(this,4,450)" type="button" class="rounded-ghost-btn pull-right">Add</button></h4>\
 <p class="list-group-item-text desc "><span>Starting Price: <strong>৳ 450</strong></span><br>\
Get your car battery replaced by our service providers, either at your comfort of your home or at our service providers garage.\
<div style="display:none;" id="f4"><div class="col-md-1"><button style="background:#673ab7;color:white;" type="button" onclick="minus(4,450)">-</button></div> <div class="col-md-3"><input id="n4" type="number" min="1"  value="0"></div><div><button style="background:#673ab7;color:white;"  type="button" onclick="plus(4,450)">+</button></div></div></p>\
  </label></div>';


var p3='</div>\
          <div class="modal-footer2">\
          </div></div>';

var p4=' <div id="fuckerbtn" data-v-62435df4="" data-v-d240ddba="" class="counter"><button style="background:#673ab7;" data-v-62435df4="" type="button" class="counter-btn subtract-button">-</button> <input data-v-62435df4="" type="number" min="1" id="counter-input" value="1" class="counter-input"> <button style="background:#673ab7;" data-v-62435df4="" type="button" class="counter-btn add-button">+</button></div>';

var w1='<div id="provider" class="modal-body" style="height:400px;display:none;">'+
'<div class="list-group-item radio">'+
'<label>'+
                                    '<input type="radio" name="optradio">'+
                                    '<h4 style="color:gray" class="list-group-item-heading">PRP Electronic Service & Repair</h4>'+
                                     '<div class="list-grou-item-text">'+
                '<img src="g.png" width="50" height="80" alt="service provider logo" />'+
                                       '<span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>'+
                                        '<br>'+
                                          '<strong>   Orders complete: 4 </strong>'+
                                       '</span>'+
                                     '</div>'+
                                '</label>'+
                                '<b class="text-right" style="float:right;color:#ff9800;" >৳ 1200</b>'+
                            '</div>\
                            <div class="list-group-item radio">'+
'<label>'+
                                    '<input type="radio" name="optradio">'+
                                    '<h4 style="color:gray" class="list-group-item-heading">BD Disel</h4>'+
                                     '<div class="list-grou-item-text">'+
                '<img src="g2.png" width="50" height="80" alt="service provider logo" />'+
                                       '<span> <i class="fa fa-star"></i> <i class="fa fa-star"></i>'+
                                        '<br>'+
                                          '<strong>   Orders complete: 6 </strong>'+
                                       '</span>'+
                                     '</div>'+
                                '</label>'+
                                '<b class="text-right" style="float:right;color:#ff9800;" >৳ 1350</b>'+
                            '</div>';
var content=p1+p21+p23+p22+p24+p3+w1;

var total=0;
var f=0;
function booknow(){
    
        if(map=='' & service==''){
          $.confirm('Please Select Your Area & Our Service!');
        }
        else if(map==''){
          $.confirm('Please Select Your Area!');
        }
        else if(service==''){
          $.confirm('Please Select Our Service!');
        }
        else{
            /*var x='';
           $.get( "modal.html", function( data ) {
             alert( "Data Loaded: " + data );
             x=data;
});*/
            
            $.confirm({
                 boxWidth: '65%',
                  useBootstrap: false,
title:'<div  id="tab" class="modal-content">\
          <div class="modal-header">\
            <center><h4 id="t1">'+service+'</h4></center></div>\
            <center><h4 id="t2" style="display:none">Service Providers in <strong style="color:maroon;"> '+map+'</strong></h4></center></div>',
content: content,
    type: 'success',
    typeAnimated: true,
    buttons: {
        tryAgain: {
            text: 'Next',
            btnClass: 'btn-green',
            action: function(fg){
               
                if(fg==1){
                 $.alert('login page will be redirect');
                }
                else{
                 $('#subcat').fadeOut();
                 $('#t1').fadeOut();
                 $('#provider').css('display','block');
                 $('#t2').css('display','block');
                 $('@provider').fadeIn();
                 $('#t2').fadeIn();
                $('#provider').fadeIn();
                f=1;
            }
            }
        },
        close: function () {
        }
    }
});
        }
    }

$().mouseover(function(){
  $("#addbtn").css("background-color", "#FBD232");
});

function subservice(t,id,v){
   var x=$(t);
   if( x.text()=='Add'){
   x.text('Added');
   x.css('background','#2ecc71').css('color','white');
   $("#f"+id).css('display','block');
plus(id,v);
   
}
else{
    x.text('Add');
    x.css('background','transparent').css('color','#4a90e2');
    $("#f"+id).css('display','none');

    var n=$('#n'+id).val();
    n=parseInt(n);
    v=v*n;
    total=total-v;
    $('#n'+id).val('0');
    $('#total').html(total);


}
}

function plus(id,v){
    var n=$('#n'+id).val();
    n=parseInt(n);
    n++;
    $('#n'+id).val(n);
    total=total+v;
    $('#total').html(total);

    

}
function minus(id,v){
    var n=$('#n'+id).val();
    n=parseInt(n);
    if(n>1){
    total=total-v;
      $('#total').html(total);
     n--;
     var n=$('#n'+id).val(n);
    }
    

}