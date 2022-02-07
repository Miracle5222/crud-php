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

<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
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
            echo "<td>".$row['Gender']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"edit.php?id=$row[id]\">Add</a> </td>";		
            echo "</tr>";
            
        }
    } else {
            echo "0 results";
    }
	?>
	</table>
    
</body>
</html>