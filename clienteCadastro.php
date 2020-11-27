<!-- http://localhost/cliente/clienteCadastro.php -->

<?php
//initilize the page
require_once("inc/init.php");

//require UI configuration (nav, ribbon, etc.)
require_once("inc/config.ui.php");

// //colocar o tratamento de permissão sempre abaixo de require_once("inc/config.ui.php");
// $condicaoAcessarOK = (in_array('USUARIO_ACESSAR', $arrayPermissao, true));
// $condicaoGravarOK = (in_array('USUARIO_GRAVAR', $arrayPermissao, true));
// $condicaoExcluirOK = (in_array('USUARIO_EXCLUIR', $arrayPermissao, true));

// if ($condicaoAcessarOK == false) {
//     unset($_SESSION['nome']);
//     header("Location:nome.php");
// }

// $esconderBtnGravar = "";
// if ($condicaoGravarOK === false) {
//     $esconderBtnGravar = "none";
// }

// $esconderBtnExcluir = "";
// if ($condicaoExcluirOK === false) {
//     $esconderBtnExcluir = "none";
// }

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
            <div class="row">
                <article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable centerBox">
                    <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
                        <header>
                            <span class="widget-icon"><i class="fa fa-cog"></i></span>
                            <h2>Cliente</h2>
                        </header>
                        <div>
                            <div class="widget-body no-padding">
                                <form class="smart-form client-form" id="FormCliente" method="post">
                                    <div class="panel-group smart-accordion-default" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseCadastro" class="" id="accordionCadastro">
                                                        <i class="fa fa-lg fa-angle-down pull-right"></i>
                                                        <i class="fa fa-lg fa-angle-up pull-right"></i>
                                                        Cadastro
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseCadastro" class="panel-collapse collapse in">
                                                <div class="panel-body no-padding">
                                                    <fieldset>
                                                        <div class="row">
                                                            <input id="codigo" name="codigo" hidden>

                                                            <section class="col col-3">
                                                                <label class="label">Nome</label>
                                                                <label class="input"><i class=""></i>
                                                                    <input id="nome" maxlength="255" name="nome" placeholder="Insira seu nome completo" class="" type="text" value="">
                                                                </label>
                                                            </section>

                                                            <section class="col col-2">
                                                                <label class="label">CPF</label>
                                                                <label class="input">
                                                                    <input id="cpf" maxlength="14" name="cpf" placeholder="XXX.XXX.XXX-XX" data-mask="999.999.999-99" type="text" class="" value="">
                                                                </label>
                                                            </section>

                                                            <section class="col col-2">
                                                                <label class="label">Data de nascimento</label>
                                                                <label class="input"><i class="icon-prepend fa fa-calendar"></i>
                                                                    <input id="dataNascimento" name="dataNascimento" type="" data-dateformat="dd/mm/yy" class="datepicker" value="" data-mask="99/99/9999" data-mask-placeholder="-" placeholder="__/__/____">
                                                                </label>
                                                            </section>

                                                            <section class="col col-1">
                                                                <label class="label">Idade</label>
                                                                <label class="input"><i class=""></i>
                                                                    <input id="idade" name="idade" type="text" value="" readonly>
                                                                </label>
                                                            </section>

                                                            <section class="col col-2">
                                                                <label class="label">Sexo</label>
                                                                <label class="select"><i class=""></i>
                                                                    <select id="sexo" name="sexo">
                                                                        <option></option>
                                                                        <option value="1"> Feminino</option>
                                                                        <option value="2"> Masculino</option>
                                                                        <option value="3"> Outro</option>
                                                                    </select><i></i>
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
                                                                <label class="label">Data de admissão</label>
                                                                <label class="input">
                                                                    <i class="icon-prepend fa fa-calendar"></i>
                                                                    <input id="dataAdmissao" name="dataAdmissao" type="" data-dateformat="dd/mm/yy" class="datepicker" value="" data-mask="99/99/9999" data-mask-placeholder="-" placeholder="__/__/____">
                                                                </label>
                                                            </section>

                                                            <!-- <section class="col col-2">
                                                                <label class="label">Cargo</label>
                                                                <label class="select">
                                                                    <select id="cargo" name="cargo">
                                                                        <option value=""></option>
                                                                        <?php

                                                                        // $reposit = new reposit();
                                                                        // $result = $reposit->RunQuery('SELECT codigo, descricao FROM cargo');

                                                                        // while (($row = odbc_fetch_array($result))) {
                                                                        //     $id = +$row['codigo'];
                                                                        //     $descricao = utf8_encode($row['descricao']);
                                                                        //     echo "<option value= \"$id\">$descricao</option>";
                                                                        // }
                                                                        ?>
                                                                    </select><i></i>
                                                                </label>
                                                            </section> -->

                                                            <section class="col col-2">
                                                                <label class="label">Estado Civil</label>
                                                                <label class="select">
                                                                    <select id="estadoCivil" name="estadoCivil">
                                                                        <option value=""></option>
                                                                        <?php

                                                                        $reposit = new reposit();
                                                                        $result = $reposit->RunQuery('SELECT codigo, descricao FROM estadoCivil');

                                                                        while (($row = odbc_fetch_array($result))) {
                                                                            $id = +$row['codigo'];
                                                                            $descricao = utf8_encode($row['descricao']);
                                                                            echo "<option value= \"$id\">$descricao</option>";
                                                                        }
                                                                        ?>
                                                                    </select><i></i>
                                                                </label>
                                                            </section>

                                                            <section class="col col-3">
                                                                <label class="label">Obs</label>
                                                                <label class="input"><i class=""></i>
                                                                    <input id="obs" name="obs" type="text" value="">
                                                                </label>
                                                            </section>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- AREA DO ENDEREÇO -->
                                        <div class=" panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#" href="#collapseEndereco" class="" id="accordionEndereco">
                                                        <i class="fa fa-lg fa-angle-down pull-right"></i>
                                                        <i class="fa fa-lg fa-angle-up pull-right"></i>
                                                        Endereço
                                                </h4>
                                                </a>

                                                <div id="collapseEndereco" class="panel-collapse collapse">
                                                    <div class="panel-body no-padding">
                                                        <fieldset>
                                                            <div class="row">
                                                                <section class="col col-2">
                                                                    <label class="label">CEP</label>
                                                                    <label class="input">
                                                                        <input id="cepResidencial" maxlength="10" name="cepResidencial" placeholder="XXXXX-XXX" type="text" data-mask="99999-999">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-3">
                                                                    <label class="label">Endereço Residencial </label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="logradouroResidencial" maxlength="255" name="logradouroResidencial" placeholder="Logradouro: Rua Exemplo." class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-1">
                                                                    <label class="label">Número</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="numeroResidencial" maxlength="255" name="numeroResidencial" placeholder="Nº 1111" class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Complemento</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="complementoResidencial" maxlength="255" name="complementoResidencial" placeholder="Complemento" class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Bairro</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="bairroResidencial" maxlength="255" name="bairroResidencial" placeholder="Bairro" class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Cidade</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="cidadeResidencial" maxlength="255" name="cidadeResidencial" class="" type="text" value=""></label>
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Estado</label>
                                                                    <label class="select">
                                                                        <select name="ufResidencial" id="ufResidencial">
                                                                            <?php
                                                                            $reposit = new reposit();
                                                                            $result = $reposit->RunQuery('SELECT codigo, sigla from unidadeFederativa');

                                                                            while (($row = odbc_fetch_array($result))) {
                                                                                $id = +$row['codigo'];
                                                                                $sigla = utf8_encode($row['sigla']);
                                                                                echo "<option value= \"$sigla\">$sigla</option>";
                                                                            }
                                                                            ?>
                                                                        </select><i></i>
                                                                    </label>
                                                                </section>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset>
                                                            <div class="row">
                                                                <section class="col col-2">
                                                                    <label class="label">CEP</label>
                                                                    <label class="input">
                                                                        <input id="cepComercial" maxlength="10" name="cepComercial" placeholder="XXXXX-XXX" type="text" data-mask="99999-999">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-3">
                                                                    <label class="label">Endereço Comercial </label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="logradouroComercial" maxlength="255" name="logradouroComercial" placeholder="Logradouro: Rua Exemplo." class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-1">
                                                                    <label class="label">Número</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="numeroComercial" maxlength="255" name="numeroComercial" placeholder="Nº 1111" class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Complemento</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="complementoComercial" maxlength="255" name="complementoComercial" placeholder="Complemento" class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Bairro</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="bairroComercial" maxlength="255" name="bairroComercial" placeholder="Bairro" class="" type="text" value="">
                                                                    </label>
                                                                </section>

                                                                <section class="col col-2">
                                                                    <label class="label">Cidade</label>
                                                                    <label class="input"><i class=""></i>
                                                                        <input id="cidadeComercial" maxlength="255" name="cidadeComercial" class="" type="text" value="">
                                                                    </label>
                                                                </section>


                                                                <section class="col col-2">
                                                                    <label class="label">Estado</label>
                                                                    <label class="select">
                                                                        <select name="ufComercial" id="ufComercial">
                                                                            <?php
                                                                            $reposit = new reposit();
                                                                            $result = $reposit->RunQuery('SELECT codigo, sigla from unidadeFederativa');

                                                                            while (($row = odbc_fetch_array($result))) {
                                                                                $id = +$row['codigo'];
                                                                                $sigla = utf8_encode($row['sigla']);
                                                                                echo "<option value= \"$sigla\">$sigla</option>";
                                                                            }
                                                                            ?>
                                                                        </select><i></i>
                                                                    </label>
                                                                </section>

                                                                <!-- <section class="col col-1">
                                                                    <label class="label">UF</label>
                                                                    <label class="select"><i class=""></i>
                                                                        <select id="" name="ufComercial">
                                                                            <option></option>
                                                                            <option value="AC">AC</option>
                                                                            <option value="AL">AL</option>
                                                                            <option value="AP">AP</option>
                                                                            <option value="AM">AM</option>
                                                                            <option value="BA">BA</option>
                                                                            <option value="CE">CE</option>
                                                                            <option value="DF">DF</option>
                                                                            <option value="ES">ES</option>
                                                                            <option value="GO">GO</option>
                                                                            <option value="MA">MA</option>
                                                                            <option value="MT">MT</option>
                                                                            <option value="MS">MS</option>
                                                                            <option value="MG">MG</option>
                                                                            <option value="PA">PA</option>
                                                                            <option value="PB">PB</option>
                                                                            <option value="PR">PR</option>
                                                                            <option value="PE">PE</option>
                                                                            <option value="PI">PI</option>
                                                                            <option value="RJ">RJ</option>
                                                                            <option value="RN">RN</option>
                                                                            <option value="RS">RS</option>
                                                                            <option value="RO">RO</option>
                                                                            <option value="RR">RR</option>
                                                                            <option value="SC">SC</option>
                                                                            <option value="SP">SP</option>
                                                                            <option value="SE">SE</option>
                                                                            <option value="TO">TO</option>
                                                                        </select><i></i>
                                                                    </label>
                                                                </section> -->
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseContato" id="accordionContato">
                                                        <i class="fa fa-lg fa-angle-down pull-right"></i>
                                                        <i class="fa fa-lg fa-angle-up pull-right"></i>
                                                        Contato
                                                    </a>
                                                </h4>
                                                <div id="collapseContato" class="panel-collapse collapse">
                                                    <div class="panel-body no-padding">
                                                        <fieldset>
                                                            <!-- EMAIL -->
                                                            <input id="JsonEmail" name="JsonEmail" type="hidden" value="[]">
                                                            <div id="FormEmails" class="col-sm-6">
                                                                <input id="EmailsId" name="EmailsId" type="hidden" value="">
                                                                <input id="sequencialEmails" name="sequencialEmails" type="hidden" value="">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <section class="col col-md-6">
                                                                            <label class="label" for="Emails">Email</label>
                                                                            <label class="input"><i class="icon-prepend fa fa-at"></i>
                                                                                <input id="Emails" maxlength="50" name="Emails" type="email" value="" autocomplete="off">
                                                                            </label>
                                                                        </section>

                                                                        <section class="col col-md-2">
                                                                            <label class="label"> </label>
                                                                            <label class="label"> </label>
                                                                            <label id="labelEmailsPrincipal" class="checkbox ">
                                                                                <input id="EmailsPrincipal" name="EmailsPrincipal" type="checkbox" value="true" checked="checked"><i></i>
                                                                                Principal
                                                                            </label>
                                                                        </section>
                                                                        <section class="col col-md-4">
                                                                            <label class="label"> </label>
                                                                            <button id="btnAddEmails" type="button" class="btn btn-primary">
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                            <button id="btnRemoverEmails" type="button" class="btn btn-danger">
                                                                                <i class="fa fa-minus"></i>
                                                                            </button>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive" style="min-height: 115px; width:95%; border: 1px solid #ddd; overflow-x: auto;">
                                                                    <table id="tableEmails" class="table table-bordered table-striped table-condensed table-hover dataTable">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th></th>
                                                                                <th class="text-left" style="min-width: 100px;">Emails</th>
                                                                                <th class="text-left">Principal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!-- TELEFONE -->
                                                            <input id="JsonTelefone" name="JsonTelefone" type="hidden" value="[]">
                                                            <div id="formTelefone" class="col-sm-6">
                                                                <input id="telefoneId" name="telefoneId" type="hidden" value="">
                                                                <input id="sequencialTelefone" name="sequencialTelefone" type="hidden" value="">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <section class="col col-md-6">
                                                                            <label class="label" for="Telefone">Telefone</label>
                                                                            <label class="input"><i class="icon-prepend fa fa-phone"></i>
                                                                                <input id="Telefone" placeholder="(99) 99999-9999" name=" Telefone" type="text" value="" autocomplete="off" data-mask="(99)99999999?9">
                                                                            </label>
                                                                        </section>
                                                                        <section class="col col-md-2">
                                                                            <label class="label"> </label>
                                                                            <label class="label"> </label>
                                                                            <label id="labeltelefonePrincipal" class="checkbox ">
                                                                                <input id="telefonePrincipal" name="telefonePrincipal" type="checkbox" value="true" checked="checked"><i></i>
                                                                                Principal
                                                                            </label>
                                                                        </section>
                                                                        <section class="col col-md-4">
                                                                            <label class="label"> </label>
                                                                            <button id="btnAddTelefone" type="button" class="btn btn-primary">
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                            <button id="btnRemoverTelefone" type="button" class="btn btn-danger">
                                                                                <i class="fa fa-minus"></i>
                                                                            </button>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive" style="min-height: 115px; width:95%; border: 1px solid #ddd; margin-bottom: 13px ; overflow-x: auto;">
                                                                    <table id="tableTelefone" class="table table-bordered table-striped table-condensed table-hover dataTable">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th></th>
                                                                                <th class="text-left" style="min-width: 100px;">Telefone</th>
                                                                                <th class="text-left">Principal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <!-- REDES SOCIAIS -->
                                                            <input id="JsonRedeSocial" name="JsonRedeSocial" type="hidden" value="[]">
                                                            <div id="formRedeSocial" class="col-sm-6">
                                                                <input id="redeSocialId" name="redeSocialId" type="hidden" value="">
                                                                <input id="sequencialRedeSocial" name="sequencialRedeSocial" type="hidden" value="">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <section class="col col-md-6">
                                                                            <label class="label" for="redeSocial">Redes Sociais</label>
                                                                            <label class="input"><i class="icon-prepend fa fa-comment-o"></i>
                                                                                <input id="redeSocial" placeholder="Facebook, Instagram..." name="redeSocial" type="text" value="" autocomplete="off">
                                                                            </label>
                                                                        </section>
                                                                        <section class="col col-md-2">
                                                                            <label class="label"> </label>
                                                                            <label class="label"> </label>
                                                                            <label id="labelRedeSocialPrincipal" class="checkbox">
                                                                                <input id="redeSocialPrincipal" name="redeSocialPrincipal" type="checkbox" value="true" checked="checked"><i></i>
                                                                                Principal
                                                                            </label>
                                                                        </section>
                                                                        <section class="col col-md-4">
                                                                            <label class="label"> </label>
                                                                            <button id="btnAddRedeSocial" type="button" class="btn btn-primary">
                                                                                <i class="fa fa-plus"></i>
                                                                            </button>
                                                                            <button id="btnRemoverRedeSocial" type="button" class="btn btn-danger">
                                                                                <i class="fa fa-minus"></i>
                                                                            </button>
                                                                        </section>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive" style="min-height: 115px; width:95%; border: 1px solid #ddd; margin-bottom: 13px ; overflow-x: auto;">
                                                                    <table id="tableRedeSocial" class="table table-bordered table-striped table-condensed table-hover dataTable">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th></th>
                                                                                <th class="text-left" style="min-width: 100px;">Redes Sociais</th>
                                                                                <th class="text-left">Principal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <footer>
                                        <button type="button" id="btnExcluir" class="btn btn-danger" aria-hidden="true" title="Excluir" style="display:<?php echo $esconderBtnExcluir ?>">
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
                                            <!-- </button>
                                        <a href="newPDF.php"><button type="button" id="btnPDF" class="btn btn-danger" aria-hidden="true" title="Gerar PDF" style="display:<?php echo $esconderBtnGravar ?>">
                                                <span class="fa fa-file-pdf-o"></span>
                                            </button>
                                        </a> -->
                                    </footer>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>
        <!-- end widget grid -->

    </div>
    <!-- END MAIN CONTENT -->

