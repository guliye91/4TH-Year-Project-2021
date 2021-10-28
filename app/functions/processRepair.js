$(document).ready(function(){
    $('#repairForm').submit(function(e){
        e.preventDefault();
    
            var ourData = $(this).serializeArray();
            var ourUrl = '../functions/processRepair.php';
            
            $.ajax({
               data:ourData,
               url:ourUrl,
               method:'POST',
               success:function(data){
                var x = document.getElementById('success');
                x.scrollIntoView();
                $('#success').html(data);
                setTimeout(reloadPage,5000);
                function reloadPage()
                {
                    location.reload();
                }
               }
            });

    });

    
 

  
   

});