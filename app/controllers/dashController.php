<?php
namespace App\Controllers;

use App\Models\DashModel;

class DashController{
    public function __construct()
    {
        ///
    }

    public function somaVencidos(){
        $dash =  new DashModel();
        return $dash->vencidos();
    }

    public function somaAVencer(){
        $dash = new DashModel();
        return $dash->aVencer();
    }

    public function maisJovens(){
        $dash =  new DashModel();
        return $dash->jovens();
    }

    public function maioresDividas(){
        $dash =  new DashModel();
        return $dash->maiores();
    }

    public function maiorOcorrencia(){
        $dash =  new DashModel();
        return $dash->ocorrencia();
    }

    public function pertoDoVencimento(){
        $dash =  new DashModel();
        return $dash->vencimento();
    }

}