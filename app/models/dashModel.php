<?php
namespace App\Models;

use App\Database;
use PDOException;
use PDO;

class DashModel{

    public function __construct()
    {
        //
    }

    function vencidos(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT SUM(valor) as soma, AVG(valor) as media FROM dividas WHERE STR_TO_DATE(vencimento, '%Y-%m-%d') <= :hoje AND EXTRACT(YEAR FROM vencimento) = :ano_atual";
        $dates = array(
            ":hoje"      => date('Y-m-d'),
            ":ano_atual" => date('Y')
        );
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($dates);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function aVencer(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT SUM(valor) as soma, AVG(valor) as media FROM dividas WHERE STR_TO_DATE(vencimento, '%Y-%m-%d') >= :hoje AND EXTRACT(YEAR FROM vencimento) = :ano_atual";
        $dates = array(
            ":hoje"      => date('Y-m-d'),
            ":ano_atual" => date('Y')
        );
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($dates);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function jovens(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT SUM(valor) as soma, AVG(valor) as media FROM dividas WHERE STR_TO_DATE(vencimento, '%Y-%m-%d') >= :hoje AND EXTRACT(YEAR FROM vencimento) = :ano_atual";
        $dates = array(
            ":hoje"      => date('Y-m-d'),
            ":ano_atual" => date('Y')
        );
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($dates);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function ocorrencia(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT SUM(valor) as soma, AVG(valor) as media FROM dividas WHERE STR_TO_DATE(vencimento, '%Y-%m-%d') >= :hoje AND EXTRACT(YEAR FROM vencimento) = :ano_atual";
        $dates = array(
            ":hoje"      => date('Y-m-d'),
            ":ano_atual" => date('Y')
        );
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($dates);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function maiores(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT SUM(valor) as soma, AVG(valor) as media FROM dividas WHERE STR_TO_DATE(vencimento, '%Y-%m-%d') >= :hoje AND EXTRACT(YEAR FROM vencimento) = :ano_atual";
        $dates = array(
            ":hoje"      => date('Y-m-d'),
            ":ano_atual" => date('Y')
        );
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($dates);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function vencimento(){
        $DB = new Database();
        $conn = $DB->connection();
        $query = "SELECT SUM(valor) as soma, AVG(valor) as media FROM dividas WHERE STR_TO_DATE(vencimento, '%Y-%m-%d') >= :hoje AND EXTRACT(YEAR FROM vencimento) = :ano_atual";
        $dates = array(
            ":hoje"      => date('Y-m-d'),
            ":ano_atual" => date('Y')
        );
        $stmt = $conn->prepare($query);
        try{
            $stmt->execute($dates);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }
}