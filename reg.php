<?php
	$fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
	$gender = $_POST['gender'];
    $address = $_POST['address'];
    $collegename = $_POST['collegename'];
    $branch = $_POST['branch'];
	$eventcode = $_POST['eventcode'];

	// Database connection
	$conn = new mysqli('localhost','root','','admin');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into regform(fname, email, phone, age, gender, address, collegename, branch, eventcode) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiisssss", $fname, $email, $phone, $age, $gender, $address, $collegename, $branch, $eventcode);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>