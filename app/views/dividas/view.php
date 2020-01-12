<?php

namespace App\Views\Dividas;

use App\Controllers\DividasController;
use App\Controllers\DevedoresController;

require('app/views/template/header.php');

$ctrl = new DividasController();
$ctrl2 = new DevedoresController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id'])) {
        if (isset($_POST['atualiza'])) {
            $resposta = $ctrl->update($_POST['id'], $_POST);
        }
        $devedores = $ctrl2->all();
        $divida = $ctrl->pesquisa($_POST['id']);
    } else {
        http_response_code(404);
    }
} else {
}
?>

<div class="container-dividas">
    <!-- Mensagem de Retorno para Atualização  -->
    <?php
    if (isset($resposta)) {
        if ($resposta == 1) {
            echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>OK!</strong> Atualização Realizado com sucesso.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
        } else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strongErro!</strong> Não foi possível atualizar cadastro.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
    }
    ?>
    <!-- / Fim mensagem de retorno  -->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="invoice-title">
                        <h2><?=$divida->titulo?></h2>
                        <h3 class="pull-right">ID #<?=$divida->id?></h3>
                        <div class="">
                            <button class="btn btn-warning text-white" data-toggle="modal" data-target="#modal-edit"><i class="far fa-edit"></i> Editar</button>
                            <button class="btn btn-danger ml-3" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-user-minus"></i> Excluir Regristro</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <address>
                                <strong>Devedor:</strong><br>
                                <?=$divida->nome?><br>
                                <?=$divida->cpf_cnpj?><br>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <address>
                                <strong>Endereço:</strong><br>
                                <?=$divida->endereco . ' - ' . $divida->cidade . ', ' . $divida->cep?><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- Modal Edição de divida -->
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="/dividas" method="post">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edição de Dívida</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Título</label>
                        <input type="text" class="form-control" value="<?= $divida->titulo ?>" name=":titulo" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Valor</label>
                        <input type="text" class="form-control" value="<?= $divida->valor ?>" name=":valor" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Vencimento</label>
                        <input type="date" class="form-control" value="<?= date('d/m/Y', strtotime($divida->vencimento)) ?>" onload='$(this).mask("00/00/0000")' onkeypress='$(this).mask("00/00/0000")' name=":vencimento" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Devedor</label>
                        <select name=":cpf" id="" class="form-control">
                            <? foreach ($devedores as $d) { ?>
                                <option value="<?= $d->cpf_cnpj ?>" <?= ($d->cpf_cnpj == $divida->cpf_cnpj ? 'selected' : '') ?>><?= $d->nome ?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <input type="hidden" value="<?= $divida->id ?>" name="id">
                    <button type="submit" name="atualiza" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- Modal exclusão de divida -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Deseja excluir registro de dívida?
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <form action="/dividas" method="post">
                    <input type="hidden" name="id" value="<?= $divida->id ?>"">
                    <button type=" button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="delete">Continuar</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
require(BASE_PATH . '/app/views/template/footer.php');
?>