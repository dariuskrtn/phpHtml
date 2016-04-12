<?php

/**
 * Created by PhpStorm.
 * User: darius0021
 * Date: 16.4.12
 * Time: 17.39
 */
include ('DB.php');
include ('Book.php');
class BooksRepository
{

    public function getBook($id) {

        $conn = Connect();
        $query = "SELECT Books.bookId AS Id, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year,
            Genres.genre AS Genre FROM Books
            LEFT JOIN BooksAuthors ON Books.bookId=BooksAuthors.bookId
            LEFT JOIN Authors ON Authors.authorId=BooksAuthors.authorId
            LEFT JOIN Genres ON Books.genreId=Genres.genreId
            WHERE Books.bookId=". $id . " GROUP BY Title";
        $result = $conn->query($query);
        $book = mysqli_fetch_assoc($result);
        $newBook = new Book();
        $newBook->setId($id);
        $newBook->setTitle($book['Title']);
        $newBook->setAuthor($book['Author']);
        $newBook->setGenre($book['Genre']);
        return $newBook;
    }
    public function getBooks() {
        $conn = Connect();
        $query = "SELECT Books.bookId AS Id, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year,
            Genres.genre AS Genre FROM Books
            LEFT JOIN BooksAuthors ON Books.bookId=BooksAuthors.bookId
            LEFT JOIN Authors ON Authors.authorId=BooksAuthors.authorId
            LEFT JOIN Genres ON Books.genreId=Genres.genreId
            GROUP BY Title";
        $result = $conn->query($query);
        $books = [];
        foreach ($result as $row) {
            $book = new Book();
            $book->setId($row['Id']);
            $book->setTitle($row['Title']);
            $book->setAuthor($row['Author']);
            $book->setGenre($row['Genre']);
            $books[] = $book;
        }
        return $books;
    }
}