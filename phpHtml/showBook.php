<?php
require 'DB.php';
?>
<h2>Book information: </h2>
<?php
$id = $_GET['id'];
$conn = Connect();
$query = "SELECT Books.bookId AS Id, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year,
            Genres.genre AS Genre FROM Books
            LEFT JOIN BooksAuthors ON Books.bookId=BooksAuthors.bookId
            LEFT JOIN Authors ON Authors.authorId=BooksAuthors.authorId
            LEFT JOIN Genres ON Books.genreId=Genres.genreId
            WHERE Books.bookId=". $id . " GROUP BY Title";
$row = $conn->query($query);
$book = mysqli_fetch_assoc($row);

echo "Book " . $id . ":<br>";
echo "Title: " . $book['Title'] . "<br>";
echo "Author: " . $book['Author'] . "<br>";
echo "Genre: " . $book['Genre'] . "<br>";


