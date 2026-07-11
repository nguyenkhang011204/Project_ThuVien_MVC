<?php
class Database
{

    private PDO $conn;
    private PDOStatement $stmt;

    public function __construct()
    {
        require_once __DIR__ . '/config.php';

        $dsn = 'mysql:host=' . DB_HOST .
            ';dbname=' . DB_NAME .
            ';charset=' . DB_CHARSET;

        try {
            $this->conn = new PDO($dsn, DB_USER, DB_PASS);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die("Lỗi kết nối Database: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function query($sql): void
    {
        $this->stmt = $this->conn->prepare($sql);
    }

    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }

    public function execute(): bool
    {
        return $this->stmt->execute();
    }

    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->conn->beginTransaction();
    }

    public function commit()
    {
        return $this->conn->commit();
    }

    public function rollback()
    {
        return $this->conn->rollBack();
    }

    public function getStatement()
    {
        return $this->stmt;
    }
}

?>