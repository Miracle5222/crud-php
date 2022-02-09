<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

    $id = $_POST['id'];

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
    
    
         } else {	
        
            $sql = "UPDATE students SET fname = '$fname', lname = '$lname', age= '$age', email = '$email' ,course = '$course', gender = '$gender' , year = '$year' WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                header("Location: index.php");
            } else {
            echo "Error updating record: " . $conn->error;
            }

            $conn->close();
           
           
        }
}
?>
<?php

$id = $_GET['id'];

$sql = "SELECT * FROM students where id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 		
     
        $fname =  $row['fname'];
        $lname =  $row['lname'];
        $age =  $row['age'];
        $email =  $row['email'];
        $course =  $row['course'];
        $gender =  $row['gender'];
        $year =  $row['year'];
       
        
    }
}
?>


<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a style= "text-decoration: none; background-color: orange; color: white; padding: 8px 15px;border-radius: 8px;  font-width: bold; display: inline-block" href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
		

            <tr>
                <td>First Name</td>
                <td><input type="text" name="fname" value =<?php echo $fname; ?>></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lname" value =<?php echo $lname?>></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age" value =<?php echo $age?>></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value =<?php echo $email ?>></td>
            </tr>
            <tr>
                <td>Course</td>
                <td><input type="text" name="course" value =<?php echo $course?>></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="text" name="gender" value =<?php echo $gender ?>></td>
            </tr>
            <tr>
                <td>Year</td>
                <td><input type="text" name="year" value =<?php echo $year ?>></td>
            </tr>
            <tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			    <td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
