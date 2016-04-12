<?php
require 'DB.php';
?>

    <h2>Books list:</h2><br>

<?php
$conn = Connect();
$query = "SELECT * FROM Books";
$result = $conn->query($query);

foreach ($result as $book) {

    echo "<a href=showBook.php?id=" . $book["bookId"] . ">";
    echo $book["bookId"];
    echo " ";
    echo $book["title"];


    echo "</a><br>";
}

