<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include_once("config.php"); ?>


<div style= "width: 100vw; display: flex; justify-content: center; flex-direction: column;">
<h1 style='color:green'>Students Record</h1>
<table width='80%' border=0>

	<tr style="background-color: black; color:white;">
		<td>First Name</td>
        <td>Last Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Course</td>
        <td>Gender</td>
        <td>Year</td>
	</tr>
	<?php 

    $sql = "SELECT * FROM students";
    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 		
            echo "<tr>";
            echo "<td>".$row['fname']."</td>";
            echo "<td>".$row['lname']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['email']."</td>";	
            echo "<td>".$row['course']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td>
            <a style= 'text-decoration: none; background-color: green; color: white; padding: 8px 15px;border-radius: 8px;  font-weight: bold; display: inline-block 'href=\"edit.php?id=$row[id]\">Edit</a>
            | <a style= 'text-decoration: none; background-color: red; color: white; padding: 8px 15px;border-radius: 8px;  font-weight: bold; display: inline-block'  href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> </td>";		
            echo "</tr>";
            
        }
    } else {
            echo "<h3 style='color:red'>No Record</h3>";
    }
	?>
	</table>
</div>


  <div style=" width: 100vw; display: flex; justify-content: center; margin-top: 50px;">
      <a style= "text-decoration: none; background-color: black; color: white; padding: 8px 15px;border-radius: 8px;  font-width: bold; display: inline-block" href="./add.html">Add</a>
  </div>
    
</body>
</html>