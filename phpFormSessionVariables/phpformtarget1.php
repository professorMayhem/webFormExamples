<!DOCTYPE html>
<html  lang="en">
	
<head>

<?php
//  Start a session so we can use session variables
session_start();

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

</head>

<body>
	<?php
	
		$username = $_POST["username"];
		$password = $_POST["password"];
		
		
	?>
	


	<h2>PHP Form Target Page</h2>
	
	<?php 
	
	echo $username . "<br>";
	echo $password . "<br><br>"; 
	
	// must also check for password
	// note: this example uses the customers table
	$sql = "SELECT * FROM customers WHERE CustID = '" . $username . "';";
	echo $sql . "<br>";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		echo "You are logged in!<br>";
		// copy dataset into a PHP array called $row
		$row = $result->fetch_assoc();  
		$firstName = $row["CustName"];
		
		// the next line sets the session variable.  Now this value will be
		// available to use on any of the pages during this browsing session.
		$_SESSION["custFirstName"] = $firstName;
		echo "Welcome " . $_SESSION["custFirstName"] . "!<br>";
	} 
	else {
		echo "Incorrect username or password";
	}
	$conn->close();

	?>
	<a href = nextpage.php>Click here to see session variables</a>
</body>

</html>