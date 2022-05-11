<?php 
//VERBINDING MAKEN MET DATABASE
class Dbh
{
    private $host = '127.0.0.1';
    private $db   = 'superiorwaste';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4'; 

    protected function connect()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db . ';charset=' . $this->charset;
        $pdo = new PDO($dsn, $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}



?>