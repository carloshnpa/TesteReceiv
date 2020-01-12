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
        $dividas = new DividasModel();
        return $dividas->delete(array(":id" => $data));
    }

    public function update($id, $data){
        $dividas = new DividasModel();
        $data[':vencimento'] = implode('-', array_reverse(explode('/', $data[':vencimento'])));
        $data[':id'] = intval($id);
        $data[':valor'] = floatval($data[':valor']);
        $data[':cpf'] = intval($data[':cpf']);
        unset($data['atualiza']);
        unset($data['id']);
        return $dividas->update($data);
    }

    public function save($data){
        $dividas = new DividasModel();
        $data[':vencimento'] = implode('-', array_reverse(explode('/', $data[':vencimento'])));
        $data[':valor'] = floatval($data[':valor']);
        unset($data['adiciona']);
        return $dividas->create($data);
    }

    public function pesquisa($id){
        $devedores = new DividasModel();
        return $devedores->pesquisa(array(":id" => $id));
    }

}
