$(document).ready(function(){
   $.ajax({
        url:'../users.php',
        method: 'get',
        data: 'data',
        success:function(data){
            $('#users').html(data);
        }
   });
});