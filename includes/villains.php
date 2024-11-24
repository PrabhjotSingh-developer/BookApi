<?php
// Assuming $books is the array containing all book data

// Function to extract all unique villains
function getAllVillains($books) {
    $villains = [];
    foreach ($books as $book) {
        if (isset($book['villains']) && is_array($book['villains'])) {
            foreach ($book['villains'] as $villain) {
                if (isset($villain['name'])) {
                    $villains[] = $villain['name'];
                }
            }
        }
    }
    return array_unique($villains); // Remove duplicates
}

// Handle form submission for villains
if (isset($_POST['show_villains'])) {
    $villainsList = getAllVillains($books);
}
?>
