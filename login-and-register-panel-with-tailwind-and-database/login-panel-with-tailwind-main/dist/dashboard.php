<?php
require 'connect.php';
if (!empty($_SESSION["id"])) {
	$id = $_SESSION["id"];
	$result = mysqli_query($conn, "SELECT * FROM uspa WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
}
else{
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body>
<h1>Welcome, <?php echo $row["username"]; ?></h1>
<p>This is a home page.</p>
<a href="logout.php">Logout</a>
</body>
</html>