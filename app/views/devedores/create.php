<?php
namespace App\Views\Devedores;
use App\Controllers\DevedoresController;

require(BASE_PATH . '/app/views/template/header.php');
$ctrl = new DevedoresController();
$devedores = $ctrl->all();
?>

<div class="container-devedores">
    <div class="row">
    <?php foreach($devedores as $devedor) { ?>
        <div class="col-12 col-md-4 my-md-3 my-2 ">
            <div class="card">
                <div class="card-header <?=($devedor->vencimento < date("Y-m-d") ? 'vencida' : 'bg-success')?>">
                    <h5 class="card-title"><?=$devedor->titulo?></h5>
                </div>
                <div class="card-body">
                    <h4 class="card-title"><?=$devedor->nome?></h4>
                    <h5 class="card-title">Valor<span>R$:</span><?=$devedor->valor?></h5>
                    <p class="card-text">Vencimento: <?=date('d/m/Y', strtotime($devedor->vencimento))?> </p>
                    <a href="/divida/<?=$devedor->id?>" class="btn btn-outline-warning">Ver tudo</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

<?php
require(BASE_PATH . '/app/views/template/footer.php');
?>