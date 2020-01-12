<?php
$css = array(
    "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css",
);
include(BASE_PATH . '/app/views/template/header.php');
use App\Controllers\DashController;
$ctrl = new DashController();
$valor1 = round($ctrl->somaVencidos()->soma, 2);
$valor2 = round($ctrl->somaAVencer()->soma, 2);

?>

<div class="container-fluid">
    <div class="cards-container">
        <div class="row">
            <div class="col-md-3 col-12 col-sm-6">
                <a href="/ocorrencias">
                    <div class="info-box">
                        <div class="col-4">
                            <span>
                                <i class="far fa-star"></i>
                            </span>
                        </div>
                        <div class="col-8">
                            <h3>Maiores Ocorrências de Dívida</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 col-sm-6">
                <a href="/vencimento">
                    <div class="info-box">
                        <div class="col-4">
                            <span>
                                <i class="far fa-calendar-times"></i>
                            </span>
                        </div>
                        <div class="col-8">
                            <h3>Dívidas Próximas do Vencimento</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 col-sm-6">
                <a href="/maiores">
                    <div class="info-box">
                        <div class="col-4">
                            <span>
                                <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div>
                        <div class="col-8">
                            <h3>Dívidas Mais Altas</h3>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 col-sm-6">
                <a href="/jovens">
                    <div class="info-box">
                        <div class="col-4">
                            <span>
                                <i class="fas fa-child"></i>
                            </span>
                        </div>
                        <div class="col-8">
                            <h3>Pessoas Mais Jovens com Dívida</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="dash-container">
        <p id="valor1"><?=$valor1?></p>
        <p id="valor2"><?=$valor2?></p>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card bg-white mb-3">
                    <div class="card-header">
                        <i class="far fa-calendar-alt fa-2x"></i>Média(R$) Títulos a Vencer X Vencidos
                    </div> 
                    <div class="card-body">
                        <canvas id="chart-dash" ></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card bg-white mb-3">
                    <div class="card-header">
                        <i class="fas fa-plus fa-2x"></i> Indicadores
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <i class="fas fa-bullseye" style="color: tomato;"></i>
                            </div>
                            <div class="col-8">
                                <h4>Valor Médio Vencido no Mês</h4>
                                <span>R$</span><?=(round($ctrl->somaVencidos()->media, 2))?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <i class="fas fa-bullseye" style="color: grey;"></i>
                            </div>
                            <div class="col-8">
                                <h4>Valor Médio a Vencer no Mês</h4>
                                <span>R$</span><?=(round($ctrl->somaAVencer()->media, 2))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$scripts = array(
    "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js",
    "assets/js/dash.js"
);
include(BASE_PATH . '/app/views/template/footer.php');
?>

