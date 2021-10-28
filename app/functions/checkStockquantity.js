function checkStockquantity() {
//$("#loaderIcon").show();
var quantity = $('#quantity').val();
var name = $('#itemName').val();
var amountC = $('#amountC').val();
jQuery.ajax({
url: "../functions/checkStockquantity.php",
data: "quantity="+quantity+"&itemName="+name+"&amountC"+amountC,
type: "POST",
success:function(data){
 if(data.indexOf('available') >=0)
 {
   $("#showQuantity").html(data);
   $("#addSalebutton").hide();
 }
   /*
 }
if(data == 'lessStock')
{
   $("#showQuantity").html("Insufficient stock");
   $("#addSalebutton").hide();
}
*/
else
{
   $("#showQuantity").html("");
   $("#expectedAmount").html(data);
   //$('#amountC').val($('#amountC').val() + data);
   $("#addSalebutton").show(); 
}
//$("#loaderIcon").hide();

},
error:function (){}
});
}