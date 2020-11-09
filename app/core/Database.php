<?php
  
class Database {
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    // database handler
    protected $dbh;
    protected $stmt;

    public function __construct()
    {
        $dsn = "mysql:host={$this->db_host};dbname={$this->db_name}";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];

        try {
            $this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $options);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if ( is_null($type) ) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
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
}