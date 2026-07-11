<?php
class BookModel extends Model
{
    public function getAllBooks()
    {
        $this->db->query("SELECT * FROM sach");

        return $this->db->fetchAll();
    }


}
?>