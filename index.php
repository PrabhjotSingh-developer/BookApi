
<html>
    <head>
  <link rel="stylesheet" href="./assets/css/style.php">
  <head>
<body>
<?php 
  include 'includes/header.php';
  include 'includes/helpers.php';
  $apiUrl = "https://stephen-king-api.onrender.com/api/books";
  $cacheFile =  "C:/wamp64/www/BookApi/cache/book-cache.json";

  $books = fetchBooks($apiUrl,$cacheFile);
  $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
  if ($searchTerm) {
    $books = array_filter($books, function($book) use ($searchTerm) {
        $titleMatch = stripos($book['Title'], $searchTerm) !== false;
        $publisherMatch = stripos($book['Publisher'], $searchTerm) !== false;
        $yearMatch = stripos($book['Year'], $searchTerm) !== false;

        return $titleMatch || $publisherMatch || $yearMatch;
    }
      
);
}
?>
  

<main>
    <section class="book-section">
    <?php 
        // Check if the books array is not empty
        if (!empty($books)): 
            // Loop through the outer array (books)
            foreach ($books as $book): ?>
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
                          <input type="hidden" name="action" value="like">
                          <button type="submit" >Add to favourite</button> 
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No books available.</p>
        <?php endif; ?>
    </section>
</main>


<body>
    </html>


<?php 
  include 'includes/footer.php';
?>