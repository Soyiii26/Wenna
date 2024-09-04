<?php
include_once("config.php");

$result = $dbConn->query("SELECT * FROM products ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>
<form action="POST">
	<!--<label for="search">Search Data</label>
	<input type="search" name="search" id="search">
	<input type="button" value="Search" id="search">-->
</form>
	<table width='80%'>

	<tr>
	    <td>ID</td>
		<td>Name</td>
		<td>Description</td>
		<td>Price</td>
		<td>Quantity</td>
		<td>Barcode</td>
		<td>Actions</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['price']."</td>";	
		echo "<td>".$row['quantity']."</td>";	
		echo "<td>".$row['barcode']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
