   $('#resetPasswordform').hide();
   function forgotPassword(){
    $('#forgotPassword').click(function(){
        //alert('clicked');
        window.location.href = '../reset/';
    });
   }
   function findUser(){
    $('#userForm').submit(function(e){
        e.preventDefault();
                var newData = $(this).serializeArray();
                var newurl = '../functions/resetPassword.php';
                var newmethod = 'POST';
                 var loader = `
                 <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
                   <defs>
                     <filter id="gooey">
                       <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur"></feGaussianBlur>
                       <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
                       <feBlend in="SourceGraphic" in2="goo"></feBlend>
                     </filter>
                   </defs>
                 </svg>
                    <div class="blob blob-0"></div>
                    <div class="blob blob-1"></div>
                    <div class="blob blob-2"></div>
                    <div class="blob blob-3"></div>
                    <div class="blob blob-4"></div>
                    <div class="blob blob-5"></div>
       `;
                $('#loader').html(loader);
                $.ajax({
                data: newData,
                method: newmethod,
                url: newurl,
                success: function(data){
                    $('#loader').html('');
                    if(data == 'unavailable')
                    {
                        $('#error').html('User not found!');
                        $('#success').html('');
                    }
                    else
                    {
                        $('#success').html('An email has been sent to your registered email with details to reset your password');
                        $('#error').html('');
                    }
                }
            });
    });
   }
   function resetPasswordform()
   {
        $('#userForm').hide();
        $('#resetPasswordform').show();
        $('#resetPasswordform').submit(function(e){
        e.preventDefault();
        
        
            var password = $('#password').val();
            var cpassword = $('#confirm-password').val();
            if(password != cpassword)
            {
                $('#error1').html('Your passwords do not match');
            }
            else
            {
                var newData = $(this).serializeArray();
                var newurl = '../functions/resetPassword.php';
                var newmethod = 'POST';
                $('#loader1').html('<div class="loader"></div>');
                $.ajax({
                data: newData,
                method: newmethod,
                url: newurl,
                success: function(data){
                    $('#loader1').html('');
                    if(data == 'success')
                    {
                        $('#success1').html('Password Reset Successfully');
                    }
                }
            });
            }
    });
   }