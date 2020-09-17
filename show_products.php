<?php
	// query to get all of the product id's from the product table
        $query = "SELECT pid FROM product";
        $result = mysqli_query($connection,$query);
        if (!$result) {
                die("databases query failed.");
        }

        // adds all of the product id's from product table to	a drop down list  
        while ($row = mysqli_fetch_assoc($result)) {
                echo '<option id=' . $row["pid"] . '>';
                echo $row["pid"];
                echo '</option>';
        }

        mysqli_free_result($result);
?>
