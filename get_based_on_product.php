<?php
	// get the product id chosen from drop-down list called select_product_2
     	$whichProduct = $_POST["select_product_2"];
        if ($whichProduct != "N/A"){
		// query to get the info
		$query = 'SELECT SUM(quantity),COUNT(*), SUM(quantity)*cost FROM purchases,product WHERE purchases.pID ="' . $whichProduct . '" AND product.pid ="' . $whichProduct . '"';

                $result = mysqli_query($connection,$query);
                if (!$result) {
                        die("databases query failed.");
                }

		else{
			// display the info in a table
               	 	echo "<br><table align=\"center\">";
                	echo "<th>Total Number Sold</th>";
                	echo "<th>Number of Customers Sold to</th>";
                	echo "<th>Total Money Made</th>";

                	while ($row = mysqli_fetch_assoc($result)) {

	                        	echo "<tr>";

        	                	echo "<td>";
                	        	echo $row["SUM(quantity)"];
                        		echo "</td>";
	
        	                	echo "<td>";
        	                	echo $row["COUNT(*)"];
                	        	echo "</td>";

                	        	echo "<td>";
					if ($row["COUNT(*)"]>0){
                        			echo $row["SUM(quantity)*cost"] . "$";
                        		}
					echo "</td>";

                        		echo "</tr>";
                	}
                        mysqli_free_result($result);
                	echo "</table>";
        	}
	}
?> 
