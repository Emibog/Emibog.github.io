$(document).ready(function(){

$(".dell").click(function(e) {
 var v = $(this).attr("id");
 $('input.for_id').val(v);
 });
 
});