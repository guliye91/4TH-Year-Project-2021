
function deleteMessage(id) {
	swal({   title: "This Message will be deleted permanently!",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#43a047 green darken-1",   
    confirmButtonText: "Yes, Delete the Message!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
     if (isConfirm) 
		{   
				$.post("../functions/deleteMessage.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)
					swal({   title: "Message Deleted",   
					text: "Message Deleted Successfully",   
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