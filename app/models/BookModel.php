<?php
class BookModel extends Model
{
    public function getAllBooks()
    {
        $this->db->query("SELECT * FROM books");

        return $this->db->fetchAll();
    }

    public function index()
    {
        echo "Đã vào index";
    }
}
?>