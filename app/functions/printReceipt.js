function printReceipt(id) {
	$.post("../functions/printReceipt.php" , {sid:id} , function(data){
        console.log(data);
	});	
		
    }
function printReceiptphoto(id) {
	$.post("../functions/printReceiptphoto.php" , {sid:id} , function(data){
        console.log(data);
	});	
		
    }
function printReceiptcyber(id) {
	$.post("../functions/printReceiptcyber.php" , {sid:id} , function(data){
        console.log(data);
	});	
		
    }
function printLog() {
	$.post("../functions/printLog.php", function(data){
        console.log(data);
	});	
    }
function printExpenses() {
	$.post("../functions/printExpenses.php", function(data){
        console.log(data);
	});
}