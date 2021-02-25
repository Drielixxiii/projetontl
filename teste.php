<!-- http://localhost/cliente/clienteCadastro.php -->

<?php
require_once("inc/init.php");

require_once("inc/config.ui.php");

$page_title = "Ponto Diário";
$page_css[] = "your_style.css";
$page_css[] = "pontoEletronico.css";

include("inc/header.php");
$page_nav["controle"]["sub"]["usuarios"]["active"] = true;

include("inc/nav.php");
?>

<div id="main" role="main">
    <?php
    $breadcrumbs["Controle de Permissão"] = "";
    include("inc/ribbon.php");
    ?>
    <div id="content">
        <div id="content">
            <h1 class="text-center">Ponto Diário</h1>
            <div class="diaHoje  row text-center">
                <section class="col col-2">
                    <h5>
                        <?php
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                        date_default_timezone_set('America/Sao_Paulo');
                        echo utf8_encode(ucwords(strftime('%A, ', $var_DateTime->sec)));
                        echo strftime('%d de %B de %Y.', strtotime('today'));
                        ?>
                    </h5>
                </section>
                <section class="col col-2">
                    <h5>
                        <script>
                            var myVar = setInterval(myTimer, 1000);

                            function myTimer() {
                                var d = new Date(),
                                    displayDate;
                                if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
                                    displayDate = d.toLocaleTimeString('pt-BR');
                                } else {
                                    displayDate = d.toLocaleTimeString('pt-BR', {
                                        timeZone: 'America/Sao_Paulo'
                                    });
                                }
                                document.getElementById("hora").innerHTML = displayDate;
                            }
                        </script>
                        <div id="hora"></div>
                    </h5>
                </section>
            </div>
            <div class="row primeirasessao">
                <script>
                    $(function() {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                </script>
                <div class="col-md-8 funcionario card">
                    <h3><i class="fa fa-user-circle"></i> ∙ Funcionario: <span>Fillipy José Pessoa Ferreira Monteiro</span></h3>
                    <h3><i class="fa fa-code"></i> ∙ Projeto: <span>NTL - Nova Tecnologia</span></h3>
                    <h3><i class="fa fa-address-card-o"></i> ∙ Matrícula: <span>123456</span></h3>
                </div>

                <div class="col-md-2 marcacao">
                    <button type="button" class="btn  btn-block botaoentrada">
                        <i class="fa fa-sign-in"></i><br> Marcar entrada</button>
                    <button type="button" class="btn  btn-block inicioalmoco">
                        <i class="fa fa-cutlery"></i><br> Inicio almoço</button>
                </div>

                <div class="col-md-2 marcacao">
                    <button type="button" class="btn  btn-block botaosaida">
                        <i class="fa fa-sign-out"></i><br> Marcar saida</button>
                    <button type="button" class="btn  btn-block fimalmoco">
                        <i class="fa fa-cutlery"></i><br> Fim almoço</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4" style="margin-top:30px">
                    <p><i class="fa fa-address-book"></i> Ocorrências</p>
                    <select class="form-control">
                        <option>Ocorrencias</option>
                        <option>Home office</option>
                        <option>Atestado médico</option>
                    </select>
                </div>
                <script>
                    $(function() {
                        $('[data-toggle="popover"]').popover()
                    })
                </script>
                <div class="col-md-4" style="margin-top:30px">
                    <p><i class="fa fa-calendar icon-prepend"></i> Calendário <i class="text-muted fa fa-exclamation-circle" data-toggle="popover" title="Atenção!" data-content="O uso do calendário para marcação de dias anteriores, é exclusivo para dias com ocorrências."></i></p>
                    <input placeholder="Só utilizar em caso de ocorrência." class="datepicker form-control text-center" type="text" data-dateformat="DD, dd 'de' MM 'de' yy.">
                </div>

                <div class="col-md-4" style="margin-top:30px">
                    <div class="col-md-6">
                        <p><i class="fa fa-clock-o"></i> Atraso:</p>
                        <input class="form-control text-center" type="text" placeholder="00:20:36" readonly data-toggle="tooltip" data-placement="bottom" title="O atraso é contado a partir de 00min.">
                    </div>
                    <div class="col-md-6">
                        <p><i class="fa fa-clock-o"></i> Hora extra:</p>
                        <input class="form-control text-center" type="text" placeholder="01:20:57" readonly data-toggle="tooltip" data-placement="bottom" title="A hora extra é contada a partir de... ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// include("inc/footer.php");
?>

<?php
include("inc/scripts.php");
?>

<script src="<?php echo ASSETS_URL; ?>/js/businessCliente.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_URL; ?>/js/girComum.php"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.cust.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>