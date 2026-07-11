<?php
require_once __DIR__ . '/../config/db.php';

class Model
{
    protected Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }


}
?>