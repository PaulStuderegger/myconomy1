<?php
class Database
{
    protected $db_host = 'localhost';
    protected $db_name = "MyConomy";
    protected $db_user = "root"; // eigener Nutzername von Server
    protected $db_password = "password"; // eigenes Passwort für Server
    protected $db_port = 3307; // eigener Port des Server
    public $pdo;

    // create connection
    public function __construct()
    {
        try {
            $pdo = new PDO("mysql:host=$this->db_host;port=$this->db_port;dbname=$this->db_name", $this->db_user, $this->db_password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
            $this->pdo = $pdo;
        } catch (PDOException $pe){
            echo "fuck";
            echo $pe->getMessage();
        }
    }
}
