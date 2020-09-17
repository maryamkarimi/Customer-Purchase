function submit_new_purchase(){
	// if textboxes are filled properly, returns true
        if (is_valid_purchase()){
		return true;
        }
	// if the textboxes aren't filled properly, displays the following message.
	else{
                alert("Input is not valid.");
        	return false;
        }
}

// checks the textboxes and quantity. if they're all filled and quantity is a positive number, returns true. else false.
function is_valid_purchase(){
        var customerID = document.getElementById("select_customer").value;
        var pID = document.getElementById("select_product").value;
        var quantity = document.getElementById("quantity").value;

        if (customerID == 'Select Customer' || pID == 'Select Product' | quantity == '' || quantity<1){
                return false;
        }

	return true;
}
