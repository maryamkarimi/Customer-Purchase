<?php
	// query to get all the description from product table where their pid isn't in purchases table 
     	$query = "SELECT description FROM product WHERE pid NOT IN (SELECT pID FROM purchases)";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }

	// display the product descriptions in a table
	echo "<table align=\"center\">";
        echo "<th>Description</th>";

        while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";

                echo "<td>";
                echo $row["description"];
                echo "</td>";

		echo "</tr>";
        }

	mysqli_free_result($result);
        echo "</table>";
?>
