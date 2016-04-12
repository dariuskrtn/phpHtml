<?php

class Book
{

    protected $id;
    protected $title;
    protected $author;
    protected $genre;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
    public function load($id) {
        include ('DB.php');
        $conn = Connect();
        $query = "SELECT Books.bookId AS Id, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year,
            Genres.genre AS Genre FROM Books
            LEFT JOIN BooksAuthors ON Books.bookId=BooksAuthors.bookId
            LEFT JOIN Authors ON Authors.authorId=BooksAuthors.authorId
            LEFT JOIN Genres ON Books.genreId=Genres.genreId
            WHERE Books.bookId=". $id . " GROUP BY Title";
        $result = $conn->query($query);
        $book = mysqli_fetch_assoc($result);
        $this->setId($id);
        $this->setTitle($book['Title']);
        $this->setAuthor($book['Author']);
        $this->setGenre($book['Genre']);
        return $this;
    }

}