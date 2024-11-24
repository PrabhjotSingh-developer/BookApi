<?php
include 'includes/helpers.php';
include 'includes/villains.php';
// Fetch books and villains
$apiUrl = "https://stephen-king-api.onrender.com/api/books";
$cacheFile =  "C:/wamp64/www/BookApi/cache/book-cache.json";

$books = fetchBooks($apiUrl, $cacheFile);
$villainsList = getAllVillains($books);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Villains List</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Villains List</h1>
    <ul>
        <?php foreach ($villainsList as $villain): ?>
            <li><?php echo htmlspecialchars($villain); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php">Back to Books</a>
</body>
</html>
