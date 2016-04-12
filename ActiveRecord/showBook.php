<?php
require ('Book.php');

$bookId = $_GET['id'];
$book = new Book();
$book->load($bookId);
echo "Book " . $bookId . ":<br>";
echo "Title: " . $book->getTitle() . "<br>";
echo "Author: " . $book->getAuthor() . "<br>";
echo "Genre: " . $book->getGenre() . "<br>";
