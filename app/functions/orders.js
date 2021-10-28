$(document).ready(function(){

  $('#ordersForm').submit(function(e){
    e.preventDefault();
    
    var ourData = $(this).serializeArray();
    var TargetUrl = "../functions/orders.php";
          
    $('#loadero').html('<div class="loader"></div>'); 
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          $('#loadero').html('');
          console.log(data);
            //$("form").trigger("reset");
            var x = document.getElementById('successOrder');
            x.scrollIntoView();
            $('#successOrder').html(data);
                setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
        }
      });
    
  });
});