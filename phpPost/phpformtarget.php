<!DOCTYPE html>
<html  lang="en">
	
<head>

<?php
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
	
	Welcome <?php echo $username; ?><br>
	Your password is: <?php echo $password; ?>


</body>

</html>