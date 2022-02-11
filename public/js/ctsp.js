
function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
	var max = document.getElementById("sl").innerHTML;
  if (!isNaN(currentVal) && currentVal < max) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(max);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
  if (!isNaN(currentVal) && currentVal > 1) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(1);
  }

}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});
$('.alldathang').on('click', '.button-minus1', function(e) {
  decrementValue(e);
});
$('.alldathang').on('click', '.button-plus1', function(e) {
   e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
	var parent1 = $(this).parents('.alldathang');
var max = parent1.find('.sp-soluong').html();
  if (!isNaN(currentVal) && currentVal < max) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(max);
  }
});
$( ".quantity-field" ).keyup(function() {
var max = document.getElementById("sl").innerHTML;
var number = document.getElementById("number").value;
if(number > Number(max)){
	document.getElementById("number").value=Number(max);
	
}
});
$('.input-group').on('focusout', function () {
  $.ajax({
	url:'swdh',
	type:'GET',

}).done(function(response){

	$('.jax').html(response);

});
});
$( ".alldathang" ).on('keyup','.input-max',function(e) {
  e.preventDefault();
var parent = $(this).parents('.alldathang');
var max = parent.find('.sp-soluong').html();
 var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
var vlm = parent.find('.input-max').val();
if(vlm > Number(max)){
	parent.find('.input-max').val(max);
	
}
});

var gia = document.getElementById("giaban").innerHTML;
 var ngia   = Number(gia).toFixed(3).replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
var sbgia = ngia.substring(0,ngia.indexOf('.'));
	document.getElementById("giaban").innerHTML =sbgia+" VNĐ";

function addcart(id){
	$.ajax({
	url:'addcart/'+id,
	type:'GET',

}).done(function(response){

	alertify.success('Đã thêm vào giỏ hàng!');

})
.fail(function (jqXHR, exception) {
        // Our error logic here
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        }
        else if (jqXHR.status == 500) {
             window.location.href = 'https://localhost/ClientUs/public/login';
        } else if (exception === 'abort') {
            window.location.href = 'https://localhost/ClientUs/public/login';
        } 
    
    });
}
function showcart(){
$.ajax({
	url:'showcart',
	type:'GET',

}).done(function(response){

	$('.showgh').html(response);

});
}

function deletecart(id){

		$.ajax({
	url:'deletecart/'+id,
	type:'GET',

}).done(function(response){
	

});
	$.ajax({
	url:'showcart',
	type:'GET',

}).done(function(response){

	$('.showgh').html(response);
	alertify.success('Đã xóa!');

});
$.ajax({
	url:'showcart',
	type:'GET',

}).done(function(response){

	$('.showgh').html(response);
	

});

}

function multicart(id){
	var sl = document.getElementById("number");
	$.ajax({
	url:'multicart/'+id +'/multi/'+sl.value,
	type:'GET',

}).done(function(response){
	if(response.msg =='201'){
	alertify.success('Sản phẩm đã quá giới hạn!');
	}else{
	alertify.success('Đã thêm vào giỏ hàng!');
}
	

})
.fail(function (jqXHR, exception) {
        // Our error logic here
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        }
        else if (jqXHR.status == 500) {
             window.location.href = 'https://localhost/ClientUs/public/login';
        
        } else if (exception === 'abort') {
            window.location.href = 'https://localhost/ClientUs/public/login';
        } 
    
    });
}

function deletedh(id){

		$.ajax({
	url:'deletecart/'+id,
	type:'GET',

}).done(function(response){
	

});
	$.ajax({
	url:'swdh',
	type:'GET',

}).done(function(response){

	$('.jax').html(response);
	alertify.success('Đã xóa!');

});
$.ajax({
	url:'swdh',
	type:'GET',

}).done(function(response){

	$('.jax').html(response);
	

});

}
function change(id,value){
$.ajax({
	url:'multiajax/'+id +'/multi/'+value,
	type:'GET',

}).done(function(response){
});

}




