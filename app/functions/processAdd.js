$(document).ready(function(){

  $('#adduserForm').submit(function(e){
    e.preventDefault();
    
    var username = $('#username').val();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();
 
    //check if one or more fields are empty
    if (username === '' || password === '' || cpassword === '' ) {
        $('#error_empty3').html('<h5 class="red-text"><i class="material-icons">warning</i>All fields should be correctly filled</h5>');
        $('#username').focus();
    }
    else 
    if (username.length < 3 ) {
      $('#error_empty3').html('');
        $('#error_empty3').html('<h5 class="red-text"><i class="material-icons">warning</i>Name should be 3 characters or more</h5>');
        $('#username').focus();
    }
    else
    if(password != cpassword)
    {
        $('#error_empty3').html('');
        $('#error_empty3').html('<h5 class="red-text"><i class="material-icons">warning</i>Your passwords do not match</h5>');
    }
    else
    {
      $('#error_empty3').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/processAdduser.php";
      
      $('#loader1').html('<div class="loader"></div>');    
       //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          $('#loader1').html('');
            //$("form").trigger("reset");
            var x = document.getElementById('success_message3');
            x.scrollIntoView();
           $('#success_message3').html(data);
                setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
           
        }
      }).fail(function(){Materialize.toast('Request Failed, Try again in a moment',4000)});;
    }
    
  });
});