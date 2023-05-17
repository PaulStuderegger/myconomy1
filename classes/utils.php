<?php
require_once "db.php";
class Utils extends Database
{
    // Holt sich die ID für den nächsten Eintrag in eine Tabelle
    public static function nextId($table)
    {
        $db = new Database();
        
        $stmt = $db->pdo->prepare("SHOW VARIABLES LIKE 'version'");
        $stmt->execute();
        $stmt->fetch();
        
        $stmt = $db->pdo->prepare("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE lower(table_name) = lower(?) AND table_schema = DATABASE()");
        $stmt->execute([$table]);

        return $stmt->fetch()["AUTO_INCREMENT"];
    }

    // Sollte die Datenbank reseten - Für tests
    public static function resetDb()
    {
        $db = new Database();
        $stmt = $db->pdo->prepare(file_get_contents("..\assets\Sql\McConomyDB.sql"));
        $stmt->execute();
    }

    // Universal Function um beliebige Querys mit oder ohne Parametern auszuführen
    public static function executeAnything($query, $parameterarray = null)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare($query);
        $stmt->execute($parameterarray);
        return $stmt->fetch();
    }
}