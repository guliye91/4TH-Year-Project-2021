$(document).ready(function(){
 
 load_data();


 function load_data(query)
 {
  $.ajax({
   url:"../functions/filterStock.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#stockItems').html(data);
   }
  });
 }

 $('#filterStock').keydown(function(){
  var search = $(this).val();
  if(search !== '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });

});