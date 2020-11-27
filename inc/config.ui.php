<?php

//CONFIGURATION for SmartAdmin UI
//ribbon breadcrumbs config
//array("Display Name" => "URL");
$breadcrumbs = array(
    "Home" => APP_URL . "/index.php"
);

include_once "js/repositorio.php";
session_start();
$login = $_SESSION['login'];
$login = "'" . $login . "'";

$arrayPermissao = array();

$reposit = new reposit();
$result = $reposit->SelectCondTrue("usuario| login = " . $login . " AND ativo = 1");
if ($row = $result) {

    $codigoUsuario = $row['codigo'];
    $tipoUsuario = $row['tipoUsuario'];

    if ($tipoUsuario === "C") {
        $sql = " SELECT FNC.nome FROM dbo.usuarioFuncionalidade USUF
				 INNER JOIN dbo.funcionalidade FNC ON FNC.codigo = USUF.funcionalidade ";
        $sql = $sql . " WHERE USUF.usuario = " . $codigoUsuario . " ";
        $result = $reposit->RunQuery($sql);
        while (($row = odbc_fetch_array($result))) {
            array_push($arrayPermissao, $row["nome"]);
        }
    }
    if ($tipoUsuario === "S") {
        $sql = " SELECT nome FROM dbo.funcionalidade";
        $result = $reposit->RunQuery($sql);
        while (($row = odbc_fetch_array($result))) {
            array_push($arrayPermissao, $row["nome"]);
        }
    }
}

$page_nav = array("home" => array("title" => "Home", "icon" => "fa-home", "url" => APP_URL . "/index.php"));
$condicaoConfiguracoesOK = (in_array('USUARIO_ACESSAR', $arrayPermissao, true));
$condicaoConfiguracoesOK = (($condicaoConfiguracoesOK) OR in_array('PERMISSAOUSUARIO_ACESSAR', $arrayPermissao, true));
$condicaoConfiguracoesOK = (($condicaoConfiguracoesOK) OR in_array('PARAMETRO_ACESSAR', $arrayPermissao, true));

//Cadastro

$condicaoCadastroOK = (in_array('CADASTRO_ACESSAR', $arrayPermissao, true));
$condicaoCadastroOK = (($condicaoCadastroOK) OR in_array('CADASTRO_ACESSAR', $arrayPermissao, true));
$condicaoCadastroOK = (($condicaoCadastroOK) OR in_array('PERMISSAOCADASTRO_GRAVAR', $arrayPermissao, true));
$condicaoCadastroOK = (($condicaoCadastroOK) OR in_array('PERMISSAOREDE_ACESSAR', $arrayPermissao, true));
$condicaoCadastroOK = (($condicaoCadastroOK) OR in_array('PERMISSAOREDE_GRAVAR', $arrayPermissao, true));
$condicaoCadastroOK = (($condicaoCadastroOK) OR in_array('PERMISSAOREDE_EXCLUIR', $arrayPermissao, true));





if ($condicaoConfiguracoesOK) {
    $page_nav['controle'] = array("title" => "Configurações", "icon" => "fa-gear");
    $page_nav['controle']['sub'] = array();
    if (in_array('USUARIO_ACESSAR', $arrayPermissao, true)) {
        $page_nav['controle']['sub'] += array("usuarios" => array("title" => "Usuário", "url" => APP_URL . "/usuarioFiltro.php"));
    }
    if (in_array('PERMISSAOUSUARIO_ACESSAR', $arrayPermissao, true)) {
        $page_nav['controle']['sub'] += array("permissoesUsuarios" => array("title" => "Permissões do Usuário", "url" => APP_URL . "/usuarioFuncionalidadeFiltro.php"));
    }

}


//Cadastro



if ($condicaoCadastroOK) {
    $page_nav['cadastrar'] = array("title" => "Cadastro de Clientes", "icon" => "fa-id-card");
    $page_nav['cadastrar']['sub'] = array();
    if (in_array('CADASTRO_ACESSAR', $arrayPermissao, true)) {
        $page_nav['cadastrar']['sub'] += array("clientes" => array("title" => "Clientes - Lista", "url" => APP_URL . "/clienteFiltro.php"));
    }
    if (in_array('PERMISSAOREDE_ACESSAR', $arrayPermissao, true)) {
        $page_nav['cadastrar']['sub'] += array("redeSocialFiltro" => array("title" => "Redes Sociais - Lista", "url" => APP_URL . "/redeSocialFiltro.php"));
    }
    if (in_array('PERMISSAOUF_ACESSAR', $arrayPermissao, true)) {
        $page_nav['cadastrar']['sub'] += array("UFFiltro" => array("title" => "UF - Lista", "url" => APP_URL . "/UFFiltro.php"));
    }
    
    
}



//configuration variables
$page_title = "";
$page_css = array();
$no_main_header = false; //set true for lock.php and login.php
$page_body_prop = array(); //optional properties for <body>
$page_html_prop = array(); //optional properties for <html>
?>
