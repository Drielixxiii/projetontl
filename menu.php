<!-- http://localhost/Drieli_Cliente/projetontl/menu.php -->

<?php
//initilize the page
require_once("inc/init.php");


//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

/* ---------------- PHP Custom Scripts ---------

  YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
  E.G. $page_title = "Custom Title" */

$page_title = "Início - Área do funcionário.";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$page_css[] = "menu.css";
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
    // $breadcrumbs["Tabela Básica"] = "";
    // include("inc/ribbon.php");
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
                                                        Área do funcionário
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseCadastro" class="panel-collapse collapse in">
                                                <div class="panel-body no-padding">
                                                    <fieldset>
                                                        <input id="codigo" name="codigo" type="text" class="hidden">
                                                        <div class="row ">
                                                            <section class="text-center" style="margin-bottom: 10px;">
                                                                <h2>Bem-vind@ !</h2>
                                                            </section>
                                                        </div>

                                                        <div class="primeirasessao">
                                                            <div class="row col col-xs-12">
                                                                <div class="col col-xs-4 margem">
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                </div>

                                                                <div class="col col-xs-4 margem">
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                </div>

                                                                <div class="col col-xs-4 margem">
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                    <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button>
                                                                    <!-- <button type="button" class="btn  btn-block botao">
                                                                        <i class="fa fa-vcard"></i><br>Botão <span></span></button> -->
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
    // include("inc/footer.php");
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