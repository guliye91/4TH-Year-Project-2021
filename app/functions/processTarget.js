$(document).ready(function(){

  $('#dtargetForm').submit(function(e){
    e.preventDefault();
    
    var dtarget = $('#dtarget').val();
 
    //check if one or more fields are empty
    if (dtarget === '' ) {
        $('#error_empty').html('<h6 class="red-text center"><i class="material-icons">warning</i>Please set your daily target</h6>');
        $('#dtarget').focus();
    }
    else
    {
      $('#error_empty').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/processTarget.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
          console.log(data);
            //$("form").trigger("reset");
            $('#success_message').html(data);
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
  
  //for montly target
    $('#mtargetForm').submit(function(e){
    e.preventDefault();
    
    var mtarget = $('#mtarget').val();
    //check if one or more fields are empty
    if (mtarget === '' ) {
        $('#error_empty1').html('<h6 class="red-text center"><i class="material-icons">warning</i>Please set your Monthly target</h6>');
        $('#mtarget').focus();
    }
    else
    {
      $('#error_empty1').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/processTarget.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
            //$("form").trigger("reset");
            var x = document.getElementById('success_message1');
            x.scrollIntoView();
            $('#success_message1').html(data);
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
    
    //for yearly target
    $('#ytargetForm').submit(function(e){
    e.preventDefault();
    
    var mtarget = $('#ytarget').val();
    //check if one or more fields are empty
    if (mtarget === '' ) {
        $('#error_emptyy').html('<h6 class="red-text center"><i class="material-icons">warning</i>Please set your Yearly target</h6>');
        $('#ytarget').focus();
    }
    else
    {
      $('#error_emptyy').html('');
          var ourData = $(this).serializeArray();
          var TargetUrl = "../functions/processTarget.php";
      //make ajax request
      $.ajax({
        url:TargetUrl,
        method:"POST",
        data:ourData,
        success:function(data){
            //$("form").trigger("reset");
            var x = document.getElementById('success_messagey');
            x.scrollIntoView();
            $('#success_messagey').html(data);
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