$(document).ready(function(){

  $('#stockForm').submit(function(e){
    e.preventDefault();

      var ourData = $(this).serializeArray();
      var TargetUrl = "../functions/stock.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
            $("form").trigger("reset");
           $('#successStock').html(data);
            setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
            
        }
      });

    
  });
});