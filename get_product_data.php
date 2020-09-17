<?php
	// get the option from drop-down list 
	$whichOption = $_POST["select_order_by"];
	
	// if option is a_price, get the product info ordered by cost ascending
	if  ($whichOption == 'a_price'){
		echo "Sorted by cost, Ascending Order";
		$query = 'SELECT pid, description, cost, num FROM product ORDER BY cost ASC';
	}

	// if option is d_price, get the product info ordered by cost descending
	else if  ($whichOption == 'd_price'){
                echo "Sorted by cost, Descending Order";
                $query = 'SELECT pid, description, cost, num FROM product ORDER BY cost DESC';
        }

	// if option is a_description, get the product info ordered by description, ascending 
	else if  ($whichOption == 'a_description'){
                echo "Sorted by Description, Ascending Order";
                $query = 'SELECT pid, description, cost, num FROM product ORDER BY description ASC';
        }

	// if option is d_description, get the product info ordered by description, descending
	else if  ($whichOption == 'd_description'){
                echo "Sorted by Description, Descending Order";
                $query = 'SELECT pid, description, cost, num FROM product ORDER BY description DESC';
        }

	// if user hasn't select anything yet (default):
	else {
                echo "Sorted by Description, Ascending Order";
                $query = 'SELECT pid, description, cost, num FROM product ORDER BY description ASC';
	}
	
	$result = mysqli_query($connection,$query);
	if (!$result) {
 		die("databases query failed.");
	}

	// display the table header
	echo "<table align=\"center\">";
	echo "<caption>Product Info</caption>";
	echo "<th>ID</th>";
	echo "<th>Description</th>";
	echo "<th>Cost</th>";
	echo "<th>Available Quantity</th>";

	// display all the product info
	while ($row = mysqli_fetch_assoc($result)) {

    		echo "<tr>";

    		echo "<td>";
    		echo $row["pid"];
   		echo "</td>";

   		echo "<td>";
   		echo $row["description"];
   		echo "</td>";
	
   		echo "<td>";
   		echo $row["cost"];
   		echo "</td>";

   		echo "<td>";
   		echo $row["num"];
   		echo "</td>";
    
    		echo "</tr>";
	}
	
	mysqli_free_result($result);	
	echo "</table>";
?>
