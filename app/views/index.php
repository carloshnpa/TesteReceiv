<?php
include(BASE_PATH . '/app/views/template/header.php');
?>

<div class="container-fluid">
    <div class="cards-container">
        <div class="row">
            <div class="col-md-3 col-12 col-sm-6">
                <a href="/dash/ocorrencias">
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
                <a href="/dash/vencimento">
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
                <a href="/dash/maiores">
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
                <a href="/dash/jovens">
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
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card bg-white mb-3">
                    <div class="card-header">
                        <i class="far fa-calendar-alt fa-2x"></i> Títulos a Vencer X Vencidos
                    </div> 
                    <div class="card-body">
                        <!-- TODO :  add graph -->
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
                                <h4>Valor Vencido no Mês</h4>
                                <span>R$</span>2341,90
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <i class="fas fa-bullseye" style="color: grey;"></i>
                            </div>
                            <div class="col-8">
                                <h4>Valor a Vencer no Mês</h4>
                                <span>R$</span>2909,09
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include(BASE_PATH . '/app/views/template/footer.php');
?>