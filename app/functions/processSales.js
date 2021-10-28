$(document).ready(function(){

    $('#owners2').hide();
    $('#amountP').mouseleave(function(){
        
        var amountC = $('#amountC').val();
        var amountP = $('#amountP').val();
        if(+amountP < +amountC && +amountP!=='')
        {
            $('#owners2').show();
        }
        else
        {
            $('#owners2').hide();
        }
    });
   $('#salesForm').submit(function(e){
    e.preventDefault();
        var ourUrl = '../functions/processSales.php';
        var ourMethod = 'POST';
        var ourData =   $(this).serializeArray();
        
        //show loader
        $('#loader').html('<div class="loader"></div>');
        $.ajax({
            url:ourUrl,
            method:ourMethod,
            data:ourData,
            success:function(data)
            {
                $('#loader').html('');
                $('#done2').html(data);
            }
        });
   });
});