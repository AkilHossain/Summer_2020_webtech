<?php
	session_start();

	if(isset($_SESSION['status'])){
		if($_SESSION['status'] == "OK"){

			$connection = mysqli_connect('127.0.0.1', 'root', '', 'mid_mini'); 
			$result = mysqli_query($connection, "select * from final");

?>


<!DOCTYPE html>
<html>
<head>
	<title>userlist</title>
</head>
<body>
	<h3>User List</h3>
		$data = "<table border=1>
				<tr>
					<td>ID</td>
					<td>username</td>
					<td>email</td>
					<td>UserType</td>
				</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
		$data .= "<tr>
					<td>{$row['id']}</td>
					<td>{$row['username']}</td>
					<td>{$row['email']}</td>
					<td>{$row['usertype']}</td>
				</tr>";
	}
	$data .= "</table>";
</body>
</html>


<?php
}else{
		header('location: login.php');
		}
	}else{
		header('location: login.php');
	}
?>