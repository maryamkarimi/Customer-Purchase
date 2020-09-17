 <?php
     	$whichCustomer = $_POST["update_customer_phone"];
        $query = 'SELECT COUNT(*),phone FROM customer WHERE customerID="' . $whichCustomer . '"';

	$result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }
	
	$row = mysqli_fetch_assoc($result);
	
	if ($row["COUNT(*)"]>0){
		echo "Current Phone: " . $row["phone"] . "<br>";
                echo '<label id="new_phone_label">New Phone:</label>';
                echo '<input type="text" name="new_phone_textbox" id="new_phone_textbox"/><br>';
                echo '<input type="submit" id="update_customer_phone_submit" value="Submit">';
		echo '<input type="hidden" id="customer_Id" name="customer_Id" value="' . $whichCustomer . '">';
	}

	mysqli_free_result($result);
?>
