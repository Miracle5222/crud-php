<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$fname =  $_POST['fname'];
	$lname =  $_POST['lname'];
	$age =  $_POST['age'];
	$email =  $_POST['email'];
	$course =  $_POST['course'];
	$gender =  $_POST['gender'];
	$year =  $_POST['year'];
	

	if(
	empty($fname) || empty($lname) || empty($age) || 
	empty($email) || empty($course) || empty($gender) ||
	empty($year)
	 ){
		
		if(empty($fname)) {
			echo "<font color='red'>fname field is empty.</font><br/>";
		}
		
		if(empty($lname)) {
			echo "<font color='red'>lname field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>age field is empty.</font><br/>";
		}
				
		if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		if(empty($course)) {
			echo "<font color='red'>course field is empty.</font><br/>";
		}
		
		if(empty($gender)) {
			echo "<font color='red'>gender field is empty.</font><br/>";
		}
		if(empty($year)) {
			echo "<font color='red'>year field is empty.</font><br/>";
		}


	 }
	 else { 
	
		$sql = "INSERT INTO students(fname,lname,age,email,course,gender,year)
		VALUES ('$fname','$lname','$age','$email','$course','$gender','$year')";

		if ($conn->query($sql) === TRUE) {
			header("Location:index.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}


}

?>
</body>
</html>
