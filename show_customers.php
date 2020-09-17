<?php
	// gets the customer id's from customer table
     	$query = "SELECT customerid FROM customer";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }

	// adds all of the customer id's from customer table to a drop down list
        while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row["customerid"] . '">';
                echo $row["customerid"];
                echo '</option>';
        }

        mysqli_free_result($result);
?>
