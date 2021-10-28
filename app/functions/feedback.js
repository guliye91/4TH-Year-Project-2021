$(document).ready(function(){

  $('#contact-form').submit(function(e){
    e.preventDefault();
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/feedback.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          console.log(data);
            //$("form").trigger("reset");
            var x = document.getElementById('feedback');
            x.scrollIntoView();
            $('#feedback').html(data);
                setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
        }
      });
  });
});