function updateDatas(str){
      var ids = str;
      var amounts = $('#newAmounts-'+str).val();
      var newForms = $('#newAmountforms-'+str);
      var errs= $('#errs-'+str);
      
      $(newForms).submit(function(e){
         e.preventDefault();   
      });
      if(amounts === '')
      {
            $(errs).html("<span class='red-text center'>Please enter amount<i class='material-icons'>warning</i></span>");
      }
      else
      {
      $(errs).html('');
      $.ajax({
         type: "POST",
         url :"../functions/updateAmount2.php",
         data: "newAmounts="+amounts+"&id="+ids,
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

