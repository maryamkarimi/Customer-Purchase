<?php
	// get the customer that has been selected
	$whichCustomer= $_POST["customers"];

	$picURL = $_POST[$whichCustomer];

	if ($picURL != ""){

		$query = 'UPDATE customer SET cusimage="' . $picURL . '" WHERE customerID="' . $whichCustomer . '"';

                if (!mysqli_query($connection, $query)) {
                        die("Error: insert failed" .
                        mysqli_error($connection));
                }

                else {
                      	// let the user know that the image URL was added successfully
                        echo "URL image added successfully. Please refresh the page to see the changes.";
                }		
        }
 ?> 
