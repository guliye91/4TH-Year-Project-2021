     $(function(){
                           var time = 60; //60 seconds = 1 minute
                           
                           function redirect(){
                            var id = setTimeout(redirect, 1000);
                            $(".timer").html("<p class='orange-text center'>Please try again in "+time+" seconds</p>");
                            $("#username").prop("disabled",true);
                            $("#password").prop("disabled",true);
                            $("#submit").prop("disabled",true);
                            if(time === 0){
                            clearTimeout(id);
                            $(".timer").html('');
                            $("#username").prop("disabled",false);
                            $("#password").prop("disabled",false);
                            $("#submit").prop("disabled",false);
                           }
                           time --;
                        }
                        redirect();
                        });