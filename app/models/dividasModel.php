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
        $query = "SELECT * FROM devedores INNER JOIN dividas ON `cpf_cnpj` = `devedores_cpf/cnpj` WHERE `nome` LIKE :nome";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($nome);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
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
}