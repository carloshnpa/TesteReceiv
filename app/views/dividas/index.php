<?php

namespace App\Views\Dividas;

use App\Controllers\DevedoresController;
use App\Controllers\DividasController;

require('app/views/template/header.php');
$ctrl = new DividasController();
$ctrl2 = new DevedoresController();

$dividas = array();
$devedores = $ctrl2->all();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
        if (isset($_POST['delete'])) {
            $respostaDel = $ctrl->delete($_POST['id']);
            $dividas = $ctrl->all();
        } else {
            $dividas = $ctrl->pesquisa($_POST['id']);
        }
    } elseif (isset($_POST['adiciona'])) {
        $resposta = $ctrl->save($_POST);
        $dividas = $ctrl->all();

    } else {
        http_response_code(404);
    }
} else {
    $dividas = $ctrl->all();
}
?>

<div class="container-dividas">
    <?php
    // Mensagem de Retorno para Cadastro 
    if (isset($resposta)) {
        if ($resposta == 1) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>OK!</strong> Inserção realizada com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Não foi possível realizar inserção.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
        }
    }

    // Mensagem de retorno exclusão 

    if (isset($respostaDel)) {
        if ($respostaDel == 1) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>OK!</strong> Exclusão Realizada com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erro!</strong> Não foi possível deletar registro.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
        }
    }
    ?>
    <div class="row mb-3">
        <div class="col-12 d-flex justify-content-end">
            <button type="button" class="btn btn-outline-dark bg-white p-3 m-3 btn-custom" data-toggle="modal" data-target="#modelId">
                Adicionar divida
            </button>
        </div>
    </div>
    <div class="row">
        <?php foreach ($dividas as $divida) { ?>
            <div class="col-12 col-md-4 my-md-3 my-2">
                <div class="card">
                    <div class="card-header <?= ($divida->vencimento < date("Y-m-d") ? 'vencida' : 'bg-success') ?>">
                        <h5 class="text-dark"><?= $divida->titulo ?></h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Devedor: <?= $divida->nome ?></h5>
                        <p class="card-text">Valor:<span> R$ <?= $divida->valor ?></span></p>
                        <p class="card-text">Vencimento:<span> <?= date('d/m/Y', strtotime($divida->vencimento)) ?></span></p>
                        <form action="/dividas" method="post">
                            <input type="hidden" name="id" value="<?= $divida->id ?>">
                            <button type="submit" name="view" class="btn btn-outline-dark">Ver Divida</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<!-- Modal cadastro de divida -->
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="/dividas" method="post">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adição de Dívida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input type="text" class="form-control" name=":titulo" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Valor</label>
                        <input type="text" class="form-control" name=":valor" id="" onkeypress="$(this).mask('##0.00', {reverse : true})" required>
                    </div>
                    <div class="form-group">
                        <label for="">Vencimento</label>
                        <input type="date" class="form-control" onkeypress='$(this).mask("00/00/0000")' name=":vencimento" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Devedor</label>
                        <select name=":cpf" id="" class="form-control">
                            <option value="" selected disabled>Selecione um devedor</option>
                            <? foreach ($devedores as $d) { ?>
                                <option value="<?= $d->cpf_cnpj ?>" ><?= $d->nome ?></option>
                            <? } ?>
                        </select>
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
    "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"
);
require(BASE_PATH . '/app/views/template/footer.php');
?>