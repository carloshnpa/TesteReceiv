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
        $query = "SELECT nome, cpf_cnpj, nascimento, cidade FROM devedores";
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
        $query = "SELECT nome, cidade, cpf_cnpj, nascimento FROM devedores  WHERE `nome` LIKE :nome";
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

    function getByID($id){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT * FROM devedores WHERE `cpf_cnpj` = :id";
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($id);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            if(ENV == 'development'){
                echo $e->getMessage();
            }
            return null;
        }
    }

    function create($data){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "INSERT INTO devedores(`cpf_cnpj`, `nome`, `nascimento`, `cep`, `endereco`, `cidade`) VALUES (:cpf, :nome, :nascimento, :cep, :endereco, :cidade) ";
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

    function update($id, $data){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "UPDATE devedores SET `cpf_cnpj` = :cpf, `nome` = :nome, `nascimento` = :nascimento, `cep` = :cep, `endereco` = :endereco, `cidade` = :cidade WHERE cpf_cnpj = :id";
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
        $query = "DELETE FROM devedores WHERE cpf_cnpj = :id";
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