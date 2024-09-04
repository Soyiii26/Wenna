<html>
<head>
	<title>Add New</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = $_POST['name'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$barcode = $_POST['barcode'];

	if(empty($name) || empty($description) || empty($price) || empty($quantity) || empty($barcode)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}

		if(empty($quantity)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}

		if(empty($barcode)) {
			echo "<font color='red'>Barcode field is empty.</font><br/>";
		}
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
				
		$sql = "INSERT INTO products(name, description, price, quantity, barcode) VALUES(:name, :description, :price, :quantity, :barcode)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':name', $name);
		$query->bindparam(':description', $description);
		$query->bindparam(':price', $price);
		$query->bindparam(':quantity', $quantity);
		$query->bindparam(':barcode', $barcode);
		$query->execute();
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
