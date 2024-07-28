<?php
	$fname = $_POST['fname'];
    $phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','admin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into stusignup(fname, phone, email, password) values(?, ?, ?, ?)");
		$stmt->bind_param("siss", $fname, $phone, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully";
		$stmt->close();
		$conn->close();
	}
?>