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
        $stmt = $db->pdo->prepare(file_get_contents("assets\Sql\McConomyDB.sql"));
        $stmt->execute();
    }

    // Universal Function um beliebige Querys mit oder ohne Parametern auszuführen
    public static function executeAnything($query, $parameterarray = null)
    {
        $db = new Database();
        $stmt = $db->pdo->prepare($query);
        if ($parameterarray <> null) {
            $stmt->execute([$parameterarray]);
        }
        else {
            $stmt->execute();
        }
        return $stmt->fetch();
    }

    public static function validate($nickName, $password)
	{
		$db = new Database();
		$stmt = $db->pdo->prepare("SELECT * FROM User WHERE UserName = ? and password = ?");
		$stmt->execute([$nickName, $password]);
		$res = $stmt->fetch();

		if ($res) {
			return new User($res["userId"], $res["firstName"], $res["lastName"], $res["nickName"], $res["password"], $res["guest"]);
		}
		else {
			return null;
		}
	}
}