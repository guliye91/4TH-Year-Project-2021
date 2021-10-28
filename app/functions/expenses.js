$(document).ready(function(){

  $('#expenseForm').submit(function(e){
    e.preventDefault();
    
    var exName = $('#expenseName').val();
    var exAmount = $('#expenseAmount').val();

    //check if one or more fields are empty
    if (exName === '' && exAmount === '' ) {
        $('#errorex').html('<h6 class="red-text"><i class="material-icons">warning</i>All fields are required</h6>');
        $('#expenseName').focus();
    }
    else
    {
      $('#errorex').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/expenses.php";
          
          $('#loader4').html('<div class="loader"></div>'); 
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          $('#loader4').html('');
          console.log(data);
            //$("form").trigger("reset");
            var x = document.getElementById('successex');
            x.scrollIntoView();
            $('#successex').html(data);
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