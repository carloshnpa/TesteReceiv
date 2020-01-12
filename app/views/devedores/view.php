<?php
namespace App\Views\Devedores;

use App\Controllers\DevedoresController;
use App\Controllers\DividasController;
use DateTime;

require('app/views/template/header.php');

$ctrl = new DevedoresController();
$ctrl2 = new DividasController();

$devedor = null;
$dividas = array();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['id'])){
        if(isset($_POST['atualiza'])){
            $resposta = $ctrl->update($_POST['id'], $_POST);
        }
        $devedor = $ctrl->getByID($_POST['id']);
        $dividas = $ctrl2->getDividasByDevedor($_POST['id']);
    }
    else{
        http_response_code(404);
    }
}

?>

<!-- TODO: Criar View, Edit e Delete de Devedor  -->

<div class="container-devedores">
    <!-- Mensagem de Retorno para Atualização  -->
    <?php
        if(isset($resposta)){
            if($resposta == 1){
                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>OK!</strong> Atualização Realizado com sucesso.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
            }else{
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
    <div class="row my-2 mb-md-3">
        <div class="col-12">
            <div class="card card-info-devedor">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h5 class="card-title"><?=$devedor->nome?></h5>
                            <p class="card-text"><span>CPF:</span> <?=$devedor->cpf_cnpj?></p>
                            <p class="card-text"><span>Endereço:</span> <?=$devedor->endereco . ' ' . $devedor->cidade?></p>
                            <p class="card-text"><span>Idade:</span> <?php $d1 = new DateTime(date('Y-d-m'));
                                                            $d2 = new DateTime($devedor->nascimento);
                                                            echo $d1->diff($d2)->format('%y') ?> anos</p>
                        </div>
                        <div class="col-12 col-md-6 ml-auto mt-3 mt-md-0">
                                <button class="btn btn-warning text-white" data-toggle="modal" data-target="#modal-edit"><i class="far fa-edit"></i> Editar</button>
                                <button class="btn btn-danger ml-3" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-user-minus"></i> Excluir Regristro</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php 
            if(!empty($dividas)) { 
                foreach($dividas as $div) { 
        ?>
        <div class="col-12 col-md-4 my-md-3 my-2 ">
            <div class="card">
                <div class="card-header <?=($div->vencimento < date("Y-m-d") ? 'vencida' : 'bg-success')?>">
                    <h5 class="card-title"><?=$div->titulo?></h5>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Valor<span>R$:</span><?=$div->valor?></h5>
                    <p class="card-text">Vencimento: <?=date('d/m/Y', strtotime($div->vencimento))?> </p>
                    <form action="/dividas" method="post">
                        <input type="hidden" name="id" value="<?=$div->id?>">
                        <button type="submit" name="view" class="btn btn-outline-dark">Ver Divida</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php
                }
            } else { 
        ?>
        <div class="alert alert-danger m-3" role="alert">
            Não existem dívidas cadastradas para essa pessoa.
        </div>
    <?php } ?>
    </div>
</div>


<!-- Modal Edição de devedor -->
<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="/devedores" method="post">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edição de Devedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">CPF</label>
                        <input type="text" class="form-control" value="<?=$devedor->cpf_cnpj?>" name=":cpf" id="" onload='$(this).mask("000.000.000-00")' onkeypress='$(this).mask("000.000.000-00")' readonly="readonly">
                    </div>
                    <div class="form-group">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" value="<?=$devedor->nome?>" name=":nome" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="date" class="form-control" value="<?=date('d/m/Y', strtotime($devedor->nascimento))?>" onload='$(this).mask("00/00/0000")' onkeypress='$(this).mask("00/00/0000")' name=":nascimento" id="" required>
                    </div>
                    <div class="form-group">
                        <label for="">CEP</label>
                        <input type="text" class="form-control" value="<?=$devedor->cep?>" name=":cep" onload='$(this).mask("00000-000")' id="cep" onkeypress='$(this).mask("00000-000")' id="cep" required>
                    </div>
                    <div class="form-group">
                        <label for="">Endereço</label>
                        <input type="text" class="form-control" value="<?=$devedor->endereco?>" name=":endereco" id="endereco" required>
                    </div>
                    <div class="form-group">
                        <label for="">Cidade</label>
                        <input type="text" class="form-control" value="<?=$devedor->cidade?>" name=":cidade" id="cidade" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <input type="hidden" value="<?=$devedor->cpf_cnpj?>" name="id">
                    <button type="submit" name="atualiza" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- Modal exclusão de devedor -->
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
                Deseja excluir registro do devedor?
                <div class="alert alert-danger mt-2" role="alert">
                    <strong>Atenção</strong>, a remoção do registro implica na exclusão de todas as dívidas atreladas ao cpf.
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <form action="/devedores" method="post">
                    <input type="hidden" name="id" value="<?=$devedor->cpf_cnpj?>"">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" name="delete">Continuar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$scripts = array(
    "assets/js/cadastro.js",
    "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js",
);
require(BASE_PATH . '/app/views/template/footer.php');
?>
