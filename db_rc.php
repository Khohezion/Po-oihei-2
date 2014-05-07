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
			Island: <?php echo $_POST['island']; ?><br>
			<!--grab 'lname' var from index.php-->
			Shelter:  <?php echo $_POST['shelter']; ?><br>
			
			<?php
				//connecting to db  mysqli_connect("host", "username", "password", "database_name");
				$con = mysqli_connect("localhost", "admin", "", "test");
				
				$shelter = $_POST['shelter'];
				$island = $_POST['island'];
				
				//inserting into database omylese_tester table 'accounts'
				//mysqli_query($con, "INSERT INTO accounts (fname, lname, age, occupation) VALUES ('$fname', '$lname', '$age', '$occupation')");
				echo "SELECT * FROM shelters WHERE shelter='$shelter' OR island='$island'<BR>";
				if ($result = mysqli_query($con, "(SELECT * FROM shelters WHERE Shelter='$shelter' OR Island='$island');")) {
				    Print "<table border cellpadding=2>";
				       Print "<th>Shelter</th>";
				       Print "<th>Island</th></tr>";
				       while($info = mysqli_fetch_array( $result)) 
				       { 
				          Print "<tr>"; 
				          Print "<th>".$info['Shelter'] . "</th> "; 
				          Print "<th>".$info['Island'] . " </th></tr>"; 
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