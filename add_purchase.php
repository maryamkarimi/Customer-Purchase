<!DOCTYPE html>
	<html>
		<head>
               		<!-- linked my css file -->
               	 	<link rel="stylesheet" type="test/css" href="mystyle.css">

               	 	<!-- added a cool font -->
                	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=KoHo">
			<meta charset="utf-8">
			<title>New Purchase</title>
		</head>

		<body>
		<?php
			include 'connectdb.php';
		?>
		<?php
   			$whichCustomer= $_POST["select_customer"];
  			$whichProduct = $_POST["select_product"];
 			$quantity =$_POST["quantity"];

			$initial_query = 'SELECT COUNT(*),quantity FROM purchases WHERE pID ="' . $whichProduct . '" AND customerID ="' . $whichCustomer . '"';
	 		$result = mysqli_query($connection,$initial_query);
			$row = mysqli_fetch_assoc($result);
			$count = $row["COUNT(*)"];
 			
			if (!$result) {
				die("database query failed.");
   			}

			else if ($count == 0){
                                $query = 'INSERT INTO purchases values("' . $whichCustomer . '","' . $whichProduct . '","' . $quantity . '")';
                                if (!mysqli_query($connection, $query)) {
                                        die("Error: insert failed" .
                                        mysqli_error($connection));
                                }
				else{
                                	echo "New purchase added successfully";
				}
			}

   			else {
    				$prev_quantity = $row["quantity"];
				if ($prev_quantity<$quantity){
	                                $query = 'UPDATE purchases SET quantity="' . $quantity . '" WHERE customerID="' . $whichCustomer . '" AND pID= "' . $whichProduct . '"';
		                        if (!mysqli_query($connection, $query)) {
                	                        die("Error: insert failed" .
                        	                mysqli_error($connection));
                                	}
	                                echo "New purchase updated successfully";
				}
                        	else{
                             		echo "The quantity can not be lower";
                        	}
                        }
  			
			mysqli_free_result($result);
		?>
		<?php
			mysqli_close($connection);
		?>
	</body>
</html>
