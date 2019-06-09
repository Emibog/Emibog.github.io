$(document).ready(function(){
$(".dell").click(function() {
 var v = $(this).attr("id");
 $('input.for_id').val(v);
 });
});