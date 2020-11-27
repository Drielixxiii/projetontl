<?php
//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

//colocar o tratamento de permissão sempre abaixo de require_once("inc/config.ui.php");
$condicaoAcessarOK = (in_array('USUARIO_ACESSAR', $arrayPermissao, true));
$condicaoGravarOK = (in_array('USUARIO_GRAVAR', $arrayPermissao, true));

$esconderBtnGravar = "";
if ($condicaoGravarOK === false) {
    $esconderBtnGravar = "none";
}

/* ---------------- PHP Custom Scripts ---------

  YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
  E.G. $page_title = "Custom Title" */

$page_title = "Usuário";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
include("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["controle"]["sub"]["usuarios"]["active"] = true;

include("inc/nav.php");
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
    <?php
    //configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
    //$breadcrumbs["New Crumb"] => "http://url.com"
    $breadcrumbs["Controle de Permissão"] = "";
    include("inc/ribbon.php");
    ?>

    <!-- MAIN CONTENT -->
    <div id="content">

        <!-- widget grid -->
        <section id="widget-grid" class="">
            <div class="row" style="margin: 0 0 13px 0;">
                <?php if ($condicaoGravarOK) { ?>
                    <a class="btn btn-primary fa fa-file-o" aria-hidden="true" title="Novo" href="<?php echo APP_URL; ?>/clienteCadastro.php" style="float:right"></a>
                <?php } ?>
            </div>

            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable centerBox">
                    <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"><i class="fa fa-cog"></i></span>
                            <h2>Usuário</h2>
                        </header>
                        <div>
                            <div class="widget-body no-padding" style="min-height: 0px;">
                                <form action="javascript:gravar()" class="smart-form client-form" id="formUsuarioFiltro" method="post">
                                    <div class="panel-group smart-accordion-default" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiltro" class="">
                                                        <i class="fa fa-lg fa-angle-down pull-right"></i>
                                                        <i class="fa fa-lg fa-angle-up pull-right"></i>
                                                        Filtro
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div id="collapseFiltro" class="panel-collapse collapse in">
                                            <div class="panel-body no-padding">
                                                <fieldset>
                                                    <div class="row">
                                                        <section class="col col-5">
                                                            <label class="label">Nome</label>
                                                            <label class="input"><i class="icon-prepend fa fa-user"></i>
                                                                <input id="nome" maxlength="50" name="nome" type="text" value="">
                                                            </label>
                                                        </section>

                                                        <section class="col col-4">
                                                            <label class="label">CPF</label>
                                                            <label class="input">
                                                                <input id="cpf" maxlength="14" name="cpf" placeholder="XXX.XXX.XXX-XX" data-mask="999.999.999-99" type="text" class="" value="">
                                                            </label>
                                                        </section>

                                                        <section class="col col-2">
                                                            <label class="label">Situação</label>
                                                            <label class="select"><i class=""></i>
                                                                <select id="situacao" name="situacao">
                                                                    <option></option>
                                                                    <option value="0"> Prospect</option>
                                                                    <option value="1"> Cliente</option>
                                                                </select><i></i>
                                                            </label>
                                                        </section>
                                                    </div>


                                                    <div class="row">
                                                        <section class="col col-2">
                                                            <label class="label">Data de Admissão Inicial</label>
                                                            <label class="input">
                                                                <input id="dataAdmissaoInicial" name="dataAdmissaoInicial" type="" data-dateformat="dd/mm/yy" value="" data-mask="99/99/9999" data-mask-placeholder="-" placeholder="__/__/____" class="datepicker">
                                                            </label>
                                                        </section>

                                                        <section class="col col-2">
                                                            <label class="label">Data de Admissão Final</label>
                                                            <label class="input">
                                                                <input id="dataAdmissaoFinal" name="dataAdmissaoFinal" type="" data-dateformat="dd/mm/yy" value="" data-mask="99/99/9999" data-mask-placeholder="-" placeholder="__/__/____" class="datepicker">
                                                            </label>
                                                        </section>

                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <footer>
                                        <button type="button" id="btnSearch" class="btn btn-success" aria-hidden="true" title="Buscar" style="display:<?php echo $esconderBtnSearch ?>">
                                            <span class="fa fa-search"></span>
                                        </button>
                                        <a href="clienteCadastro.php">
                                            <button type="button" id="btnNovo" class="btn btn-primary" aria-hidden="true" title="Novo">
                                                <span class="fa fa-file-o "></span>
                                            </button>
                                        </a>
                                    </footer>
                                </form>
                            </div>
                        </div>
                        <div id="resultadoBusca"></div>
                    </div>
                </article>
            </div>
        </section>
    </div>
    <!-- end widget grid -->
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN PANEL -->

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
<!--script src="<?php echo ASSETS_URL; ?>/js/businessTabelaBasica.js" type="text/javascript"></script-->
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
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fullcalendar/locale-all.js"></script>


<script>
    $(document).ready(function() {
        $('#btnSearch').on("click", function() {
            listarFiltro();
        });
    });

    function listarFiltro() {

        var nomeFiltro = $('#nome').val();
        var cpfFiltro = $('#cpf').val();
        var situacaoFiltro = $('#situacao').val();
        var dataAdmissaoInicialFiltro = $('#dataAdmissaoInicial').val();
        var dataAdmissaoFinalFiltro = $('#dataAdmissaoFinal').val();

        if (!nomeFiltro) {
            nomeFiltro = nomeFiltro.replace(/^\s+|\s+$/g, "");
            nomeFiltro = encodeURIComponent(nomeFiltro);
        }

        $('#resultadoBusca').load('clienteFiltroListagem.php?', {
            nomeFiltro: nomeFiltro,
            cpfFiltro: cpfFiltro,
            situacaoFiltro: situacaoFiltro,
            dataAdmissaoInicialFiltro: dataAdmissaoInicialFiltro,
            dataAdmissaoFinalFiltro: dataAdmissaoFinalFiltro
        });
    }
</script>