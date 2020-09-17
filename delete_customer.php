 <?php
	// get the customer id to be deleted
      	$whichCustomer = $_POST["delete_customer"];

	// check if customer id textbox isn't empty
	if ($whichCustomer != 'N/A' && $whichCustomer != ''){

		// query to delete the customer	
		$query = 'DELETE FROM customer WHERE customerid="' . $whichCustomer . '"';
		$result = mysqli_query($connection,$query);
	        // if query fails
		if (!$result) {
        	        echo "Sorry you can not delete this customer: they still have purchases.";
       		}
			
		// if deletion was successful
		else {
			echo "Customer with id = " . $whichCustomer . " deleted.";
                        echo "<br>Please refresh the page to see the changes";
		}
	}	
?>





 
