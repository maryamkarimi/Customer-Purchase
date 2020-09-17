<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Maryam Karimi's Assignment 3</title>
		
		<!-- linked my css file -->
		<link rel="stylesheet" type="test/css" href="mystyle.css">
		
		<!-- added a cool font -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=KoHo">
	</head>

	<body>
                <!-- linked my js files-->
                <script src="drop_downs.js"></script>
                <script src="new_purchase.js"></script>
		<script src="new_customer.js"></script>

		<!-- connecting to the database -->
		<?php
			include 'connectdb.php';
		?>

		<h1>CS3319A - Assignment 3</h1>
			
		<div class="flex-container">

               		<!-- Part 1: list info about customers in alphabetical order by lastname. Display products they bought once seletected -->
                	<div class="box" style="order:1;">
				<form action="get_products_purchased.php" method="post">
				Choose a customer and click on one of the buttons on the bottom:
					<?php
						include 'get_customer_data.php';
					?>
					<!-- submit button to get purchased products by a customer -->
					<button type="submit">Get Purchased Products</button><br>
					<!-- submit button to add a picture -->
					<button type="submit" formaction="">Add Picture</button>
				</form>
				<!-- Bonus questions: adds an image to customer table -->
				<?php
					include 'add_cusimage.php';
				?>
			</div>

			<!-- Part 2: list products in alphabetical order by description/ price-->
			<div class="box" style="order:1;">
				<form action="" method="post">
			 		<select id="select_order_by" name="select_order_by">
						<option value="1">Order by</option>
						<option value="a_description">Description - Ascending</option>
						<option value="d_description">Description - Descending</option>
						<option value="a_price">Price - Ascending </option>
                        			<option value="d_price">Price - Descending </option>
					</select>
				</form>
				<?php
     					include 'get_product_data.php';
				?>
                	</div>

			<!-- Part 3: insert a new purchase -->
	                <div class="box" style="order:3;">
        	                <form name="new_purchase" action="add_purchase.php" method="post" id="new_purchase" onsubmit="return submit_new_purchase()">
                	                <h1 class="bodytext">Insert a New Purchase</h1>
                        	        <!-- display the products in a drop-down list -->
					Product: 
					<select id="select_product" name="select_product">
                                		<option value="N/A">Select Product</option>
                                		<?php
                                     			include 'show_products.php';
                                		?>
                                	</select><br>

					<!-- display customers in a drop-down list -->
                                	Customer: 
					<select id="select_customer" name="select_customer">
                                		<option value="N/A">Select Customer</option>
                                		<?php
                                     			include 'show_customers.php';
                                		?>
                                	</select><br>
					
					<!-- a textbox for quantity -->
                                	Quantity: 
					<input type="text" name="quantity" id="quantity"/><br>
					<!-- submit button to add a purchase -->
                                	<input type="submit" value="Insert Purchase">
                        	</form>
                	</div>


			<!-- Part 4: insert a new customer -->
                	<div class="box" style="order:3;">
	                        <form name="new_customer" action="add_customer.php" method="post" id="new_customer" onsubmit="return submit_new_customer()">
        	                        <h1 class="bodytext">Add a New Customer</h1>
					<!-- textboxes to get info from user -->
                	                ID: <input type="text" name="customer_id" id="customer_id"/><br>
                        	        First name: <input type="text" name="customer_fname" id="customer_fname"/><br>
                               		Last name: <input type="text" name="customer_lname" id="customer_lname"/><br>
                                	City: <input type="text" name="customer_city" id="customer_city"/><br>
                                	Phone: <input type="text" name="customer_phone" id="customer_phone"/><br>
                                	Agent: <input type="text" name="customer_agent" id="customer_agent"/><br>
					<!-- submit button to insert a new customer -->
                                	<input type="submit" value="Insert Customer">
                        	</form>
	                </div>

			<!-- Part 5: update a customer's phone number -->
			<div class="box" style="order:3;">
                                <form action="" method="post">
                             		<h1 class="bodytext">Update Customer Phone Number</h1>
                             		Customer: 
					<select id="update_customer_phone" name="update_customer_phone">
                                		<option value="N/A">Select Customer</option>
                                        	<!-- show the customers in the drop-down list -->
						<?php
                                             		include 'show_customers.php';
                                        	?>
                                	</select>
                        	</form>

				<!-- display customer's current phone number -->
                        	<form action="" method="post">
                                	<?php
                                     		include 'get_customer_phone.php';
                                 	?>
                        	</form>

				<!-- update customer's phone number -->
                        	<form action="" method="post">
                      			<?php
                                		include 'update_customer_phone.php';
                        		?>
                        	</form>
                	</div>

			<!-- Part 6: delete a customer: only deletes customers that hasn't purchased anything before -->
			<div class="box" style="order:4;">
                        	<form name="delete_customer" action="" method="post" id="delete_customer">
                                	<h1 class="bodytext">Delete a customer</h1>
	                                Customer: 
					<!-- a drop-down list called delete_customer which will include all customer id's -->
					<select id="delete_customer" name="delete_customer">
                                		<option value="N/A">Select Customer</option>
                                		<?php
                                     			include 'show_customers.php';
                                		?>
                               		</select>
					<!-- submit button to delete a customer -->
                                	<input type="submit" value="Delete">
                        	</form>
                        	<?php
                             		include 'delete_customer.php';
                        	?>
                	</div>

			<!-- Part 7: list all customer names who bought more than a given quantity of any product -->
                	<div class="box" style="order:4;">
                		<form action="" method="post">
                        		<h1 class="bodytext"> Info Based on Quantity Purchased</h1>
					<!-- textboxt to get the quantity -->
                        		Quantity: <input type="text" name="quantity_txtbox" id="quantity_txtbox"/><br>
                        		<!-- submit button to get the info -->
					<input type="submit" value="Get Info">
                		</form>
                		<?php
                     			include 'get_based_on_quantity.php';
                		?>
                	</div>

			<!-- Part 8: list the description of any product that has never been purchased -->
                	<div class="box" style="order:1;">
                        	<form action="" method="post">
                                	<h1 class="bodytext">Products Never Purchased</h1>
                                	<?php
                                     		include 'get_never_purchased.php';
                                	?>
                        	</form>
                	</div>
		
			<!-- Part 9: list the total number of purchases for a particular product and the product description and the total money made in sales for that product -->
			<div class="box" style="order:5;">
                        	<form name="get_based_on_product" action="" method="post" id="get_based_on_product">
                                	<h1 class="bodytext">Info Based on Product</h1>
                                	<!-- drop-down list which will include the product id's -->
					Product: 
					<select id="select_product_2" name="select_product_2">
		                                <option value="N/A" name="N/A">Select Product</option>
                		                <!-- adds the product id's to the drop-down list -->
						<?php
                                	     		include 'show_products.php';
                               			?>
                                	</select>
                                	<!-- submit button to get info based on product chosen -->
					<input type="submit" value="Get Info">
                        	</form>
                        	<?php
                             		include 'get_based_on_product.php';
                        	?>
                	</div>
		</div>
	
		<!-- disconnect from the database -->
		<?php
   			mysqli_close($connection);
		?>

	</body>
</html>
