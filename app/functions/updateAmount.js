function updateData(str){
      var id = str;
      var amount = $('#newAmount-'+str).val();
      var newForm = $('#newAmountform-'+str);
      var err = $('#err-'+str);
      
      $(newForm).submit(function(e){
         e.preventDefault();   
      });
      if(amount === '')
      {
            $(err).html("<span class='red-text center'>Please enter amount<i class='material-icons'>warning</i></span>");
      }
      else
      {
      $(err).html('');
      $.ajax({
         type: "POST",
         url :"../functions/updateAmount.php",
         data: "newAmount="+amount+"&repairId="+id,
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

