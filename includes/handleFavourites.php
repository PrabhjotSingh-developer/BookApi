<?php
    session_start();
    if(!isset($_SESSION['favorites']))
    {
         $_SESSION['favorites'] = [];
    }
    if(isset($_POST['like']) && isset($_POST['bookId']))
    {
        
        $bookId = $_POST['bookId'];
        echo $bookId;
        if(!in_array($bookId,$_SESSION['favorites']))
        {
            $_SESSION['favorites'][] = $bookId;
            echo "<script>alert('Added to favourite successfully'); window.location.href = '../index.php';</script>";
        }
       else{
        echo "<script>alert('Already added to favourite'); window.location.href = '../index.php';</script>";

       }
      
        exit;
    }
    else{
        echo "invalid request";
    }
?>