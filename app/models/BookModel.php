<?php
class BookModel extends Model
{
    public function getAllBooks()
    {
        $this->db->query("SELECT * FROM sach");

        return $this->db->fetchAll();
    }

    public function getBookById($id)
    {
        $this->db->query("SELECT * FROM sach WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->fetch();
    }
}
?>