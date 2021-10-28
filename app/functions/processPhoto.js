$(document).ready(function(){
   $('#photographyForm').submit(function(e){
    e.preventDefault();
        $('#formErr').html('');
        var ourUrl = '../functions/processPhoto.php';
        var ourMethod = 'POST';
        var ourData =   $(this).serializeArray();
        $.ajax({
            url:ourUrl,
            method:ourMethod,
            data:ourData,
            success:function(data)
            {
               var x = document.getElementById('done');
               x.scrollIntoView();
                $('#done').html(data);
                 setTimeout(reloadPage,5000);
                function reloadPage()
                {
                    location.reload();
                }
            }
            
        });
   }); 
});