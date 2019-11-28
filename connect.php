<?php
	session_start();
	error_reporting(0);

	function db_connect($host, $user, $pass, $db) {
	   $mysqli = new mysqli($host, $user, $pass, $db);
	   $mysqli->set_charset("utf8");

	   if($mysqli->connect_error) {
	     die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	   }
	   return $mysqli;
	}

	$mysqli = db_connect('localhost','root','','entry_management');

	$name = $_POST['name'];
	$phone_no = $_POST['phone_no'];
	$check_in_time = $_POST['check_in_time'];
	$check_out_time = $_POST['check_out_time'];
	$host_name = $_POST['host_name'];
	$address_visited = $_POST['address_visited'];

	// Insert Query
	$query = "insert into crud (name, phone_no, check_in_time, check_out_time, host_name, address_visited) values ('$name', '$phone_no', '$check_in_time', '$check_out_time', '$host_name', '$address_visited')";

	// if (isset($_POST['submit_form'])) {
		mysqli_query($mysqli, $query);
		
		$_SESSION['done'] = 'Successfully Entered Data';

		// send mail
		$ToEmail = "rv.fefar@gmail.com";
		$ToSubject = "Inquiry Mail From www.allseasons.com";

		$EmailBody =   "Name : $name\n 
		Phone : $phone_no\n
		Check in time : $check_in_time\n
		Check out time : $check_out_time\n
		Host name: $host_name\n
		Address: $address_visited\n";

		$Message = $EmailBody;

		$headers = '';

		$headers .= "Content-type: text; charset=iso-8859-1 \r\n";
		$headers .= "From: info@wordpress.com \r\n";

		if(mail($ToEmail, $ToSubject, $Message, $headers)) {
		   $_SESSION['send'] = "Successfully sent mail!";
		} else {
		   $_SESSION['send'] = "Sorry, couldn't send mail!";
		}

		header('Location: index.php');
		
	// }

?>