<?php  


if (isset($_POST['name'] ) && isset($_POST['email']) && isset($_POST['message'])) {
	include 'db_conn.php';

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
	$message = validate($_POST['message']);

	if (empty($message) || empty($email) || empty($name)) {
		header("Location: index.html");
	}else {

		$sql = "INSERT INTO test(name, email, message) VALUES('$name','$email','$message')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: index.html");
}