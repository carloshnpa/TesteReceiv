<?php
namespace App\Controllers;

use App\Models\DividasModel;

class DividasController{
    public function __construct()
    {
        //
    }

    public function all(){
        $devedores = new DividasModel();
        return $devedores->index();
    }

    public function getByID($data){
        $devedores = new DividasModel();
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
