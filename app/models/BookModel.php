<?php
class BookModel extends Model
{
    public function getAllBooks()
    {
        $sql = "SELECT
                s.*,
                tl.TenTheLoai,
                nxb.TenNXB,
                vt.KeSach
            FROM sach s
            LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
            LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
            LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
            ORDER BY s.TenSach";

        $this->db->query($sql);

        return $this->db->fetchAll();
    }

    public function getBookById($id)
    {
        $sql = "SELECT
                s.*,
                tl.TenTheLoai,
                nxb.TenNXB,
                vt.KeSach
            FROM sach s
            LEFT JOIN theloai tl ON s.MaTL = tl.MaTL
            LEFT JOIN nhaxuatban nxb ON s.MaNXB = nxb.MaNXB
            LEFT JOIN vitrisach vt ON s.MaVT = vt.MaVT
            WHERE s.id = :id";

        $this->db->query($sql);
        $this->db->bind(':id', $id);

        return $this->db->fetch();
    }

    public function insert($data)
    {
        $sql = "INSERT INTO sach(MaSach, TenSach, )
            VALUES(:MaSach, :TenSach)";

        $this->db->query($sql);

        $this->db->bind(':MaSach', $data['MaSach']);
        $this->db->bind(':TenSach', $data['TenSach']);

        return $this->db->execute();
    }
}
?>