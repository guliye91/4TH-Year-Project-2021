
function deleteUser(id) {
	swal({   title: "This Account will be deleted permanently!",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#43a047 green darken-1",   
    confirmButtonText: "Yes, Delete the Account!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
     if (isConfirm) 
		{   
				$.post("../functions/processDeleteuser.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)
					swal({   title: "Account Removed",   
					text: "Account Removed Successfully",   
					type: "success",     
					confirmButtonColor: "#DD6B55",   
					confirmButtonText: "OK",    
					closeOnConfirm: false } , 
					function(isConfirm){   
						if (isConfirm) 
							{   
							 location.reload();
							} 
					});
									
				});
			});
        } 
        else
		{     
            swal("Not Removed", "Account is not removed!", "error");   
        }
		});		
    }