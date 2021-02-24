<!-- http://localhost/cliente/clienteCadastro.php -->

<?php
require_once("inc/init.php");

require_once("inc/config.ui.php");

$page_title = "Usuário";
$page_css[] = "your_style.css";
$page_css[] = "pontoEletronico.css";

include("inc/header.php");
$page_nav["controle"]["sub"]["usuarios"]["active"] = true;

include("inc/nav.php");
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<div id="main" role="main">
    <?php
    $breadcrumbs["Controle de Permissão"] = "";
    include("inc/ribbon.php");
    ?>
    <div id="content">

        <!-- MAIN CONTENT -->
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
                <div class="col-md-8 funcionario">
                    <h3>Funcionario: <span>Fillipy José Pessoa Ferreira Monteiro</span></h3>
                    <h3>Projeto: <span>NTL - Nova Tecnologia</span></h3>
                </div>
                <div class="col-md-4 marcacao">
                    <button type="button" class="btn  btn-block botaoentrada">
                        <i class="fa fa-sign-in"></i><br> Marcar entrada</button>
                    <button type="button" class="btn  btn-block botaosaida">
                        <i class="fa fa-sign-out"></i><br> Marcar saida</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="col-xs-6 ">
                        <button type="button" class="btn btn-primary btn-block inicioalmoco "><i class="fa fa-cutlery"></i><br> Inicio almoço</button>
                    </div>
                    <div class="col-xs-6 ">
                        <button type="button" class="btn btn-primary btn-block fimalmoco"><i class="fa fa-cutlery"></i><br>Fim almoço</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-6" style="margin-top: 10px;">
                        <p><i class="fa fa-clock-o"></i> Atraso:</p>
                        <input class="form-control text-center" type="text" placeholder="00:20:36" readonly>
                    </div>
                    <div class="col-md-6" style="margin-top: 10px;">
                        <p><i class="fa fa-clock-o"></i> Hora extra:</p>
                        <input class="form-control text-center" type="text" placeholder="01:20:57" readonly>
                    </div>
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
                <div class="col-md-4" style="margin-top:30px">
                    <p> <i class=" fa fa-calendar icon-prepend"></i> Calendário</p>
                    <input placeholder="Só utilizar em caso de ocorrência." class="datepicker form-control text-center" type="text" data-dateformat="DD, dd 'de' MM 'de' yy.">
                </div>
            </div>
            <!-- end widget grid -->
        </div>
        <!-- END MAIN CONTENT -->
        <!-- <section id="widget-grid" class="">
            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable centerBox">
                    <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"><i class="fa fa-address-book"></i></span>
                            <h2>Ponto Eletrônico</h2>
                        </header>
                        <div>
                            <div class="widget-body no-padding">
                                <form class="smart-form client-form" id="FormCliente" method="post">
                                    <div class="panel-group smart-accordion-default" id="accordion">
                                        <fieldset>
                                            <div class="row">
                                                <section class="col col-4">
                                                    <h5>Data de hoje</h5>
                                                    <?php
                                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                                    date_default_timezone_set('America/Sao_Paulo');
                                                    echo utf8_encode(ucwords(strftime('%A, ', $var_DateTime->sec)));
                                                    echo strftime('%d de %B de %Y.', strtotime('today'));

                                                    ?>
                                                </section>
                                                <section class="col col-4">
                                                    <h5>Horário de Brasília</h5>
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
                                                    <?php
                                                    // $hora = date('H:i:s.');
                                                    // echo $hora
                                                    ?>
                                                </section>
                                            </div>

                                            <div class="row">
                                                <section class="col col-2">
                                                    <label class="label">Funcionário</label>
                                                    <label class="input"><i class="fa fa-user-o icon-prepend"></i>
                                                        <input id="funcionário" name="funcionário" type="text" value="" readonly>
                                                    </label>
                                                </section>

                                                <section class="col col-2">
                                                    <label class="label">Função</label>
                                                    <label class="input"><i class="fa fa-address-card-o icon-prepend"></i>
                                                        <input id="funcao" name="funcao" type="text" value="" readonly>
                                                    </label>
                                                </section>

                                                <section class="col col-2">
                                                    <label class="label">Projeto</label>
                                                    <label class="input"><i class="fa fa-code icon-prepend"></i>
                                                        <input id="idade" name="idade" type="text" value="" readonly>
                                                    </label>
                                                </section>

                                                <section class="col col-4">
                                                    <label class="label">Calendário</label>
                                                    <label class="input"><i class=" fa fa-calendar icon-prepend"></i>
                                                        <input class="datepicker" data-dateformat="DD, dd 'de' MM 'de' yy.">
                                                    </label>
                                                </section>
                                            </div>
                                        </fieldset>
                                    </div>


                                    <footer>
                                        <button type=" button" id="btnExcluir" class="btn btn-danger" aria-hidden="true" title="Excluir" style="display:<?php echo $esconderBtnExcluir ?>">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                        <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-front ui-dialog-buttons ui-draggable" tabindex="-1" role="dialog" aria-describedby="dlgSimpleExcluir" aria-labelledby="ui-id-1" style="height: auto; width: 600px; top: 220px; left: 262px; display: none;">
                                            <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                                                <span id="ui-id-2" class="ui-dialog-title">
                                                </span>
                                            </div>
                                            <div id="dlgSimpleExcluir" class="ui-dialog-content ui-widget-content" style="width: auto; min-height: 0px; max-height: none; height: auto;">
                                                <p>CONFIRMA A EXCLUSÃO ? </p>
                                            </div>
                                            <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                                                <div class="ui-dialog-buttonset">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" id="btnGravar" class="btn btn-success" aria-hidden="true" title="Gravar" style="display:<?php echo $esconderBtnGravar ?>">
                                            <span class="fa fa-floppy-o"></span>
                                        </button>
                                        <button type="button" id="btnNovo" class="btn btn-primary" aria-hidden="true" title="Novo" style="display:<?php echo $esconderBtnGravar ?>">
                                            <span class="fa fa-file-o"></span>
                                        </button>
                                        <button type="button" id="btnVoltar" class="btn btn-default" aria-hidden="true" title="Voltar">
                                            <span class="fa fa-backward "></span>
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section> -->
    </div>

</div>
</div>

<?php
include("inc/footer.php");
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