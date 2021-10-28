$(document).ready(function(){
 
 load_data();
 load_data1();

 function load_data(query)
 {
  $.ajax({
   url:"../functions/searchIp.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#accessLogs').html(data);
   }
  });
 }
 function load_data1(query1)
 {
  $.ajax({
   url:"../functions/searchIp1.php",
   method:"POST",
   data:{query1:query1},
   success:function(data)
   {
    $('#accessLogs1').html(data);
   }
  });
 }
 $('#searchIp').keydown(function(){
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
 $('#searchIp1').keydown(function(){
  var search1 = $(this).val();
  if(search1 !== '')
  {
   load_data1(search1);
  }
  else
  {
   load_data1();
  }
 });

});