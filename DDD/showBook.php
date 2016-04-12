<?php
require ('BooksRepository.php');

$bookId = $_GET['id'];
$repository = new BooksRepository();
$book = $repository->getBook($bookId);
echo "Book " . $bookId . ":<br>";
echo "Title: " . $book->getTitle() . "<br>";
echo "Author: " . $book->getAuthor() . "<br>";
echo "Genre: " . $book->getGenre() . "<br>";
