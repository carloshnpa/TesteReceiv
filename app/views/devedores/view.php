<?php
namespace App\Views\Devedores;
use App\Controllers\DevedoresController;

require('app/views/template/header.php');
$ctrl = new DevedoresController();
$devedores = array();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['id'])){
        $devedores = $ctrl->getByID($_POST['id']);
    }
}
?>

<!-- TODO: Criar View, Edit e Delete de Devedor  -->

<div class="container-devedores">
    <div class="row">
        <div class="col-12">
            
        </div>
    </div>
    <div class="row">
        <?php 
            if(!empty($devedores)) { 
                foreach($devedores as $devedor) { 
        ?>
        <div class="col-12 col-md-4 my-md-3 my-2 ">
            <div class="card">
                <div class="card-header <?=($devedor->vencimento < date("Y-m-d") ? 'vencida' : 'bg-success')?>">
                    <h5 class="card-title"><?=$devedor->titulo?></h5>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?=$devedor->nome?></h4>
                    <h5 class="card-title">Valor<span>R$:</span><?=$devedor->valor?></h5>
                    <p class="card-text">Vencimento: <?=date('d/m/Y', strtotime($devedor->vencimento))?> </p>
                    <form action="/dividas" method="post">
                        <input type="hidden" name="id" value="<?=$devedor->id?>">
                        <button type="submit" name="view" class="btn btn-outline-dark">Ver Divida</button>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php
                }
            } else { 
        ?>
        <div class="alert alert-danger" role="alert">
            Não existem dívidas cadastradas para essa pessoa.
        </div>
    <?php } ?>
    </div>
</div>
<?php
require(BASE_PATH . '/app/views/template/footer.php');
?>
