<?php
require 'BooksRepository.php';
$repository = new BooksRepository();
$books = $repository->getBooks();
?>

    <h2>Books list:</h2><br>
<?php
foreach ($books as $book) {

    echo "<a href=showBook.php?id=" . $book->getId() . ">";
    echo $book->getId();
    echo " ";
    echo $book->getTitle();


    echo "</a><br>";
}

