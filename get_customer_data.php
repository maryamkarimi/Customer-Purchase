<?php
	// query to get all of the customer info from customer table
	$query = "SELECT * FROM customer ORDER BY lastname";
	$result = mysqli_query($connection,$query);
	if (!$result) {
		die("databases query failed.");
	}

	// display table header
	echo "<table align=\"center\">";
	echo "<caption>Customer Info</caption>";
	echo "<th>ID</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>City</th>";
	echo "<th>Phone</th>";
	echo "<th>Agent ID</th>";
	echo "<th>Image</th>";

	// display the customer info for every customer
	while ($row = mysqli_fetch_assoc($result)) {

		echo "<tr>";
	
		echo "<td>";
		$customerid = $row["customerid"];
		echo '<input type="radio" name="customers" value="';; 
		echo $customerid;
	    	echo '">';
	    	echo "   " . $customerid;
	    	echo "</td>";
	
    		echo "<td>";
    		echo $row["firstName"];
    		echo "</td>";

    		echo "<td>";
    		echo $row["lastName"];
    		echo "</td>";

    		echo "<td>";
    		echo $row["city"];
    		echo "</td>";
    
    		echo "<td>";
    		echo $row["phone"];
    		echo "</td>";
    
    		echo "<td>";
    		echo $row["agentID"];
    		echo "</td>";

		echo "<td>";
		if ($row["cusimage"] == NULL){
                        echo 'URL: <input type="text" name="' . $customerid . '"/>';
                }
                else{
			echo '<img src="' . $row["cusimage"] . '" width="100" height="100">';                        
                }
		echo "</td>";
    
    		echo "</tr>";
	}

	mysqli_free_result($result);
	echo "</table>";
?>
