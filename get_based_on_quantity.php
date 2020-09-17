<?php
	// get the qunatity from quantity textbox
     	$quantity = $_POST["quantity_txtbox"];

	if ($quantity != ''){
		// query to get info about this product
        	$query = 'SELECT firstName,lastName, description, quantity FROM customer,product,purchases WHERE customer.customerid = purchases.customerID AND product.pid = purchases.pID AND quantity>' . $quantity;

		$result = mysqli_query($connection,$query);
        	if (!$result) {
                	die("databases query failed.");
       		}

		// display the info in a table
		echo "<table align=\"center\">";
       		echo "<caption>Customers who purchased more than " . $quantity . " products: </caption>";
       		echo "<th>Customer Name</th>";
      		echo "<th>Product Description</th>";
       		echo "<th>Quantity Bought</th>";

        	while ($row = mysqli_fetch_assoc($result)) {

                	echo "<tr>";

               		echo "<td>";
               		echo $row["firstName"] . " " . $row["lastName"];
               		echo "</td>";

               		echo "<td>";
               		echo $row["description"];
               		echo "</td>";

                	echo "<td>";
                	echo $row["quantity"];
                	echo "</td>";

                	echo "</tr>";
        	}
 
        	mysqli_free_result($result);
        	echo "</table>";
	}
?>
