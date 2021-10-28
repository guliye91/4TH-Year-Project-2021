function changeStatus(id) {
	swal({   title: "'BLOCK this user' ",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#43a047 green darken-1",   
    confirmButtonText: "Yes, Block this user!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
     if (isConfirm) 
		{   
				$.post("../functions/processChangestatus.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)
					swal({   title: "User Blocked",   
					text: "User Blocked Successfully",   
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
            swal("Not Updated", "User Not Blocked!", "error");   
        }
		});		
    }
    
    function changeStatus1(id) {
	swal({   title: "'UNBLOCK this user' ",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#43a047 green darken-1",   
    confirmButtonText: "Yes, Unblock this user!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
     if (isConfirm) 
		{   
				$.post("../functions/processChangestatus1.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)
					swal({   title: "User unblocked",   
					text: "User Unblocked Successfully",   
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
            swal("Not Updated", "User Not unblocked!", "error");   
        }
		});		
    }