$(document).ready(function(){
    /*
     *1second               = 1000 milliseconds
     *60 seconds(1 min)     = 60000 milliseconds
     *300 seconds(5 min)    =300000 milliseconds
     */
    var idleTime=0;
    var timeout;
    timeout = 300000; //5 minutes Timeout
    
    //converting milliseconds to minutes
    var min = timeout / 1000 / 60;
    min = Math.floor(min) + " minutes";
    
    //To be used during demonstration
    var sec = timeout / 1000 ;
    sec = Math.floor(sec) + " seconds";
 
    
    var idleInterval = setInterval(timerIncrement, timeout);

    
    //Zero the idle timer on mouse movement
    $(this).mousemove(function(){
        idleTime = 0;
    });
    $(this).keypress(function(){
        idleTime = 0;
    });
    
      function timerIncrement(){
        idleTime = idleTime + 1;
        if(idleTime > 1){ //1 minute
            /*if the user tries to be smart and refresh the page...
            the session destroys
            working on it still  :-(
            */
            
            swal({   title: "Idle",   
            text: "You have been idle for more than "+min+". You will automatically be logged out",   
            type: "warning",     
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "OK",    
            closeOnConfirm: false } , 
            function(isConfirm){   
                if (isConfirm) 
                    {   
                     window.location.href="../functions/processLogout.php";
                    }
                    
            });

            
        }
    }

 
});
 