</div>

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

<script src="<?php echo ASSETS_URL; ?>/js/businessCliente.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_URL; ?>/js/girComum.php"></script>


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


<script language="JavaScript" type="text/javascript">
    JsonEmailArray = JSON.parse($("#JsonEmail").val());
    jsonTelefoneArray = JSON.parse($("#JsonTelefone").val());
    jsonRedeSocialArray = JSON.parse($("#JsonRedeSocial").val());

    $(document).ready(function() {
        fillTableEmails();
        fillTableTelefone();
        fillTableRedeSocial();

        carregaPagina();

        $("#btnExcluir").on("click", function() {
            excluir();
        });

        $("#btnNovo").on("click", function() {
            novo();
        });

        $("#btnVoltar").on("click", function() {
            voltar();
        });

        $("#btnGravar").on("click", function() {
            let verificarEmail = false;

            if (JsonEmailArray.length < 1) {
                verificarEmail = true;
            }

            for (let e = 0; e < JsonEmailArray.length; e++) {
                if (JsonEmailArray[e].EmailsPrincipal == 1) {
                    verificarEmail = true;
                    break;
                }
            }

            if (verificarEmail == false) {
                smartAlert("Erro", "Selecione um email principal.", "error");
                return false;
            }



            let verificarTelefone = false;

            if (jsonTelefoneArray.length < 1) {
                verificarTelefone = true;
            }

            for (let e = 0; e < jsonTelefoneArray.length; e++) {
                if (jsonTelefoneArray[e].telefonePrincipal == 1) {
                    verificarTelefone = true;
                    break;
                }
            }

            if (verificarTelefone == false) {
                smartAlert("Erro", "Selecione um telefone principal.", "error");
                return false;
            }


            let verificarRedeSocial = false;

            if (jsonRedeSocialArray.length < 1) {
                verificarRedeSocial = true;
            }

            for (let e = 0; e < jsonRedeSocialArray.length; e++) {
                if (jsonRedeSocialArray[e].redeSocialPrincipal == 1) {
                    verificarRedeSocial = true;
                    break;
                }
            }

            if (verificarRedeSocial == false) {
                smartAlert("Erro", "Selecione uma rede social principal.", "error");
                return false;
            }
            gravar();
        });

        $('#btnAddEmails').on("click", function() {
            if (validaEmails() === true) {
                addEmails();
            }

        });

        $('#btnRemoverEmails').on("click", function() {
            excluirEmails();
        });

        $('#btnAddTelefone').on("click", function() {
            if (validaTelefone() === true) {
                addTelefone();
            }
        });

        $('#btnRemoverTelefone').on("click", function() {
            excluirTelefone();
        });

        $('#btnAddRedeSocial').on("click", function() {
            if (validaRedeSocial() === true) {
                addRedeSocial();
            }
        });

        $('#btnRemoverRedeSocial').on("click", function() {
            excluirRedeSocial();
        });

        $("#cpf").on("change", function() {
            validaCPF()
            pesquisaCPF()
        });

        $("#dataNascimento").on("change", function() {
            var data = new Date();
            dataNascimento = $("#dataNascimento").val();
            dataAdmissao = $("#dataAdmissao").val();

            dataNascimento = dataNascimento.split("/");
            dataNascimento = dataNascimento[2] + "/" + dataNascimento[1] + "/" + dataNascimento[0];
            dataNascimento = new Date(dataNascimento);

            if (data < dataNascimento) {
                console.log(data > dataNascimento);
                smartAlert("Error", "A data informada é maior que hoje.", "error");

                $("#dataNascimento").css({
                    'border-color': '#A94442'
                });
                $("#dataNascimento").val("");
                return;
            } else {
                $("#dataNascimento").css({
                    'border-color': '#CCC'
                });
            }
            calcularIdade()
        });

        $("#dataAdmissao").on("change", function() {

            var data = new Date();

            dataNascimento = $("#dataNascimento").val();
            dataAdmissao = $("#dataAdmissao").val();

            dataAdmissao = dataAdmissao.split("/");
            dataAdmissao = dataAdmissao[2] + "/" + dataAdmissao[1] + "/" + dataAdmissao[0];
            dataAdmissao = new Date(dataAdmissao);

            dataNascimento = dataNascimento.split("/");
            dataNascimento = dataNascimento[2] + "/" + dataNascimento[1] + "/" + dataNascimento[0];
            dataNascimento = new Date(dataNascimento);


            if (dataAdmissao <= dataNascimento) {
                smartAlert("Error", "Data de Admissão não pode ser antes que data de nascimento", "error");

                $("#dataAdmissao").css({
                    'border-color': '#A94442'
                });
                $("#dataAdmissao").val("");
                return;
            } else {
                $("#dataAdmissao").css({
                    'border-color': '#CCC'
                });
            }
            return;



        });

    });

    //*****************VALIDA CEP COMERCIAL*************
    function limpaFormularioCep() {
        // Limpa valores do formulário de cep.
        $("#logradouroComercial").val("");
        $("#cidadeComercial").val("");
        $("#bairroComercial").val("");
        $("#ufComercial").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cepComercial").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cepComercial = $(this).val().replace(/\D/g, '');

        //Verifica se campo cepComercial possui valor informado.
        if (cepComercial != "") {

            //Expressão regular para validar o cepComercial.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cepComercial)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouroComercial").val("...");
                $("#cidadeComercial").val("...");
                $("#bairroComercial").val("...");
                $("#ufComercial").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cepComercial + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouroComercial").val(dados.logradouro);
                        $("#cidadeComercial").val(dados.localidade);
                        $("#bairroComercial").val(dados.bairro);
                        $("#ufComercial").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpaFormularioCep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpaFormularioCep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpaFormularioCep();
        }
    });
    //*************FIM DO VALIDA CEP COMERCIAL***********


    //****************VALIDA CEP RESIDENCIAL**************
    function limpaFormularioCep() {
        // Limpa valores do formulário de cep.
        $("#logradouroResidencial").val("");
        $("#cidadeResidencial").val("");
        $("#bairroResidencial").val("");
        $("#ufResidencial").val("");
    }

    //Quando o campo cep perde o foco.
    $("#cepResidencial").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cepResidencial = $(this).val().replace(/\D/g, '');

        //Verifica se campo cepResidencial possui valor informado.
        if (cepResidencial != "") {

            //Expressão regular para validar o cepResidencial.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cepResidencial)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#logradouroResidencial").val("...");
                $("#cidadeResidencial").val("...");
                $("#bairroResidencial").val("...");
                $("#ufResidencial").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cepResidencial + "/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#logradouroResidencial").val(dados.logradouro);
                        $("#cidadeResidencial").val(dados.localidade);
                        $("#bairroResidencial").val(dados.bairro);
                        $("#ufResidencial").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpaFormularioCep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpaFormularioCep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpaFormularioCep();
        }
    });
    //***************FIM DO VALIDA CEP RESIDENCIAL********************

    // function recuperar() {
    //     $(location).attr('href', 'clienteFiltro.php');
    // }

    function novo() {
        $(location).attr('href', 'clienteCadastro.php');
    }

    function voltar() {
        $(location).attr('href', 'clienteFiltro.php');
    }

    function excluir() {

        var codigo = +($("#codigo").val());

        excluirCliente(codigo, function(data) {
            if (data.indexOf('sucess') < 0) {
                var piece = data.split("#");
                var mensagem = piece[1];
                if (mensagem !== "") {
                    smartAlert("Atenção", mensagem, "error");
                    return false;
                } else {
                    smartAlert("Atenção", "Operação não realizada - entre em contato com a GIR !", "error");
                    return false;
                }
            } else {
                var piece = data.split("#");
                smartAlert("Sucesso", "Operação realizada com sucesso!", "success");
                novo();
            }
        });
    }


    //CODIGO DE CALCULO DA IDADE
    //SO DEMOSNTRA NA TELA NO MOMENTO DE INSERÇÃO DA DATA DE NASCIMENTO
    function calcularIdade() {


        let dataNascimento = $("#dataNascimento").val();
        let formatDate = dataNascimento.split('/');

        dataNascimento = new Date("" + formatDate[2] + "-" + formatDate[1] + "-" + formatDate[0] + "");
        let data = new Date();
        let calcularAnos = parseInt(data.getFullYear() - dataNascimento.getFullYear());
        let calcularMeses = parseInt(data.getMonth() - dataNascimento.getMonth());

        if (calcularMeses < 0) {
            calcularAnos = calcularAnos - 1;
            calcularMeses = calcularMeses + 12;
        }

        let texto = calcularAnos;

        $("#idade").val(texto);

    }
    //FIM DELE

    function gravar() {

        $("#btnGravar").prop('disabled', true);

        var nome = $('#nome').val();

        if (nome == "") {
            smartAlert("Erro", "Digite seu nome.", "error");
            $("#btnGravar").prop('disabled', false); // <---  Reativa o botão de gravar

            $("#nome").css({
                'border-color': '#A94442'
            });
            return;
        } else {
            $("#nome").css({
                'border-color': '#CCC'
            });
        }

        var cpf = $('#cpf').val();

        if (cpf == "") {
            smartAlert("Erro", "Digite seu CPF.", "error");
            $("#btnGravar").prop('disabled', false); // <---  Reativa o botão de gravar
            $("#cpf").css({
                'border-color': '#A94442'
            });
            return;
        } else {
            $("#cpf").css({
                'border-color': '#CCC'
            });
        }

        let cliente = $('#FormCliente').serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;

        }, {});

        gravaCliente(cliente,
            function(data) {

                if (data.indexOf('sucess') < 0) {
                    var piece = data.split("#");
                    var mensagem = piece[1];
                    if (mensagem !== "") {
                        smartAlert("Atenção", mensagem, "error");
                        return;
                    } else {
                        smartAlert("Atenção", "Operação não realizada - entre em contato com a GIR !", "error");
                        $("#btnGravar").prop('disabled', false); // <---  Reativa o botão de gravar
                        return;
                    }
                } else {
                    var piece = data.split("#");
                    smartAlert("Sucesso", "Operação realizada com sucesso!", "success");
                    voltar();
                }
            }
        );
    }

    function carregaPagina() {
        var urlx = window.document.URL.toString();
        var params = urlx.split("?");
        if (params.length === 2) {
            var codigo = params[1];
            var idx = codigo.split("=");
            codigo = idx[1];
            if (codigo) {
                recuperaCliente(codigo,
                    function(data) {

                        data = data.replace(/failed/g, '');
                        var piece = data.split("#");

                        var mensagem = piece[0];
                        var out = piece[1];

                        var strArrayEmail = piece[2];
                        var strArrayTelefone = piece[3];
                        var strArrayRedeSocial = piece[4];

                        piece = out.split("^");
                        console.table(piece);

                        //Atributos de Cliente
                        var codigo = piece[0];
                        var nome = piece[1];
                        var cpf = piece[2];
                        var sexo = piece[3];
                        var situacao = piece[4];
                        var dataNascimento = piece[5];
                        var obs = piece[6];
                        var logradouroComercial = piece[7];
                        var numeroComercial = piece[8];
                        var complementoComercial = piece[9];
                        var bairroComercial = piece[10];
                        var cepComercial = piece[11];
                        var logradouroResidencial = piece[12];
                        var numeroResidencial = piece[13];
                        var complementoResidencial = piece[14];
                        var bairroResidencial = piece[15];
                        var cepResidencial = piece[16];
                        var dataAdmissao = piece[17];
                        var estadoCivil = piece[18];
                        var ufResidencial = piece[19];
                        var ufComercial = piece[20];
                        var cidadeResidencial = piece[21];
                        var cidadeComercial = piece[22];

                        //Atributos de cliente        
                        $("#codigo").val(codigo);
                        $("#nome").val(nome);
                        $("#cpf").val(cpf);
                        $("#sexo").val(sexo);
                        $("#situacao").val(situacao);
                        $("#dataNascimento").val(dataNascimento);
                        $("#obs").val(obs);
                        $("#logradouroComercial").val(logradouroComercial);
                        $("#numeroComercial").val(numeroComercial);
                        $("#complementoComercial").val(complementoComercial);
                        $("#bairroComercial").val(bairroComercial);
                        $("#cepComercial").val(cepComercial);
                        $("#logradouroResidencial").val(logradouroResidencial);
                        $("#numeroResidencial").val(numeroResidencial);
                        $("#complementoResidencial").val(complementoResidencial);
                        $("#bairroResidencial").val(bairroResidencial);
                        $("#cepResidencial").val(cepResidencial);
                        $("#dataAdmissao").val(dataAdmissao);
                        $("#estadoCivil").val(estadoCivil);
                        $("#ufResidencial").val(ufResidencial);
                        $("#ufComercial").val(ufComercial);
                        $("#idade").val(idade);
                        $("#cidadeResidencial").val(cidadeResidencial);
                        $("#cidadeComercial").val(cidadeComercial);

                        piece = strArrayEmail
                        console.table(piece);
                        $("#JsonEmail").val(strArrayEmail);
                        JsonEmailArray = JSON.parse($("#JsonEmail").val());
                        fillTableEmails();

                        piece = strArrayTelefone
                        console.table(piece);
                        $("#JsonTelefone").val(strArrayTelefone);
                        jsonTelefoneArray = JSON.parse($("#JsonTelefone").val());
                        fillTableTelefone();

                        piece = strArrayRedeSocial
                        console.table(piece);
                        $("#JsonRedeSocial").val(strArrayRedeSocial);
                        jsonRedeSocialArray = JSON.parse($("#JsonRedeSocial").val());
                        fillTableRedeSocial();

                        calcularIdade()
                    }
                );
            }
        }
    }

    // FUNCOES DE CONTATO
    // EMAIL
    function clearFormEmails() {
        $("#Emails").val('');
        $("#EmailsId").val('');
        $("#sequencialEmails").val('');
        $('#EmailsPrincipal').val(0);
        $('#EmailsPrincipal').prop('checked', false);
    }

    function fillTableEmails() {
        $("#tableEmails tbody").empty();
        if (typeof(JsonEmailArray) != 'undefined') {
            for (var i = 0; i < JsonEmailArray.length; i++) {
                var row = $('<tr />');
                $("#tableEmails tbody").append(row);
                row.append($('<td><label class="checkbox"><input type="checkbox" name="checkbox" value="' + JsonEmailArray[i].sequencialEmails + '"><i></i></label></td>'));
                row.append($('<td class="text-nowrap" onclick="carregaEmails(' + JsonEmailArray[i].sequencialEmails + ');">' + JsonEmailArray[i].Emails + '</td>'));

                if (JsonEmailArray[i].EmailsPrincipal == "1") {
                    row.append($('<td class="text-nowrap">Sim</td>'));
                } else {
                    row.append($('<td class="text-nowrap">Não</td>'));
                }
            }
            clearFormEmails();
        }
    }

    function validaEmails() {
        var existe = false;
        var achou = false;
        var tel = $('#Emails').val();

        var sequencial = parseInt($('#sequencialEmails').val());
        var EmailsPrincipalMarcado = 0;

        if ($("#EmailsPrincipal").is(':checked') === true) {
            EmailsPrincipalMarcado = 1;
        }
        if (!tel) {
            smartAlert("Erro", "Informe um email.", "error");
            return false;
        }
        for (i = JsonEmailArray.length - 1; i >= 0; i--) {
            if (EmailsPrincipalMarcado === 1) {
                if ((JsonEmailArray[i].EmailsPrincipal == 1) && (JsonEmailArray[i].sequencialEmails !== sequencial)) {
                    achou = true;
                    break;
                }
            }
            if (tel !== "") {
                if ((JsonEmailArray[i].Emails === tel) && (JsonEmailArray[i].sequencialEmails !== sequencial)) {
                    existe = true;
                    break;
                }
            }
        }

        if (tel.indexOf("@") < 0) {
            smartAlert("Erro", "Digite um email válido.", "error");
            return false;
        }

        if (existe === true) {
            smartAlert("Erro", "Email já cadastrado.", "error");
            return false;
        }

        if ((EmailsPrincipalMarcado == 0) && (existe == true)) {
            smartAlert("Erro", "Adicione ao menos um email principal", "error");
            return false;
        } else {
            return true;
        }

        if ((achou === true) && (EmailsPrincipalMarcado === 1)) {
            smartAlert("Erro", "Já existe um Email principal na lista.", "error");
            return false;
        }
        return true;



    }

    function processDataEmails(node) {

        var fieldId = node.getAttribute ? node.getAttribute('id') : '';
        var fieldName = node.getAttribute ? node.getAttribute('name') : '';
        var value;

        if (fieldName !== '' && (fieldId === "Emails")) {
            var valorTel = $("#Emails").val().trim();
            if (valorTel !== '') {
                fieldName = "Emails";
            }
            return {
                name: fieldName,
                value: valorTel
            };
        }

        if (fieldName !== '' && (fieldId === "EmailsPrincipal")) {
            value = 0;
            if ($("#EmailsPrincipal").is(':checked') === true) {
                value = 1;
            }
            return {
                name: fieldName,
                value: value
            };
        }
        return false;
    }

    function addEmails() {
        var item = $("#FormEmails").toObject({
            mode: 'combine',
            skipEmpty: false,
            nodeCallback: processDataEmails
        });

        if (!item["sequencialEmails"]) {
            if (JsonEmailArray.length === 0) {
                item["sequencialEmails"] = 1;
            } else {
                item["sequencialEmails"] = Math.max.apply(Math, JsonEmailArray.map(function(o) {
                    return o.sequencialEmails;
                })) + 1;
            }
            item["EmailsId"] = 0;
        } else {
            item["sequencialEmails"] = +item["sequencialEmails"];
        }

        if (item["sequencialEmails"] > 3) {
            smartAlert("Erro", "Máximo de três emails atingido.", "error");
            item["sequencialEmails"].val("")
        }

        var index = -1;
        $.each(JsonEmailArray, function(i, obj) {
            if (parseInt($('#sequencialEmails').val()) === obj.sequencialEmails) {
                index = i;
                return false;
            }
        });

        if (index >= 0)
            JsonEmailArray.splice(index, 1, item);
        else
            JsonEmailArray.push(item);

        $("#JsonEmail").val(JSON.stringify(JsonEmailArray));
        fillTableEmails();
        clearFormEmails();
    }

    function excluirEmails() {
        var arrSequencial = [];
        $('#tableEmails input[type=checkbox]:checked').each(function() {
            arrSequencial.push(parseInt($(this).val()));
        });
        if (arrSequencial.length > 0) {
            for (i = JsonEmailArray.length - 1; i >= 0; i--) {
                var obj = JsonEmailArray[i];
                if (jQuery.inArray(obj.sequencialEmails, arrSequencial) > -1) {
                    JsonEmailArray.splice(i, 1);
                }
            }
            $("#JsonEmail").val(JSON.stringify(JsonEmailArray));
            fillTableEmails();
        } else
            smartAlert("Erro", "Marque a caixa para excluir o email.", "error");
    }

    function carregaEmails(sequencialEmails) {
        var arr = jQuery.grep(JsonEmailArray, function(item, i) {
            return (item.sequencialEmails === sequencialEmails);
        });

        clearFormEmails();

        if (arr.length > 0) {
            var item = arr[0];
            $("#EmailsId").val(item.EmailsId);
            $("#Emails").val(item.Emails);
            $("#sequencialEmails").val(item.sequencialEmails);
            $("#EmailsPrincipal").val(item.EmailsPrincipal);
            if (item.EmailsPrincipal === 1) {
                $('#EmailsPrincipal').prop('checked', true);
            } else {
                $('#EmailsPrincipal').prop('checked', false);
            }
        }
    }

    // TELEFONE
    function clearFormTelefone() {
        $("#Telefone").val('');
        $("#telefoneId").val('');
        $("#sequencialTelefone").val('');
        $('#telefonePrincipal').val(0);
        $('#telefonePrincipal').prop('checked', false);
    }

    function fillTableTelefone() {
        $("#tableTelefone tbody").empty();
        if (typeof(jsonTelefoneArray) != 'undefined') {
            for (var i = 0; i < jsonTelefoneArray.length; i++) {
                var row = $('<tr />');
                $("#tableTelefone tbody").append(row);
                row.append($('<td><label class="checkbox"><input type="checkbox" name="checkbox" value="' + jsonTelefoneArray[i].sequencialTelefone + '"><i></i></label></td>'));
                row.append($('<td class="text-nowrap" onclick="carregaTelefone(' + jsonTelefoneArray[i].sequencialTelefone + ');">' + jsonTelefoneArray[i].Telefone + '</td>'));


                if (jsonTelefoneArray[i].telefonePrincipal == 1) {
                    row.append($('<td class="text-nowrap">Sim</td>'));

                } else {
                    row.append($('<td class="text-nowrap">Não</td>'));
                }

            }
            clearFormTelefone();
        }
    }

    function validaTelefone() {
        var existe = false;
        var achou = false;
        var tel = $('#Telefone').val();

        var sequencial = parseInt($('#sequencialTelefone').val());
        var telefonePrincipalMarcado = 0;

        if ($("#telefonePrincipal").is(':checked') === true) {
            telefonePrincipalMarcado = 1;
        }
        if (!tel) {
            smartAlert("Erro", "Informe um telefone.", "error");
            return false;
        }
        for (i = jsonTelefoneArray.length - 1; i >= 0; i--) {
            if (telefonePrincipalMarcado === 1) {
                if ((jsonTelefoneArray[i].telefonePrincipal == 1) && (jsonTelefoneArray[i].sequencialTelefone !== sequencial)) {
                    achou = true;
                    break;
                }
            }
            if (tel !== "") {
                if ((jsonTelefoneArray[i].Telefone === tel) && (jsonTelefoneArray[i].sequencialTelefone !== sequencial)) {
                    existe = true;
                    break;
                }
            }

        }
        if (existe === true) {
            smartAlert("Erro", "Telefone já cadastrado.", "error");
            return false;
        }
        if ((achou === true) && (telefonePrincipalMarcado === 1)) {
            smartAlert("Erro", "Já existe um Telefone principal na lista.", "error");
            return false;
        }
        return true;
    }

    function processDataTelefone(node) {

        var fieldId = node.getAttribute ? node.getAttribute('id') : '';
        var fieldName = node.getAttribute ? node.getAttribute('name') : '';
        var value;

        if (fieldName !== '' && (fieldId === "Telefone")) {
            var valorTel = $("#Telefone").val().trim();
            if (valorTel !== '') {
                fieldName = "Telefone";
            }
            return {
                name: fieldName,
                value: valorTel
            };
        }

        if (fieldName !== '' && (fieldId === "telefonePrincipal")) {
            value = 0;
            if ($("#telefonePrincipal").is(':checked') === true) {
                value = 1;
            }
            return {
                name: fieldName,
                value: value
            };
        }
        return false;
    }

    function addTelefone() {
        var item = $("#formTelefone").toObject({
            mode: 'combine',
            skipEmpty: false,
            nodeCallback: processDataTelefone
        });

        $("#telefone").mask("(99) 99999-999?9", {
            placeholder: 'X'
        });

        if (!item["sequencialTelefone"]) {
            if (jsonTelefoneArray.length === 0) {
                item["sequencialTelefone"] = 1;
            } else {
                item["sequencialTelefone"] = Math.max.apply(Math, jsonTelefoneArray.map(function(o) {
                    return o.sequencialTelefone;
                })) + 1;
            }
            item["telefoneId"] = 0;
        } else {
            item["sequencialTelefone"] = +item["sequencialTelefone"];
        }

        if (item["sequencialTelefone"] > 3) {
            smartAlert("Erro", "Máximo de três telefones atingido.", "error");
            item["sequencialTelefone"].val("")
        }

        var index = -1;
        $.each(jsonTelefoneArray, function(i, obj) {
            if (parseInt($('#sequencialTelefone').val()) === obj.sequencialTelefone) {
                index = i;
                return false;
            }
        });

        if (index >= 0)
            jsonTelefoneArray.splice(index, 1, item);
        else
            jsonTelefoneArray.push(item);

        $("#JsonTelefone").val(JSON.stringify(jsonTelefoneArray));
        fillTableTelefone();
        clearFormTelefone();
    }

    function excluirTelefone() {
        var arrSequencial = [];
        $('#tableTelefone input[type=checkbox]:checked').each(function() {
            arrSequencial.push(parseInt($(this).val()));
        });
        if (arrSequencial.length > 0) {
            for (i = jsonTelefoneArray.length - 1; i >= 0; i--) {
                var obj = jsonTelefoneArray[i];
                if (jQuery.inArray(obj.sequencialTelefone, arrSequencial) > -1) {
                    jsonTelefoneArray.splice(i, 1);
                }
            }
            $("#JsonTelefone").val(JSON.stringify(jsonTelefoneArray));
            fillTableTelefone();
        } else
            smartAlert("Erro", "Marque a caixa para excluir telefone.", "error");
    }

    function carregaTelefone(sequencialTelefone) {
        var arr = jQuery.grep(jsonTelefoneArray, function(item, i) {
            return (item.sequencialTelefone === sequencialTelefone);
        });

        clearFormTelefone();

        if (arr.length > 0) {
            var item = arr[0];
            $("#telefoneId").val(item.telefoneId);
            $("#Telefone").val(item.Telefone);
            $("#sequencialTelefone").val(item.sequencialTelefone);
            $("#telefonePrincipal").val(item.telefonePrincipal);
            if (item.telefonePrincipal === 1) {
                $('#telefonePrincipal').prop('checked', true);
            } else {
                $('#telefonePrincipal').prop('checked', false);
            }
        }
    }

    // REDES SOCIAIS
    function clearFormRedeSocial() {
        $("#redeSocial").val('');
        $("#redeSocialId").val('');
        $("#sequencialRedeSocial").val('');
        $('#redeSocialPrincipal').val(0);
        $('#redeSocialPrincipal').prop('checked', false);
    }

    function fillTableRedeSocial() {
        $("#tableRedeSocial tbody").empty();
        if (typeof(jsonRedeSocialArray) != 'undefined') {
            for (var i = 0; i < jsonRedeSocialArray.length; i++) {
                var row = $('<tr />');
                $("#tableRedeSocial tbody").append(row);
                row.append($('<td><label class="checkbox"><input type="checkbox" name="checkbox" value="' + jsonRedeSocialArray[i].sequencialRedeSocial + '"><i></i></label></td>'));
                row.append($('<td class="text-nowrap" onclick="carregaRedeSocial(' + jsonRedeSocialArray[i].sequencialRedeSocial + ');">' + jsonRedeSocialArray[i].redeSocial + '</td>'));


                if (jsonRedeSocialArray[i].redeSocialPrincipal == 1) {
                    row.append($('<td class="text-nowrap">Sim</td>'));

                } else {
                    row.append($('<td class="text-nowrap">Não</td>'));
                }

            }
            clearFormRedeSocial();
        }
    }

    function validaRedeSocial() {
        var existe = false;
        var achou = false;
        var tel = $('#redeSocial').val();

        var sequencial = parseInt($('#sequencialRedeSocial').val());
        var redeSocialPrincipalMarcado = 0;

        if ($("#redeSocialPrincipal").is(':checked') === true) {
            redeSocialPrincipalMarcado = 1;
        }
        if (!tel) {
            smartAlert("Erro", "Informe uma rede social.", "error");
            return false;
        }
        for (i = jsonRedeSocialArray.length - 1; i >= 0; i--) {
            if (redeSocialPrincipalMarcado === 1) {
                if ((jsonRedeSocialArray[i].redeSocialPrincipal == 1) && (jsonRedeSocialArray[i].sequencialRedeSocial !== sequencial)) {
                    achou = true;
                    break;
                }
            }
            if (tel !== "") {
                if ((jsonRedeSocialArray[i].redeSocial === tel) && (jsonRedeSocialArray[i].sequencialRedeSocial !== sequencial)) {
                    existe = true;
                    break;
                }
            }

        }
        if (existe === true) {
            smartAlert("Erro", "Rede social já cadastrada.", "error");
            return false;
        }
        if ((achou === true) && (redeSocialPrincipalMarcado === 1)) {
            smartAlert("Erro", "Já existe uma rede social principal na lista.", "error");
            return false;
        }
        return true;
    }

    function processDataRedeSocial(node) {

        var fieldId = node.getAttribute ? node.getAttribute('id') : '';
        var fieldName = node.getAttribute ? node.getAttribute('name') : '';
        var value;

        if (fieldName !== '' && (fieldId === "redeSocial")) {
            var valorTel = $("#redeSocial").val().trim();
            if (valorTel !== '') {
                fieldName = "redeSocial";
            }
            return {
                name: fieldName,
                value: valorTel
            };
        }

        if (fieldName !== '' && (fieldId === "redeSocialPrincipal")) {
            value = 0;
            if ($("#redeSocialPrincipal").is(':checked') === true) {
                value = 1;
            }
            return {
                name: fieldName,
                value: value
            };
        }
        return false;
    }

    function addRedeSocial() {
        var item = $("#formRedeSocial").toObject({
            mode: 'combine',
            skipEmpty: false,
            nodeCallback: processDataRedeSocial
        });

        if (!item["sequencialRedeSocial"]) {
            if (jsonRedeSocialArray.length === 0) {
                item["sequencialRedeSocial"] = 1;
            } else {
                item["sequencialRedeSocial"] = Math.max.apply(Math, jsonRedeSocialArray.map(function(o) {
                    return o.sequencialRedeSocial;
                })) + 1;
            }
            item["redeSocialId"] = 0;
        } else {
            item["sequencialRedeSocial"] = +item["sequencialRedeSocial"];
        }

        if (item["sequencialRedeSocial"] > 3) {
            smartAlert("Erro", "Máximo de três redes sociais atingido.", "error");
            item["sequencialRedeSocial"].val("")
        }

        var index = -1;
        $.each(jsonRedeSocialArray, function(i, obj) {
            if (parseInt($('#sequencialRedeSocial').val()) === obj.sequencialRedeSocial) {
                index = i;
                return false;
            }
        });

        if (index >= 0)
            jsonRedeSocialArray.splice(index, 1, item);
        else
            jsonRedeSocialArray.push(item);

        $("#JsonRedeSocial").val(JSON.stringify(jsonRedeSocialArray));
        fillTableRedeSocial();
        clearFormRedeSocial();
    }

    function excluirRedeSocial() {
        var arrSequencial = [];
        $('#tableRedeSocial input[type=checkbox]:checked').each(function() {
            arrSequencial.push(parseInt($(this).val()));
        });
        if (arrSequencial.length > 0) {
            for (i = jsonRedeSocialArray.length - 1; i >= 0; i--) {
                var obj = jsonRedeSocialArray[i];
                if (jQuery.inArray(obj.sequencialRedeSocial, arrSequencial) > -1) {
                    jsonRedeSocialArray.splice(i, 1);
                }
            }
            $("#JsonRedeSocial").val(JSON.stringify(jsonRedeSocialArray));
            fillTableRedeSocial();
        } else
            smartAlert("Erro", "Marque a caixa para excluir rede social.", "error");
    }

    function carregaRedeSocial(sequencialRedeSocial) {
        var arr = jQuery.grep(jsonRedeSocialArray, function(item, i) {
            return (item.sequencialRedeSocial === sequencialRedeSocial);
        });

        clearFormRedeSocial();

        if (arr.length > 0) {
            var item = arr[0];
            $("#redeSocialId").val(item.redeSocialId);
            $("#redeSocial").val(item.redeSocial);
            $("#sequencialRedeSocial").val(item.sequencialRedeSocial);
            $("#redeSocialPrincipal").val(item.redeSocialPrincipal);
            if (item.redeSocialPrincipal === 1) {
                $('#redeSocialPrincipal').prop('checked', true);
            } else {
                $('#redeSocialPrincipal').prop('checked', false);
            }
        }
    }
    // FIM DAS FUNÇÕES DOS CONTATOS

    function pesquisaCPF() {
        let codigo = $("#codigo").val();
        let cpf = $("#cpf").val();

        $.ajax({
            url: "js/sqlscopeCliente.php", //caminho do arquivo a ser executado
            dataType: "html", //tipo do retorno
            type: "post", //metodo de envio
            data: {
                funcao: "consultaCPF",
                codigo: codigo,
                cpf: cpf
            },
            success: function(data) {
                if (data.indexOf("success") < 0) {
                    var piece = data.split("#");
                    var mensagem = piece[1];
                    if (mensagem !== "") {
                        smartAlert("Atenção", mensagem, "error");
                        $("#cpf").val("");
                    }
                }
            }
        })
    }

    function validaCPF() {
        var val = $("#cpf").val();
        var retorno = validacao_cpf(val);
        var funcao = 'verificaCpf';

        if (retorno === false) {
            smartAlert("Atenção", "O cpf digitado é inválido.", "error");
            $("#cpf").val("");
            return;
        }

        if (cpf.length === !11 ||
            cpf === "00000000000" ||
            cpf === "11111111111" ||
            cpf === "22222222222" ||
            cpf === "33333333333" ||
            cpf === "44444444444" ||
            cpf === "55555555555" ||
            cpf === "66666666666" ||
            cpf === "77777777777" ||
            cpf === "88888888888" ||
            cpf === "99999999999") {
            $("#cpf").val("");
            return smartAlert("Error", "Digite um CPF válido!", "error");
        }

        $.ajax({
            method: 'POST',
            url: 'js/sqlscope.php',
            data: {
                funcao,
                val
            },
            success: function(data) {
                var status = data.split('#');
                if (status[0] == 'failed') {
                    smartAlert("Atenção", "O cpf digitado já existe.", "error");
                    $("#cpf").val("");
                    return;
                }
            }
        });
    }
</script>

<!-- http://dontpad.com/ntl/2021/json -->