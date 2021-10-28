$(document).ready(function(){

  $('#liabilityForm').submit(function(e){
    e.preventDefault();
    
    var liabilities = $('#liabilities').val();

    //check if one or more fields are empty
    if (liabilities == '' ) {
        $('#error_empty4').html('<h6 class="red-text"><i class="material-icons">warning</i>Please enter cost</h6>');
        $('#liabilities').focus();
    }
    else
    {
      $('#error_empty4').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/processLiabilities.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
            //$("form").trigger("reset");
            var x = document.getElementById('success_message4');
            x.scrollIntoView();
            $('#success_message4').html(data);
                setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
            //$('#success_message').fadeOut(10000);
            
        }
      }).fail(function(){Materialize.toast('Request Failed, Try again in a moment',4000)});;
    }
    
  });
});