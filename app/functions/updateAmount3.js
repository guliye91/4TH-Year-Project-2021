function updateDatap(str){
      var idp = str;
      var amountp = $('#newAmountp-'+str).val();
      var newFormp = $('#newAmountformp-'+str);
      var errp= $('#errp-'+str);
      
      $(newFormp).submit(function(e){
         e.preventDefault();   
      });
      if(amountp === '')
      {
            $(errs).html("<span class='red-text center'>Please enter amount<i class='material-icons'>warning</i></span>");
      }
      else
      {
      $(errp).html('');
      $.ajax({
         type: "POST",
         url :"../functions/updateAmount3.php",
         data: "newAmountp="+amountp+"&id="+idp,
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

