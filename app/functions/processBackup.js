$.ajaxSetup({
   cache:false
});

/*
 *1 second = 1000 milliseconds
 *1 minute = 60 seconds
 *1 hour = 3600 seconds
 *24 hours = 86400 seconds = 86400000 milliseconds
 *Backup up data every 24 hours (1 day);
 *
 **/
$(document).ready(function(){
   $('#backup_transactions').click(function(){
      $.get('../functions/processBackup.php');
         swal({   title: "BACKED  UP",   
            text: "Transactions backed up successfully!",   
            type: "success",     
            confirmButtonColor: "teal",   
            confirmButtonText: "OK",    
            closeOnConfirm: false } , 
            function(isConfirm){   
                if (isConfirm) 
                    {   
                    location.reload();
                    }     
            });
   });
});

/*

$.ajaxSetup({
   cache:false
});

/*
 *1 second = 1000 milliseconds
 *1 minute = 60 seconds
 *1 hour = 3600 seconds
 *24 hours = 86400 seconds = 86400000 milliseconds
 *Backup up data every 24 hours (1 day);
 *
 
$(document).ready(function(){
   $('#backup_transactions').click(function(){
      alert("hey man");
   });
   setInterval(function(){
      $.get('../functions/processBackup.php');
   }, 86400000);
});
 */