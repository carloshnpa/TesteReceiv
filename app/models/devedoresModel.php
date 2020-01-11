<?php
namespace App\Models;

use App\Database;
use PDOException;
use PDO;

class DevedoresModel{

    public function __construct()
    {
        //
    }

    function index(){
        $DB = new Database();
        $conn = $DB->connection();
        var_dump($conn);
        $query = "SELECT * FROM Devedores INNER JOIN Dividas ON `Devedores.cpf` = `Dividas.cpf`";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            return $e->getMessage();
        }
    }
}