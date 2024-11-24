<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <header>
      <h1>Book Api</h1>
      <nav>
          <a href="index.php">Home</a>
          <a href="villainspage.php">Villians</a>
          <a href="favourite.php">favourite books</a>
          <form method="GET" action="index.php">
         <input type="text" name="search" placeholder="Search by book name, title, or author" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
         <button type="submit">Search</button>
</form>
      </nav>
</header>
