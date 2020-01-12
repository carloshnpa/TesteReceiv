<?php
namespace App\Views\Dash;
use App\Controllers\DashController;

require('app/views/template/header.php');
$ctrl = new DashController();
$maiores = $ctrl->maioresDividas();
?>
<div class="container-dividas">
    <div class="row">
        <?php foreach ($maiores as $divida) { ?>
            <div class="col-12 col-md-4 my-md-3 my-2">
                <div class="card">
                    <div class="card-header <?= ($divida->vencimento < date("Y-m-d") ? 'vencida' : 'bg-success') ?>">
                        <h5 class="text-dark"><?= $divida->titulo ?></h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Devedor: <?= $divida->nome ?></h5>
                        <p class="card-text">Valor:<span> R$<?= $divida->valor ?></span></p>
                        <p class="card-text">Vencimento:<span> <?= date('d/m/Y', strtotime($divida->vencimento)) ?></span></p>
                        <form action="/dividas" method="post">
                            <input type="hidden" name="id" value="<?= $divida->id ?>">
                            <button type="submit" name="view" class="btn btn-outline-dark">Ver Dividada</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require(BASE_PATH . '/app/views/template/footer.php');
?>
