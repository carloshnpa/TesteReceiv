<?php

namespace App\Views\Devedores;

use App\Controllers\DevedoresController;
use DateTime;

require(BASE_PATH . '/app/views/template/header.php');
$ctrl = new DevedoresController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome'])) {
        $devedores = $ctrl->search($_POST['nome']);
    }elseif(isset($_POST['adiciona'])){
        $resposta = $ctrl->save($_POST);
        $devedores = $ctrl->all();
    }elseif(isset($_POST['delete'])){
        $respostaDel = $ctrl->delete($_POST['id']);
        $devedores = $ctrl->all();
    }
} else {
    $devedores = $ctrl->all();
}
?>

<div class="container-devedores">
    <?php
        // Mensagem de Retorno para Cadastro 
        if(isset($resposta)){
            if($resposta == 1){
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>OK!</strong> Cadastro Realizado com sucesso.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
            }else{
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> Não foi possível realizar cadastro.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            }
        }

        // Mensagem de retorno exclusão 

        if(isset($respostaDel)){
            if($respostaDel == 1){
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>OK!</strong> Exclusão Realizada com sucesso.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
            }else{
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> Não foi possível deletar cadastro.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            }
        }
    ?>
    <!-- / Fim mensagem de retorno  -->
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-outline-dark bg-white p-3 m-3 btn-custom" data-toggle="modal" data-target="#modelId">
                Adicionar Devedor
            </button>
        </div>
    </div>
    <div class="row">
        <?php foreach ($devedores as $devedor) { ?>
            <div class="col-12 col-md-4 my-md-3 my-2">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h5 class="text-dark"><?= $devedor->nome ?></h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">Cidade:<span><?= $devedor->cidade ?></span></h5>
                        <p class="card-text">Idade: <?php $d1 = new DateTime(date('Y-d-m'));
                                                    $d2 = new DateTime($devedor->nascimento);
                                                    echo $d1->diff($d2)->format('%y') ?> </p>
                        <form action="/devedores" method="post">
                            <input type="hidden" name="id" value="<?= $devedor->cpf_cnpj ?>">
                            <button type="submit" name="view" class="btn btn-outline-dark">Ver Dividas</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Modal cadastro de devedor -->
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="/devedores" method="post">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro de Devedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" class="form-control" name=":cpf" id="" onkeypress="$(this).mask('000.000.000-00')" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name=":nome" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="date" class="datepicker form-control" onkeypress='$(this).mask("00/00/0000")' name=":nascimento" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">CEP</label>
                        <input type="text" class="form-control" name=":cep" onkeypress='$(this).mask("00000-000")' id="cep" required>
                    </div>
                    <div class="form-group">
                        <label for="">Endereço</label>
                        <input type="text" class="form-control" name=":endereco" id="endereco" required>
                    </div>
                    <div class="form-group">
                        <label for="">Cidade</label>
                        <input type="text" class="form-control" name=":cidade" id="cidade" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" name="adiciona" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
$scripts = array(
    "assets/js/cadastro.js",
    "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"
);
require(BASE_PATH . '/app/views/template/footer.php');
?>