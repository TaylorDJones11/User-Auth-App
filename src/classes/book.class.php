<?php
class Book{
    private $mysqli;

    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }

    public function getBooks()
    {

        $sql = "SELECT * FROM books b LEFT JOIN AUTHORS a ON a.author_id = b.author_id;";
        $result = $this->mysqli->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;

    }

    public function getBook($id)
    {

        $sql = "SELECT * FROM books b LEFT JOIN AUTHORS a ON a.author_id = b.author_id WHERE book_id = $id;";
        $result = $this->mysqli->query($sql);
        $data = $result->fetch_assoc();

        return $data;

    }

    public function addBook($data)
    {
        $sql = "insert into books (bookname, author_id, year, genre, age_group) values ('{$data['bookname']}','{$data['author_id']}','{$data['year']}','{$data['genre']}','{$data['age_group']}')";
        if ($this->mysqli->query($sql) === TRUE) {
            return true;
        }

        return false;
    }

}
