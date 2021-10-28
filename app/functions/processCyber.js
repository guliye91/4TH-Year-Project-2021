$(document).ready(function(){
    $('#owners').hide();
    $('#overallCharges').mouseleave(function(){
        
        var amountCharged1 = $('#amountCharged3').val();
        var overallCharges = $('#overallCharges').val();
        if(+overallCharges < +amountCharged1 && +overallCharges!=='')
        {
            $('#owners').show();
        }
        else
        {
            $('#owners').hide();
        }
    });

   $('#cyberForm').submit(function(e){
    e.preventDefault();
        var dateReceived2 = $('#dateReveived2').val();
        var cyber = $('#cyber').val();
        var amountCharged1 = $('#amountCharged3').val();
        var overallCharges = $('#overallCharges').val();


    
    if(dateReceived2 ==='' || cyber ==='' || amountCharged1==='' || overallCharges ==='')
    {
        $('#formErr1').html('Please fill in all details');
    }
    else
    {
        $('#formErr1').html('');
        var ourUrl = '../functions/processCyber.php';
        var ourMethod = 'POST';
        var ourData =   $(this).serializeArray();
        $.ajax({
            url:ourUrl,
            method:ourMethod,
            data:ourData,
            success:function(data)
            {
               var x = document.getElementById('done1');
               x.scrollIntoView();
                $('#done1').html(data);
                   setTimeout(reloadPage,3000);
                function reloadPage()
                {
                    location.reload();
                }
            }
        });
    }
   }); 
});