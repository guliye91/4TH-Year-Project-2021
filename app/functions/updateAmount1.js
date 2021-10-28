function updateDatac(str){
      var idc = str;
      var amountc = $('#newAmountc-'+str).val();
      var newFormc = $('#newAmountformc-'+str);
      var errc = $('#errc-'+str);
      
      $(newFormc).submit(function(e){
         e.preventDefault();   
      });
      if(amountc === '')
      {
            $(errc).html("<span class='red-text center'>Please enter amount<i class='material-icons'>warning</i></span>");
      }
      else
      {
      $(errc).html('');
      $.ajax({
         type: "POST",
         url :"../functions/updateAmount1.php",
         data: "newAmountc="+amountc+"&cyberId="+idc,
         //success: alert("hey"),
         success:
         swal({   title: "Updated",   
            text: "Amount Updated",   
            type: "success",     
            confirmButtonColor: "teal",   
            confirmButtonText: "OK",    
            closeOnConfirm: false } , 
            function(isConfirm){   
                if (isConfirm) 
                    {   
                    location.reload();
                    }     
            }),
         
      });
      }
}

