function submit_new_customer(){
	// checks if all textboxes are filled, if yes returns true
	if (is_valid_customer()){
                return true;
        }

	// if one or more of textboxes is/are empty, displays the message below to the user
	else{
             	alert('Please fill out all of the textboxes');
                return false;
        }
}

// checks if the textboxes are empty. If they're all filled returns rue;
function is_valid_customer(){
        var customer_id = document.getElementById("customer_id").value;
        var customer_fname = document.getElementById("customer_fname").value;
        var customer_lname = document.getElementById("customer_lname").value;
        var customer_city = document.getElementById("customer_city").value;
        var customer_phone = document.getElementById("customer_phone").value;
        var customer_agent = document.getElementById("customer_agent").value;

        if (customer_id == '' || customer_fname == '' || customer_lname == '' || customer_city == '' || customer_phone == '' || customer_agent == ''){
                return false;
        }

	return true;

}

