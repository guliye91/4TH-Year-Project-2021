$(document).ready(function(){
    $('#newpassForm').hide();
    $('#passForm').submit(function(e){
         e.preventDefault();
        var cp = $('#currentPassword').val();
        
        if(cp === '')
        {
            $('#pass_message').html('');
            $('#error_pass').html('Please enter current Password');
        }
        else
        {
            $('#error_pass').html('');
            var ourData = $(this).serializeArray();
            var targetUrl = '../functions/changePassword.php';
            $('#loader2').html('<div class="loader"></div>'); 
            $.ajax({
                url:targetUrl,
                data:ourData,
                method: "POST",
                success:function(data){
                    $('#loader2').html('');
                    if(data == 'correct'){
                        $('#passForm').hide();
                        $('#newpassForm').show();
                    }
                    console.log(data);
                    $('#pass_message').html(data);
                }
            });
        }
        
       
    });
    $('#newpassForm').submit(function(e){
        e.preventDefault();
        
        var newPassword = $('#newPassword').val();
        var confirmnewPassword = $('#confirmnewPassword').val();
        
        //fields must be filled in
        if(newPassword === '' || confirmnewPassword ===''){
            $('#newerror_pass').html('Please fill in all fields');
        }
        else if(newPassword.length < 6 || confirmnewPassword.length <6){
            $('#newerror_pass').html('Password should be more than 6 characters');
        }
        else if(newPassword != confirmnewPassword)
        {
            $('#newerror_pass').html('');
            $('#newerror_pass').html('Your passwords do not match');
        }
        else
        {
            $('#newerror_pass').html('');
            var newData = $(this).serializeArray();
            var newurl = '../functions/changePassword.php';
            var newmethod = 'POST';
            
            $('#loader3').html('<div class="loader"></div>'); 
            $.ajax({
                data: newData,
                method: newmethod,
                url: newurl,
                success: function(data){
                    $('#loader3').html('');
                    $("form").trigger("reset");
                    $('#newpass_message').html(data);
                       setTimeout(reloadPage,4000);
                function reloadPage()
                {
                    location.reload();
                }
                }
            });
        }
     
    });
    
    
});