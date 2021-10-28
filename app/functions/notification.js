function unnotify(str){
      var id = str;
      $.ajax({
         type: "POST",
         url :"../functions/notification.php",
         data: "id="+id,
         success: function(data){
            console.log(data);
         } 
      });

}

