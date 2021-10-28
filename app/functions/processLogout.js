$(document).ready(function(){
   $('#buttonOut').click(function(){
    var url = "../functions/processLogout.php";
    data = {'action' : 'LogoutTime'};
    $.post(url,data, function(){
        window.location.href = '../login';
    });

   });
   
    $('#buttonOut1').click(function(){
    var url = "../functions/processLogout.php";
    data = {'action' : 'LogoutTime'};
    $.post(url,data, function(){
        window.location.href = '../login';
    });

   });
});
