$('#otpForm').hide();
$(document).ready(function(){
    {
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
      $('#loginForm').submit(function(e){
       e.preventDefault();        
        var ourData = $(this).serializeArray();
        var TargetUrl = "../functions/processLogin.php";
        
        
       // $('#load').html('<div class="progress"><div class="indeterminate"></div></div>');

       $('#load').html(loader);
        $.ajax({
            url:TargetUrl,
            data:ourData,
            method:"POST",
            success:function(data)
            {
            if (data =='success')
            {
             $('#feedback').html(data);
             //location.replace('../dashboard/');
             $('#loginForm').hide();
             $('#otpForm').show();

            }
            $('#load').html('');
            $('#feedback').html(data);
            $('#loginForm').trigger("reset");
            
            }
        });
    });
    
       $('#otpForm').submit(function(ee){
       ee.preventDefault();

        var ourData = $(this).serializeArray();
        var TargetUrl = "../functions/processLogin.php";
       // $('#otpload').html('<div class="progress"><div class="indeterminate"></div></div>');
        $('#otpload').html(loader);
        $.ajax({
            url:TargetUrl,
            data:ourData,
            method:"POST",
            success:function(data)
            {
                if (data =='successotp')
                    {
                     $('#otpfeedback').html('');
                     $('#otpsuccess').html('<strong><span class="text-success">SUCCESS: Logging in</strong></span>');
                     location.replace('../dashboard/');
        
        
                    }
                else
                {
                     $('#otpload').html('');
                     $('#otpfeedback').html('<strong><span class="text-danger">INVALID OTP</strong></span>');
                     $('#otpForm').trigger("reset"); 
                }
                
            
            }
        });
    });
    
    }
  
});