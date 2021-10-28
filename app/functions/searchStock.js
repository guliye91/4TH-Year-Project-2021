$(document).ready(function(){
	$("#itemName").keyup(function(){
		$.ajax({
		type: "POST",
		url: "../functions/searchStock.php",
		data:'keyword='+$(this).val(),
		/*beforeSend: function(){
			$("#itemName").css("background","#FFF url(../../assets/img/LoaderIcon.gif) no-repeat 165px");
		},*/
		success: function(data){
			$("#suggestion-box").show();
			$("#suggestion-box").html(data);
			//$("#itemName").css("background","#FFF");
		}
		});
	});
});
function selectCountry(val) {
$("#itemName").val(val);
$("#suggestion-box").hide();
}