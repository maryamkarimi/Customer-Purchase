 <?php
	// gets the customer whose phone number's to be updated
	$whichCustomer = $_POST["customer_Id"];
	// gets the new phone number
        $phone =$_POST["new_phone_textbox"];
	// ask the user to enter phone number if it's empty and submit button has been pressed.
	if ($phone == '' && $whichCustomer!='') {
                echo "<script>alert('Enter phone number.');</script>";
        }
	else if ($phone != '') {
		// query to update the phone number
		$query = 'UPDATE customer SET phone="' . $phone . '" WHERE customerID="' . $whichCustomer . '"';

	        if (!mysqli_query($connection, $query)) {
        		die("Error: insert failed" .
               		mysqli_error($connection));
        	}
	
		else { 
			// let the user know that the phone number was changed succesfully
			echo "Phone number changed successfully";
			echo "<br>Please refresh the page to see the changes made";
	        }
	}
?> 
