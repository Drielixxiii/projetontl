<?php
include "repositorio.php";
include "girComum.php";

$funcao = $_POST["funcao"];

if ($funcao == 'grava') {
    call_user_func($funcao);
}

if ($funcao == 'recupera') {
    call_user_func($funcao);
}

if ($funcao == 'excluir') {
    call_user_func($funcao);
}

if ($funcao == 'consultaCPF') {
    call_user_func($funcao);
}
return;


function consultaCPF()
{
    $reposit = new reposit();

    $codigo = +$_POST['codigo'];
    $cpf = $_POST['cpf'];

    $sql = "SELECT C.cpf, C.codigo FROM dbo.cliente C WHERE C.codigo != $codigo AND cpf = '$cpf'";
    $result = $reposit->RunQuery($sql);
    $row = odbc_fetch_array($result);
    $row = array_map('utf8_encode', $row);
    $cpf = $row["cpf"];
    $codigo = $row["codigo"];

    $ret = "success#";

    if ($cpf != "" || $codigo != "") {
        $ret = "failed#CPF já consta no banco de dados";
        echo $ret;
        return;
    }
    echo $ret;
    return;
}

function grava()
{
    $reposit = new reposit();

    $cliente = $_POST['cliente'];
    $codigo = +$cliente['codigo'];
    $nome = "" . $cliente['nome'] . "";
    $cpf = "" . $cliente['cpf'] . "";
    $sexo =  "" . $cliente['sexo'] . "";
    $situacao = +$cliente['situacao'];
    $dataNascimento = $cliente['dataNascimento'];
    $obs =  "" . $cliente['obs'] . "";
    $logradouroComercial = $cliente['logradouroComercial'];
    $numeroComercial = $cliente['numeroComercial'];
    $complementoComercial = $cliente['complementoComercial'];
    $bairroComercial = $cliente['bairroComercial'];
    $cepComercial = $cliente['cepComercial'];
    $logradouroResidencial = $cliente['logradouroResidencial'];
    $numeroResidencial = $cliente['numeroResidencial'];
    $complementoResidencial = $cliente['complementoResidencial'];
    $bairroResidencial = $cliente['bairroResidencial'];
    $cepResidencial = $cliente['cepResidencial'];
    $dataAdmissao = $cliente['dataAdmissao'];
    $estadoCivil = $cliente['estadoCivil'];
    $ufResidencial = $cliente['ufResidencial'];
    $ufComercial = $cliente['ufComercial'];
    $cidadeResidencial = $cliente['cidadeResidencial'];
    $cidadeComercial = $cliente['cidadeComercial'];

    $strJsonEmail = $cliente["JsonEmail"];
    $arrayJsonEmail = json_decode($strJsonEmail, true);
    $xmlJsonEmail = "";
    $nomeXml = "ArrayOfEmail";
    $nomeTabela = "clienteEmail";
    if (sizeof($arrayJsonEmail) > 0) {
        $xmlJsonEmail = '<?xml version="1.0"?>';
        $xmlJsonEmail = $xmlJsonEmail . '<' . $nomeXml . ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        foreach ($arrayJsonEmail as $chave) {
            $xmlJsonEmail = $xmlJsonEmail . "<" . $nomeTabela . ">";
            foreach ($chave as $campo => $valorEmail) {
                if (($campo === "sequencialEmails")) {
                    continue;
                }
                $xmlJsonEmail = $xmlJsonEmail . "<" . $campo . ">" . $valorEmail . "</" . $campo . ">";
            }
            $xmlJsonEmail = $xmlJsonEmail . "</" . $nomeTabela . ">";
        }
        $xmlJsonEmail = $xmlJsonEmail . "</" . $nomeXml . ">";
    } else {
        $xmlJsonEmail = '<?xml version="1.0"?>';
        $xmlJsonEmail = $xmlJsonEmail . '<' . $nomeXml . ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        $xmlJsonEmail = $xmlJsonEmail . "</" . $nomeXml . ">";
    }
    $xml = simplexml_load_string($xmlJsonEmail);
    if ($xml === false) {
        $mensagem = "Erro na criação do XML de email";
        echo "failed#" . $mensagem . ' ';
        return;
    }

    $strJsonTelefone = $cliente["JsonTelefone"];
    $arrayJsonTelefone = json_decode($strJsonTelefone, true);
    $xmlJsonTelefone = "";
    $nomeXml = "ArrayOfTelefone";
    $nomeTabela = "clienteTelefone";
    if (sizeof($arrayJsonTelefone) > 0) {
        $xmlJsonTelefone = '<?xml version="1.0"?>';
        $xmlJsonTelefone = $xmlJsonTelefone . '<' . $nomeXml . ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        foreach ($arrayJsonTelefone as $chave) {
            $xmlJsonTelefone = $xmlJsonTelefone . "<" . $nomeTabela . ">";
            foreach ($chave as $campo => $valor) {
                if (($campo === "sequencialTelefone")) {
                    continue;
                }
                $xmlJsonTelefone = $xmlJsonTelefone . "<" . $campo . ">" . $valor . "</" . $campo . ">";
            }
            $xmlJsonTelefone = $xmlJsonTelefone . "</" . $nomeTabela . ">";
        }
        $xmlJsonTelefone = $xmlJsonTelefone . "</" . $nomeXml . ">";
    } else {
        $xmlJsonTelefone = '<?xml version="1.0"?>';
        $xmlJsonTelefone = $xmlJsonTelefone . '<' . $nomeXml . ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        $xmlJsonTelefone = $xmlJsonTelefone . "</" . $nomeXml . ">";
    }
    $xml = simplexml_load_string($xmlJsonTelefone);
    if ($xml === false) {
        $mensagem = "Erro na criação do XML de telefone";
        echo "failed#" . $mensagem . ' ';
        return;
    }

    $strJsonRedeSocial = $cliente["JsonRedeSocial"];
    $arrayJsonRedeSocial = json_decode($strJsonRedeSocial, true);
    $xmlJsonRedeSocial = "";
    $nomeXml = "ArrayOfRedeSocial";
    $nomeTabela = "clienteRedeSocial";
    if (sizeof($arrayJsonRedeSocial) > 0) {
        $xmlJsonRedeSocial = '<?xml version="1.0"?>';
        $xmlJsonRedeSocial = $xmlJsonRedeSocial . '<' . $nomeXml . ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        foreach ($arrayJsonRedeSocial as $chave) {
            $xmlJsonRedeSocial = $xmlJsonRedeSocial . "<" . $nomeTabela . ">";
            foreach ($chave as $campo => $valor) {
                if (($campo === "sequencialRedeSocial")) {
                    continue;
                }
                $xmlJsonRedeSocial = $xmlJsonRedeSocial . "<" . $campo . ">" . $valor . "</" . $campo . ">";
            }
            $xmlJsonRedeSocial = $xmlJsonRedeSocial . "</" . $nomeTabela . ">";
        }
        $xmlJsonRedeSocial = $xmlJsonRedeSocial . "</" . $nomeXml . ">";
    } else {
        $xmlJsonRedeSocial = '<?xml version="1.0"?>';
        $xmlJsonRedeSocial = $xmlJsonRedeSocial . '<' . $nomeXml . ' xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">';
        $xmlJsonRedeSocial = $xmlJsonRedeSocial . "</" . $nomeXml . ">";
    }
    $xml = simplexml_load_string($xmlJsonRedeSocial);
    if ($xml === false) {
        $mensagem = "Erro na criação do XML de rede social.";
        echo "failed#" . $mensagem . ' ';
        return;
    }

    if ($cliente['dataNascimento'] != "") {
        $aux = explode('/', $cliente['dataNascimento']);
        $data = $aux[2] . '-' . $aux[1] . '-' . $aux[0];
        $data = "'" . trim($data) . "'";
        $dataNascimento = $data;
    } else {
        $dataNascimento = 'NULL';
    }

    if ($cliente['dataAdmissao'] != "") {
        $aux = explode('/', $cliente['dataAdmissao']);
        $data = $aux[2] . '-' . $aux[1] . '-' . $aux[0];
        $data = "'" . trim($data) . "'";
        $dataAdmissao = $data;
    } else {
        $dataAdmissao = 'NULL';
    }

    $sql = "dbo.cliente_Atualiza($codigo, '$nome','$cpf','$sexo','$situacao',$dataNascimento,'$obs',
     '$logradouroComercial','$numeroComercial','$complementoComercial','$bairroComercial','$cepComercial',
     '$logradouroResidencial','$numeroResidencial','$complementoResidencial','$bairroResidencial','$cepResidencial',
      $dataAdmissao,
      '$xmlJsonEmail',
      '$xmlJsonTelefone',
      '$estadoCivil','$xmlJsonRedeSocial',
      '$ufResidencial','$ufComercial',
      '$cidadeResidencial','$cidadeComercial')";


    $result = $reposit->Execprocedure($sql);
    $ret = 'sucess#';
    if ($result[0] < 1) {
        $ret = 'failed#';
    }
    echo $ret;
    return;
}

