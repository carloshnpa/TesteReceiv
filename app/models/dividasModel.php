<?php
namespace App\Models;

use App\Database;
use PDOException;
use PDO;

class DividasModel{

    public function __construct()
    {
        //
    }

    function index(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT * FROM devedores INNER JOIN dividas ON `cpf_cnpj` = `devedores_cpf/cnpj` ORDER BY STR_TO_DATE(vencimento, '%Y-%m-%d') ASC";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return null;
        }
    }

    function pesquisa($nome){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT * FROM devedores INNER JOIN dividas ON `cpf_cnpj` = `devedores_cpf/cnpj` WHERE id = :id";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($nome);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return null;
        }
    }

    function find($cpf){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT * FROM devedores INNER JOIN dividas ON `cpf_cnpj` = `devedores_cpf/cnpj` WHERE cpf_cnpj = :cpf";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($cpf);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return null;
        }
    }

    function update($data){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "UPDATE dividas SET `devedores_cpf/cnpj` = :cpf, `titulo` = :titulo, `vencimento` = :vencimento, `valor`= :valor WHERE id = :id";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($data);
            return 1;
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return 0;
        }
    }

    function create($data){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "INSERT INTO dividas (`devedores_cpf/cnpj`, `titulo`, `vencimento`, `valor`) VALUES (:cpf, :titulo, :vencimento, :valor)";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($data);
            return 1;
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return 0;
        }
    }

    function delete($id){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "DELETE FROM dividas WHERE id = :id";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($id);
            return 1;
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return 0;
        }
    }
}