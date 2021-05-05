<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$product = $_POST['product'];
$date = $_POST['date'];

$errArr = [];

	if (empty($_POST["firstname"])) {
		$errArr[] = "First Name is required";
	}
	if (empty($_POST["lastname"])) {
		$errArr[] = "Last Name is required";
	} 

	if (empty($_POST["email"])) {
		$errArr[] = "Email is required";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errArr[] = "Invalid email format";
    }
	if (empty($_POST["product"])) {
		$errArr[] = "Product is required";
	} 
	if (empty($_POST["phoneNumber"])) {
		$errArr[] = "Phone Number is required";
	} 
	if (empty($_POST["date"])) {
		$errArr[] = "Date is required";
	} 

	if(count($errArr) != 0 ){
		$status = "error";
		$title = "Please check all the fields";
		$desc = implode("<br>",$errArr);
	}else{
		$to = "dheerajraopathur@gmail.com";
		$subject = "wabuildinghire.com.au Lead";

		$message = "
		<html>
			<head>
				<title>wabuildinghire.com.au Lead</title>
			</head>
			<body>
				<p>Below is the Lead details: </p>
				<table>
					<tr>
						<th>Firstname: </th>
						<th>Lastname: </th>
						<th>Email: </th>
						<th>Phone Number: </th>
						<th>Prodcut: </th>
						<th>Date: </th>
					</tr>
					<tr>
						<td>".$firstname."</td>
						<td>".$lastname."</td>
						<td>".$email."</td>
						<td>".$phoneNumber."</td>
						<td>".$product."</td>
						<td>".$date."</td>
					</tr>
				</table>
			</body>
		</html>";

		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers
		$headers .= 'From: <info@wabuildinghire.com.au>' . "\r\n";
		//$headers .= 'Cc: myboss@example.com' . "\r\n";

		mail($to,$subject,$message,$headers);
		
		
		$status = "sucess";
		$title = "Thank You for contacting us!";
		$desc = "We will contact you soon.<br />      For any urgent enquiries please call 1300 572 521";
	}
  

//Declare the array
$arr=array("title"=>$title,"status"=>$status, "desc"=>$desc);

//Print the array in a simple JSON format
echo json_encode($arr);

/*We will contact you soon.
                For any urgent enquiries please call 1300 572 521*/
				
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}