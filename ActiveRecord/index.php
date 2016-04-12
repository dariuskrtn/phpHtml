<?php
require ('Book.php');
require ('BooksList.php');
?>
<h2>Books list:</h2><br>
<?php
$books = new BooksList();
$books->load();

foreach ($books->getBooks() as $book) {

    echo "<a href=showBook.php?id=" . $book->getId() . ">";
    echo $book->getId();
    echo " ";
    echo $book->getTitle();


    echo "</a><br>";
}

