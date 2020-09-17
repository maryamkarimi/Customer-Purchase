<!-- Add a new customer -->
<!DOCTYPE html>
        <html>
              	<head>
                	<!-- linked my css file -->
                	<link rel="stylesheet" type="test/css" href="mystyle.css">

                	<!-- added a cool font -->
                	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=KoHo">
                      	<meta charset="utf-8">
                        <title>New Customer</title>
                </head>

                <body>
			<!-- connect to the database -->
			<?php
				include 'connectdb.php';
			?>
			<?php
				// get info from the textboxes
                     		$customer_id= $_POST["customer_id"];
                        	$customer_fname = $_POST["customer_fname"];
     				$customer_lname =$_POST["customer_lname"];
  				$customer_city= $_POST["customer_city"];
   				$customer_phone = $_POST["customer_phone"];
       	                 	$customer_agent =$_POST["customer_agent"];

				// initial query: check if a customer with this id exist
	                        $check_customer_id = 'SELECT COUNT(*) FROM customer WHERE customerID ="' . $customer_id . '"';
        	                $result = mysqli_query($connection,$check_customer_id);

				$row = mysqli_fetch_assoc($result);
				$count = $row["COUNT(*)"];
                       		if (!$result) {	
					die("Error: database query failed.");
                        	}
                        	
				// if num of rows isn't 0 (i.e a customer with this id exists
				else if ($count != 0){
					echo "A customer with this id exists. Try a different customer ID.";
				}
				
				// if customer id is valid
                       		else{
					// check if agent id is valid
           	    		        $check_agent_id = 'SELECT COUNT(*) FROM agent WHERE agentID ="' . $customer_agent . '"';
               		 	        $result = mysqli_query($connection,$check_agent_id);
		
        	        	        $row = mysqli_fetch_assoc($result);
	                	        $count = $row["COUNT(*)"];
	
 		   	                if (!$result) {
						die("database query failed.");        	                     
					}
				
					// if no agent with this id exists
					else if ($count == 0){
						echo "No agent with this ID exists. Try a different agent ID.";
            	        	     	}
				
					// if agent id is valid, add the customer to database
					else {
                                		$query = 'INSERT INTO customer values("' . $customer_id . '","' . $customer_fname . '","' . $customer_lname . '","' . $customer_city . '","' . $customer_phone. '","' . $customer_agent . '" ,NULL' . ')';
                 				if (!mysqli_query($connection, $query)) {
                                		        die("Error: insert failed" .
                                    		    	mysqli_error($connection));
                                		}

						// let user know customer has been added successfully
                            		    	echo "New customer with the following info added:<br>";
                                		echo "ID: " . $customer_id . "<br>Name: " . $customer_fname . " " . $customer_lname . "<br>City: " . $customer_city . "<br>Phone: " . $customer_phone . "<br>Agent ID: " . $customer_agent;
						echo "<br>Please go back and refresh the page to see the changes";
                        		}
				}

                	?>
			
			<!-- close the database connection -->
			<?php
  				mysqli_close($connection);	
			?>
	        </body>	
	</html>
	
