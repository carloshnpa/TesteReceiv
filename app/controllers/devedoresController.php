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
        $allDevedores = $devedores->index();
        return $allDevedores;
    }

    public function getByID($data){

    }

    public function delete($data){

    }

    public function update($id, $data){

    }

    public function save($data){

    }


}
