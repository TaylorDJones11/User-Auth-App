<?php
class Author{
    private $mysqli;

    public function __construct($mysqli){
        $this->mysqli = $mysqli;
    }

    public function getAuthors()
    {

        $sql = "SELECT * FROM authors";
        $result = $this->mysqli->query($sql);
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;

    }


}
