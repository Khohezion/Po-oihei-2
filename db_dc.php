<html>
	<head>
		<title>Results</title>
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/styles.css" rel="stylesheet" />
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
	</head>
	<body>
		<!--Everything is contained inside a div element-->
		<div class="container">
			<h1>Data entered with following info:</h1>
			<!--grab 'fname' var from index.php-->
			Name:  <?php echo $_POST['name']; ?><br>
			<!--grab 'lname' var from index.php-->
			Address: <?php echo $_POST['address']; ?><br>
			
			<?php
				//connecting to db  mysqli_connect("host", "username", "password", "database_name");
				$con = mysqli_connect("localhost", "admin", "", "test");
				
				$name = $_POST['name'];
				$address = $_POST['address'];
				
				//inserting into database omylese_tester table 'accounts'
				//mysqli_query($con, "INSERT INTO accounts (fname, lname, age, occupation) VALUES ('$fname', '$lname', '$age', '$occupation')");
				echo "SELECT * FROM people WHERE name='$name' AND address='$address'<BR>";
				if ($result = mysqli_query($con, "(SELECT * FROM people WHERE name='$name' AND address='$address');")) {
				    Print "<table border cellpadding=3>";
				       Print "<th>Name</th>";
				       Print "<th>Address</th>";
				       Print "<th>Status</th></tr>";
				       while($info = mysqli_fetch_array( $result)) 
				       { 
				          Print "<tr>"; 
				          Print "<th>".$info['name'] . "</th> "; 
				          Print "<th>".$info['address'] . " </th>";
				          Print "<th>".$info['status'] . "</tr>"; 
				       } 
				       Print "</table>";
				}
				else {
				   echo mysqli_error($con);
				}
				
				//closing the connection to omylese_tester
				mysqli_close($con);				
				
			?>
		</div>
	</body>
</html>