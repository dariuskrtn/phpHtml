<?php


class BooksList
{
    private $books;

    /**
     * @return mixed
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param mixed $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }


    public function load() {
        include ('DB.php');
        $conn = Connect();
        $query = "SELECT Books.bookId AS Id, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year,
            Genres.genre AS Genre FROM Books
            LEFT JOIN BooksAuthors ON Books.bookId=BooksAuthors.bookId
            LEFT JOIN Authors ON Authors.authorId=BooksAuthors.authorId
            LEFT JOIN Genres ON Books.genreId=Genres.genreId
            GROUP BY Title";
        $result = $conn->query($query);
        foreach ($result as $row) {
            $book = new Book();
            $book->setId($row['Id']);
            $book->setTitle($row['Title']);
            $book->setAuthor($row['Author']);
            $book->setGenre($row['Genre']);
            $this->books[] = $book;
        }
        return $this;
    }
}