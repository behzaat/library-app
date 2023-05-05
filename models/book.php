<?php

class Book
{
    public $db = null;

    public $id = 0;
    public $name = "";
    public $pages = 0;
    public $count = 0;
    public $author_id = 0;
    public $image = "";

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch books data using getBookList Method
    public function getList()
    {
        $result = $this->db->con->query("SELECT * FROM books");

        $resultArray = array();

        // fetch book data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // create book
    public function create()
    {
        if ($this->db->con != null) {
            $query_string = "INSERT INTO books (book_name, book_pages, book_count, author_id, book_image) 
                VALUES ('$this->name', '$this->pages', '$this->count', '$this->author_id', '$this->image');";

            $result = $this->db->con->query($query_string);

            return $result;
        }
    }

    // update book
    public function update()
    {
        if (isset($this->id)) {
            if ($this->db->con != null) {
                $query_string = "UPDATE books SET book_name='$this->name', book_pages='$this->pages', book_count='$this->count',book_image='$this->image',author_id='$this->author_id'  WHERE id='$this->id'";

                $result = $this->db->con->query($query_string);

                return $result;
            }
        }
    }

    // get book
    public function get()
    {
        if (isset($this->id)) {
            $result = $this->db->con->query("SELECT * FROM books WHERE id={$this->id}");

            $resultArray = array();

            // fetch book data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }

            return $resultArray[0];
        }
    }

    // delete book
    public function delete()
    {
        if (isset($this->id)) {
            $result = $this->db->con->query("DELETE FROM books WHERE id={$this->id}");
            return $result;
        }
    }

}
