    $('#discountValue').hide();
    function showDiscount(p)
    {
            var amountC = $('#amountC').val();
            var amountP = $('#amountP').val();
            
            var discount = +amountC - +amountP;
            
            $("#d").html(discount);
            var p = document.getElementById(p);
            if(p.value == "yes")
            {
                $('#discountValue').show();
            }
            else
            {
                $('#discountValue').hide();
            }
    }
    

    