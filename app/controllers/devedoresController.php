<?php
namespace App\Controllers;

use App\Models\DevedoresModel;

class DevedoresController{
    public function __construct()
    {
        //
    }

    public function all(){
        $devedores = new DevedoresModel();
        return $devedores->index();
    }

    public function getByID($data){
        $devedores = new DevedoresModel();
        return $devedores->getByID(array(":id" => $data));
    }

    public function delete($data){
        $devedores = new DevedoresModel();
        return $devedores->delete(array(":id" => $data));
    }

    public function update($id, $data){
        $devedores = new DevedoresModel();
        $data[':cpf'] = intval(preg_replace("/[^a-zA-Z0-9]/", "", $data[':cpf']));
        $data[':nascimento'] = implode('-', array_reverse(explode('/', $data[':nascimento'])));
        unset($data['atualiza']);
        unset($data['id']);
        $data[':id'] = $id;
        return $devedores->update($id, $data);
    }

    public function save($data){
        $devedores = new DevedoresModel();
        $data[':cpf'] = intval(preg_replace("/[^a-zA-Z0-9]/", "", $data[':cpf']));
        $data[':nascimento'] = implode('-', array_reverse(explode('/', $data[':nascimento'])));
        unset($data['adiciona']);
        return $devedores->create($data);
    }

    public function search($name){
        $devedores = new DevedoresModel();
        return $devedores->pesquisa(array(":nome" => '%'. $name . '%'));
    }

}