function recupera()
{
    if ((empty($_POST["codigo"])) || (!isset($_POST["codigo"])) || (is_null($_POST["codigo"]))) {
        $mensagem = "Nenhum parâmetro de pesquisa foi informado.";
        echo "failed#$mensagem";
        return;
    } else {
        $codigo = +$_POST["codigo"];
    }

    $sql = "SELECT * FROM dbo.cliente
    WHERE codigo = $codigo";

    $reposit = new reposit();
    $result = $reposit->RunQuery($sql);

    // $out = "";
    if (($row = odbc_fetch_array($result)))
        $row = array_map('utf8_encode', $row);

    $codigo = $row['codigo'];
    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $sexo = $row['sexo'];
    $situacao = $row['situacao'];
    $dataNascimento = $row['dataNascimento'];
    $obs = $row['obs'];
    $logradouroComercial = $row['logradouroComercial'];
    $numeroComercial = $row['numeroComercial'];
    $complementoComercial = $row['complementoComercial'];
    $bairroComercial = $row['bairroComercial'];
    $cepComercial = $row['cepComercial'];
    $logradouroResidencial = $row['logradouroResidencial'];
    $numeroResidencial = $row['numeroResidencial'];
    $complementoResidencial = $row['complementoResidencial'];
    $bairroResidencial = $row['bairroResidencial'];
    $cepResidencial = $row['cepResidencial'];
    $dataAdmissao = $row['dataAdmissao'];
    $estadoCivil = $row['estadoCivil'];
    $ufResidencial = $row['ufResidencial'];
    $ufComercial = $row['ufComercial'];
    $cidadeResidencial = $row['cidadeResidencial'];
    $cidadeComercial = $row['cidadeComercial'];

    // RECUPERA CONTATOS
    /*************SQL EMAIL *************/
    $sqlEmail = "SELECT codigo,cliente, email AS Emails, emailPrincipal AS EmailsPrincipal FROM dbo.clienteEmail where cliente = $codigo";

    $arrayEmail = [];

    $repositEmail = new reposit();
    $resultEmail = $repositEmail->RunQuery($sqlEmail);

    $contadorEmail = 0;
    while ($rowEmail = odbc_fetch_array($resultEmail)) {
        $contadorEmail++;
        $rowEmail = array_map('utf8_encode', $rowEmail);
        $rowEmail['sequencialEmails'] = $contadorEmail;
        array_push($arrayEmail, $rowEmail);
    }
    $strArrayEmail  = json_encode($arrayEmail);

    /*************SQL TELEFONE *************/
    $sqlTelefone = "SELECT codigo,cliente,telefone AS Telefone,telefonePrincipal FROM dbo.clienteTelefone where cliente = $codigo";
    $arrayTelefone = [];

    $repositTelefone = new reposit();
    $resultTelefone = $repositTelefone->RunQuery($sqlTelefone);

    $contadorTelefone = 0;
    while ($rowTelefone = odbc_fetch_array($resultTelefone)) {
        $contadorTelefone++;
        $rowTelefone = array_map('utf8_encode', $rowTelefone);
        $rowTelefone['sequencialTelefone'] = $contadorTelefone;
        array_push($arrayTelefone, $rowTelefone);
    }
    $strArrayTelefone = json_encode($arrayTelefone);

    /*************SQL REDE SOCIAL *************/
    $sqlRedeSocial = "SELECT codigo,cliente,  redeSocial,  redeSocialPrincipal  FROM dbo.clienteRedeSocial where cliente = $codigo";
    $arrayRedeSocial = [];

    $repositRedeSocial = new reposit();
    $resultRedeSocial = $repositRedeSocial->RunQuery($sqlRedeSocial);

    $contadorRedeSocial = 0;
    while ($rowRedeSocial = odbc_fetch_array($resultRedeSocial)) {
        $contadorRedeSocial++;
        $rowRedeSocial = array_map('utf8_encode', $rowRedeSocial);
        $rowRedeSocial['sequencialRedeSocial'] = $contadorRedeSocial;
        array_push($arrayRedeSocial, $rowRedeSocial);
    }
    $strArrayRedeSocial  = json_encode($arrayRedeSocial);


    $dataNascimento = ($row['dataNascimento']);
    if ($row['dataNascimento'] != "") {
        $aux = explode(' ', $row['dataNascimento']);
        $data = $aux[1] . ' ' . $aux[0];
        $data = $aux[0];
        $data =  trim($data);
        $aux = explode('-', $data);
        $data = $aux[2] . '/' . $aux[1] . '/' . $aux[0];
        $data =  trim($data);
        $dataNascimento = $data;
    } else {
        $dataNascimento = '';
    }

    $dataAdmissao = ($row['dataAdmissao']);
    if ($row['dataAdmissao'] != "") {
        $aux = explode(' ', $row['dataAdmissao']);
        $data = $aux[1] . ' ' . $aux[0];
        $data = $aux[0];
        $data =  trim($data);
        $aux = explode('-', $data);
        $data = $aux[2] . '/' . $aux[1] . '/' . $aux[0];
        $data =  trim($data);
        $dataAdmissao = $data;
    } else {
        $dataAdmissao = '';
    }

    $out =  $codigo . "^" .
        $nome . "^" .
        $cpf . "^" .
        $sexo . "^" .
        $situacao . "^" .
        $dataNascimento . "^" .
        $obs . "^" .
        $logradouroComercial . "^" .
        $numeroComercial . "^" .
        $complementoComercial . "^" .
        $bairroComercial . "^" .
        $cepComercial . "^" .
        $logradouroResidencial . "^" .
        $numeroResidencial . "^" .
        $complementoResidencial . "^" .
        $bairroResidencial . "^" .
        $cepResidencial . "^" .
        $dataAdmissao . "^" .
        $estadoCivil . "^" .
        $ufResidencial . "^" .
        $ufComercial . "^" .
        $cidadeResidencial . "^" .
        $cidadeComercial;

    if (!$out) {
        echo "failed#";
        return;
    }

    echo "sucess#" . $out  . "#" . $strArrayEmail . "#" . $strArrayTelefone . "#" . $strArrayRedeSocial;
    return;
}

function excluir()
{
    $codigo = $_POST['codigo'];

    $reposit = new reposit();
    $result = $reposit->update('cliente' . '|' . 'situacao = 0' . '|' . 'codigo =' . $codigo);

    if ($result < 0) {
        echo ('failed#');
        return;
    }
    echo 'sucess#' . $result;
    return;
}
