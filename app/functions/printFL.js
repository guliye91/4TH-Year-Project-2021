$('#printFLform').submit(function(e){
    e.preventDefault();
        $.ajax({
        url:  "../functions/printLog.php",
        method: "get",
        data: {printFL : "printFL"},
        success: function(data){
            console.log(data);
        },
    });
});
$('#printExpenseform').submit(function(e){
    e.preventDefault();
        $.ajax({
        url:  "../functions/printExpense.php",
        method: "get",
        data: {printExpense : "printExpense"},
        success: function(data){
            console.log(data);
        },
    });
});
$('#printStockform').submit(function(e){
    e.preventDefault();
        $.ajax({
        url:  "../functions/printStock.php",
        method: "get",
        data: {printFL : "printStock"},
        success: function(data){
            console.log(data);
        },
    });
});
$('#printReceipt').submit(function(e){
    e.preventDefault();
        $.ajax({
        url:  "../functions/printReceipt.php",
        method: "get",
        data: {printFL : "printReceipt"},
        success: function(data){
            console.log(data);
        },
    });
});




/*   
    $.ajax({
        url:  "../functions/printLog.php",
        method: "get",
        data: {printFL : "printFL"},
        success: function(data){
            console.log(data);
        },
    });
*/