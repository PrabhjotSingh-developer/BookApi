<?php
session_start();

include "includes/helpers.php";
$apiUrl = "https://stephen-king-api.onrender.com/api/books";
$cacheFile =  "C:/wamp64/www/BookApi/cache/book-cache.json";
$books = fetchBooks($apiUrl,$cacheFile);

// filtering favorites books
$favorites = [];
if(isset($_SESSION['favorites']))
{
    $favoriteIds = $_SESSION['favorites'];

    $favorites = array_filter($books,function($book) use ($favoriteIds){
        return in_array($book['id'],$favoriteIds);
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites</title>
    <link rel="stylesheet" href="./assets/css/style.php">

</head>
<body>
    <h1>Your Favorite Books</h1>
    <section class="book-section">
    <?php 
        // Check if the books array is not empty
        if (!empty($favorites)): 
            // Loop through the outer array (books)
            foreach ($favorites as $book): ?>
                <div class="book-card">
                    <h3>Name: <?php echo htmlspecialchars($book['Title']); ?></h3>
                    <p><strong>Year:</strong> <?php echo htmlspecialchars($book['Year']); ?></p>
                    <p><strong>Publisher:</strong> <?php echo htmlspecialchars($book['Publisher']); ?></p>
                    <p><strong>ISBN:</strong> <?php echo htmlspecialchars($book['ISBN']); ?></p>
                    <p><strong>Pages:</strong> <?php echo htmlspecialchars($book['Pages']); ?></p>

                    <!-- Villains Section -->
                    <?php if (!empty($book['villains'])): ?>
                        <h4>Villains:</h4>
                        <ul>
                            <?php 
                            // Loop through the villains array if it is not empty
                            foreach ($book['villains'] as $villain): ?>
                                <li><?php echo htmlspecialchars($villain['name']); // Display the villain name ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>No villains listed.</p>
                    <?php endif; ?>

                    <form action="includes/handleFavourites.php" method="post">
                          <input type="hidden" name="bookId" value="<?php echo $book['id']?>">
                          <button type="submit" name="like">Remove from favourite</button> 
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No books available.</p>
        <?php endif; ?>
    </section>
</body>
</html>
