<?php
include_once("config.php");

$searchTerm = $_POST['search']; // Get the search term from a form input

$sql = "SELECT id, name, description, price, quantity, barcode FROM products WHERE name LIKE :searchTerm";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
    foreach ($results as $row) {
        echo "ID: {$row['id']} - Name: {$row['name']} - Description: [$row['description']} - Price: [$row['price']} - Quantity: [$row['quantity']} - Barcode: [$row['barcode']}<br>";
    }
} else {
    echo "No results found.";
}
header("Location: index.php");
?>
