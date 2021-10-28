
function updateUser(id) {
	swal({   title: "Update User Level to 'ADMIN' ",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#43a047 green darken-1",   
    confirmButtonText: "Yes, Update User Level!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
     if (isConfirm) 
		{   
				$.post("../functions/processUpdateuser.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)
					swal({   title: "User level Updated",   
					text: "User level updated Successfully",   
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
            swal("Not Updated", "User Level Not Updated!", "error");   
        }
		});		
    }
    
    function updateUser1(id) {
	swal({   title: "Update User Level to 'USER'",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#43a047 green darken-1",   
    confirmButtonText: "Yes, Update User Level!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
     if (isConfirm) 
		{   
				$.post("../functions/processUpdateuser1.php" , {sid:id} , function(data){
				$("#" + id).fadeOut('slow' , function(){$(this).remove();if(data)
					swal({   title: "User level Updated",   
					text: "User level updated Successfully",   
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
            swal("Not Updated", "User Level Not Updated!", "error");   
        }
		});		
    }