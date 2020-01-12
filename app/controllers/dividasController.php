<?php
namespace App\Controllers;

use App\Models\DividasModel;

class DividasController{
    public function __construct()
    {
        //
    }

    public function all(){
        $dividas = new DividasModel();
        return $dividas->index();
    }

    public function getByID($data){
        $dividas = new DividasModel();
    }

    public function getDividasByDevedor($id){
        $dividas = new DividasModel();
        return $dividas->find(array(":cpf" => $id));
    }

    public function delete($data){

    }

    public function update($id, $data){

    }

    public function save($data){

    }

    public function search($name){
        $devedores = new DividasModel();
        return $devedores->pesquisa(array(":nome" => '%'. $name . '%'));
    }

}
