<?php
    session_start();
    if(!isset($_SESSION['favorites']))
    {
         $_SESSION['favorites'] = [];
    }
    if(isset($_POST['action']) && isset($_POST['bookId']))
    {
        
        $bookId = $_POST['bookId'];
        if($_POST['action']==='like')
        {
          if(!in_array($bookId,$_SESSION['favorites']))
          {
            $_SESSION['favorites'][] = $bookId;
            echo "<script>alert('Added to favourite successfully'); window.location.href = '../index.php';</script>";
          }
          else{
           echo "<script>alert('Already added to favourite'); window.location.href = '../index.php';</script>";

          }
       }
       else if($_POST['action']==='remove')
       {
        if (($key = array_search($bookId, $_SESSION['favorites'])) !== false) {
            unset($_SESSION['favorites'][$key]); // Remove book from favorites
            $_SESSION['favorites'] = array_values($_SESSION['favorites']); // Reindex array
            echo "<script>
                    alert('Removed from favorites successfully');
                    window.location.href = '../favourite.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Book not found in favorites');
                    window.location.href = '../favourite.php';
                  </script>";
        }
       }
       exit;
    }
    else{
        echo "invalid request";
    }
?>