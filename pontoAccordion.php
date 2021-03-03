<?php
//initilize the page
require_once("inc/init.php");


//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/* ---------------- PHP Custom Scripts ---------

  YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
  E.G. $page_title = "Custom Title" */

$page_title = "Ponto Feio";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$page_css[] = "style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["controle"]["sub"]["usuarios"]["active"] = true;

include("inc/nav.php");
?>
<div id="main" role="main">
    <?php
    //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
    //$breadcrumbs["New Crumb"] => "http://url.com"
    $breadcrumbs["Tabela Básica"] = "";
    include("inc/ribbon.php");
    ?>

    <!-- MAIN CONTENT -->
    <div id="content">
        <!-- widget grid -->
        <section id="widget-grid" class="">
            <!-- <div class="row" style="margin: 0 0 13px 0;">
                <?php if ($condicaoGravarOK) { ?>
                    <a class="btn btn-primary fa fa-file-o" aria-hidden="true" title="Novo" href="<?php echo APP_URL; ?>/cadastroLocalizacao.php" style="float:right"></a>
                <?php } ?>
            </div> -->

            <div class="">
                <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable centerBox">
                    <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"><i class="fa fa-cog"></i></span>
                            <h2>Funcionário
                            </h2>
                        </header>
                        <div>
                            <div class="widget-body no-padding">
                                <form action="javascript:gravar()" class="smart-form client-form" id="formLocalizacao" method="post">
                                    <div class="panel-group smart-accordion-default" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseCadastro" class="">
                                                        <i class="fa fa-lg fa-angle-down pull-right"></i>
                                                        <i class="fa fa-lg fa-angle-up pull-right"></i>
                                                        Ponto Eletrônico
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseCadastro" class="panel-collapse collapse in">
                                                <div class="panel-body no-padding">
                                                    <fieldset>
                                                        <input id="codigo" name="codigo" type="text" class="hidden">
                                                        <div class="row ">
                                                            <section class=" row text-center" style="margin-bottom: 10px;">
                                                                <h2 style="font-weight:bold;">Ponto Eletrônico</h2>
                                                                <h5>
                                                                    <?php
                                                                    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese.utf-8');
                                                                    date_default_timezone_set('America/Sao_Paulo');
                                                                    echo utf8_encode(ucwords(strftime('%A, ', $var_DateTime->sec)));
                                                                    echo utf8_encode(strftime('%d de %B de %Y.', strtotime('today')));
                                                                    ?>
                                                                </h5>
                                                                <h5>Horário de Brasília
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

                                                        <div class="primeirasessao">
                                                            <div class="col col-md-7 funcionario" style="border: 1px solid #3A3633;">
                                                                <h3> Matricula: <span id="#">25936</span></h3><br>
                                                                <h3> Funcionario: <span id="#">O nome do funcionário</span></h3><br>
                                                                <h3> Projeto: <span id="#">NTL - Nova Tecnologia</span></h3>
                                                            </div>
                                                            <div class="col col-md-5">
                                                                <div class="col col-xs-6 marcacao">
                                                                    <button type="button" class="btn  btn-block botaoentrada">
                                                                        <i class="fa fa-sign-in"></i><br>Entrada </button>
                                                                    <button type="button" class="btn  btn-block botaosaida">
                                                                        <i class="fa fa-sign-out"></i><br>Saida </button>
                                                                </div>

                                                                <div class="col col-xs-6 marcacao">
                                                                    <button type="button" class="btn  btn-block inicioalmoco">
                                                                        <i class="fa fa-cutlery"></i><br> Inicio almoço </button>
                                                                    <button type="button" class="btn  btn-block fimalmoco">
                                                                        <i class="fa fa-cutlery"></i><br> Fim almoço </button>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="">
                                                            <div class="col col-md-7">
                                                                <label class="label" for="lancamento">Ocorrência/Lançamento</label>
                                                                <label class="select">
                                                                    <select id="lancamento" name="lancamento" style="height: 40px;" class="" readonly>
                                                                        <option></option>
                                                                        <?php
                                                                        $reposit = new reposit();
                                                                        $sql = "select codigo, descricao from Ntl.lancamento where ativo = 1 order by descricao";
                                                                        $result = $reposit->RunQuery($sql);
                                                                        foreach ($result as $row) {
                                                                            $codigo = (int) $row['codigo'];
                                                                            $descricao = $row['descricao'];
                                                                            echo '<option value=' . $codigo . '>' . $descricao . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select><i></i>
                                                                </label>
                                                            </div>
                                                            <script>
                                                                $(function() {
                                                                    $('[data-toggle="popover"]').popover()
                                                                })
                                                            </script>
                                                            <script>
                                                                $(function() {
                                                                    $('[data-toggle="tooltip"]').tooltip()
                                                                })
                                                            </script>
                                                            <!-- <div class="col-md-4">
                                                                <p>
                                                                    <i class="fa fa-calendar icon-prepend"></i> 
                                                                    Calendário <i class="text-muted fa fa-exclamation-circle" data-toggle="popover" title="Atenção!" data-content="O uso do calendário para marcação de dias anteriores, é exclusivo para dias com ocorrências."></i>
                                                                </p>
                                                                <input placeholder="Só utilizar em caso de ocorrência." class="datepicker form-control text-center" type="text" data-dateformat="DD, dd 'de' MM 'de' yy.">
                                                            </div> -->

                                                            <div class="col col-md-5">
                                                                <div class="col col-md-6">
                                                                    <label id="labelHora" class="label">Atraso: </label>
                                                                    <div class="input-group" data-align="top" data-autoclose="true">
                                                                        <input id="horaAtraso" name="horaAtraso" type="text" class="text-center form-control" style="height: 40px;" placeholder="00:20:38" data-autoclose="true" value="" readonly data-toggle="tooltip" data-placement="top" title="O atraso é contado a partir de 00min.">
                                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                                    </div>
                                                                </div>

                                                                <div class="col col-md-6">
                                                                    <label id="labelHora" class="label">Hora Extra: </label>
                                                                    <div class="input-group" data-align="top" data-autoclose="true">
                                                                        <input id="horaHoraExtra" name="horaHoraExtra" type="text" class="text-center form-control" style="height: 40px;" placeholder="00:20:38" data-autoclose="true" value="" readonly data-toggle="tooltip" data-placement="top" title="A hora extra é contada a partir de... ">
                                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    </div>


    <!-- ==========================CONTENT ENDS HERE ========================== -->

    <!-- PAGE FOOTER -->
    <?php
    include("inc/footer.php");
    ?>
    <!-- END PAGE FOOTER -->

    <?php
    //include required scripts
    include("inc/scripts.php");
    ?>

    <script src="<?php echo ASSETS_URL; ?>/js/businessCliente.js" type="text/javascript"></script>
    <!-- <script src="<?php echo ASSETS_URL; ?>/js/girComum.php"></script> -->

    <!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->
    <!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.cust.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.time.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/flot/jquery.flot.tooltip.min.js"></script>

    <!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/vectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Full Calendar -->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/moment/moment.min.js"></script>
    <!--<script src="/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>-->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/fullcalendar/fullcalendar.js"></script>
    <!--<script src="<?php echo ASSETS_URL; ?>/js/plugin/fullcalendar/locale-all.js"></script>-->




    <!-- Form to json -->
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/form-to-json/form2js.js"></script>
    <script src="<?php echo ASSETS_URL; ?>/js/plugin/form-to-json/jquery.toObject.js"></script>