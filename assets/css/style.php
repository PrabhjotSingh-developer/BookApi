
<?php
// Set the content type header for CSS
header("Content-type: text/css; charset: UTF-8");
?>
@media (min-width:640px) {
    .book-section{
    display:grid;
    grid-template-columns:repeat(2,2fr) ;
   

}
}
@media (min-width:1024px) {
    .book-section{
    display:grid;
    grid-template-columns:repeat(3,3fr) ;
   

}
}


.book-card{
  border:1px solid black;
  padding:10px 20px;
}

