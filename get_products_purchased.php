<!-- get products purchased by a given customer -->
<!DOCTYPE html>
<html>
	<head>
                <!-- linked my css file -->
                <link rel="stylesheet" type="test/css" href="mystyle.css">

                <!-- added a cool font -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=KoHo">

		<meta charset="utf-8">
		<title>Products Purchased by Customer</title>
	</head>
	
	<body>
		<!-- connect to the database -->
		<?php
			include 'connectdb.php';
		?>
		<h1>Products Purchased:</h1>
		<ol>
			<?php
				// get the customer that has been selected
  				$whichCustomer= $_POST["customers"];

				// query to get the product descriptions purchased by this customer
   				$query = 'SELECT description FROM purchases, product WHERE purchases.pID=product.pid AND purchases.customerID="' . $whichCustomer . '"';
   				$result=mysqli_query($connection,$query);

   				if (!$result) {
        				die("database query2 failed.");
     				}

				//display the product descriptions
    				while ($row=mysqli_fetch_assoc($result)) {
        				echo '<li>';
        				echo $row["description"];
     				}
			
				mysqli_free_result($result);
			?>
		</ol>

		<!-- disconnect from the database -->
		<?php
   			mysqli_close($connection);
		?>
	</body>
</html>
