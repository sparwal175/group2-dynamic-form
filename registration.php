<?php

		// servername => localhost now rds endpoint
		// username => root now your db username 
		// password => empty now your oen password
		// database name => Your database name
		$conn = mysqli_connect("group2-dynamic-form.czptxhzjxjrt.us-east-1.rds.amazonaws.com", "admin", "Admin!23456", "dynamic-webform-db");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$address = $_REQUEST['address'];
		$email = $_REQUEST['email'];        
		$password = $_REQUEST['password'];
		$country = $_REQUEST['country'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO users(first_name,
		last_name,password,address,email, country) VALUES ('$first_name',
			'$last_name','$password','$address','$email', '$country')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please connect to your RDS"
				. " to view the updated data</h3>";

			echo nl2br("\n$first_name\n $last_name\n "
				. "$password\n $address\n $email\n $country");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>