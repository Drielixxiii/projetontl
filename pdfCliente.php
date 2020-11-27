 <!-- cliente -->
 <?php

    include "repositorio.php";

    //initilize the page
    require_once("inc/init.php");
    //require UI configuration (nav, ribbon, etc.)
    require_once("inc/config.ui.php");

    require('./fpdf/mc_table.php');

    if ((empty($_GET["codigo"])) || (!isset($_GET["codigo"])) || (is_null($_GET["codigo"]))) {
        $mensagem = "Nenhum parâmetro de pesquisa foi informado.";
        echo "failed#" . $mensagem . ' ';
        return;
    } else {
        $codigo = +$_GET["codigo"];
    }

    $sql = "SELECT 
    C.codigo,
    C.nome,
    C.cpf,
    C.situacao,
    C.dataNascimento,
    C.dataAdmissao,
    C.logradouroResidencial,
    C.numeroResidencial,
    C.bairroResidencial,
    CL.codigo,
    U.codigo,
    U.descricao AS uf,
 from dbo.cliente C 
 LEFT JOIN dbo.unidadeFederativa U ON C.ufResidencial = U.descricao
 WHERE  C.codigo = $codigo";

    #esse sql faz um select nas variaveis da tabela cliente, apelidada de C.
    #aqui(LINHA 26) apelida a descrição da tabela unidade federativa(apelidada de U.) e puxa a descrição de cada unidade federativa.
    #tudo da tabela cliente apelidada de C.
    #junta a tabela unidade federativa com a variavel ufResidencial pucando o código da tabela cliente.

    $sql = "SELECT * 
            FROM dbo.clienteEmail E 
            INNER JOIN dbo.cliente CT ON E.cliente = CT.codigo 
            WHERE CT.codigo = $codigo";

    $result = $reposit->RunQuery($sql);

    $arrayEmail = array();
    $contadorEmail = 0;

    while ($row = odbc_fetch_array($result)) {

        $email = mb_convert_encoding($row['email'], 'UTF-8', 'HTML-ENTITIES');
        $emailPrincipal = +$row['emailPrincipal'];
        $emailCodigo = +$row['codigo'];

        $contadorEmail = $contadorEmail + 1;
        $arrayEmail[] = array(
            "sequencialEmail" => $contadorEmail,
            "emailId" => $emailCodigo,
            "email" => $email,
            "emailPrincipal" => $emailPrincipal
        );
    }
    $strArrayEmail = json_encode($arrayEmail);

    $sql = "SELECT * 
            FROM dbo.clienteTelefone T INNER JOIN dbo.cliente C 
            ON T.cliente = C.codigo 
            WHERE C.codigo = $codigo";

    $result = $reposit->RunQuery($sql);

    $arrayTelefone = array();
    $contadorTelefone = 0;

    while ($row = odbc_fetch_array($result)) {

        $telefone = mb_convert_encoding($row['telefone'], 'UTF-8', 'HTML-ENTITIES');
        $telefonePrincipal = +$row['telefonePrincipal'];
        $telefoneCodigo = +$row['codigo'];

        $contadorTelefone = $contadorTelefone + 1;
        $arrayTelefone[] = array(
            "sequencialTelefone" => $contadorTelefone,
            "telefoneId" => $telefoneCodigo,
            "telefone" => $telefone,
            "telefonePrincipal" => $telefonePrincipal
        );
    }
    $strArrayTelefone = json_encode($arrayTelefone);



    $reposit = new reposit();
    $result = $reposit->RunQuery($sql);

    $out = "";
    if (($row = odbc_fetch_array($result))) {
        $row = array_map('utf8_encode', $row);
        $codigo = $row['codigo'];
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $situacao = $row['situacao'];
        $dataNascimento = $row['dataNascimento'];
        $dataAdmissao = $row['dataAdmissao'];
        $logradouroResidencial = $row['logradouroResidencial'];
        $numeroResidencial = $row['numeroResidencial'];
        $bairroResidencial = $row['bairroResidencial'];
        $ufResidencial = $row['uf'];
        // $cargo = $row['cargo'];

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
    }


    require_once('fpdf/fpdf.php');

    class PDF extends FPDF
    {

        function Header()
        {
            global $codigo;

            $this->Cell(116, 1, "", 0, 1, 'C', 0); #Título do Relatório
            // $this->Image('img/logoDaEmpresa.png', 6, 5, 28, 25); #logo da empresa
            $this->SetXY(190, 5);
            $this->SetFont('Arial', 'B', 8); #Seta a Fonte
            $this->Cell(20, 5, 'Pagina ' . $this->pageno()); #Imprime o Número das Páginas

            $this->Ln(11); #Quebra de Linhas
            $this->Ln(8);
        }

        function Footer()
        {

            $this->SetY(202);
        }
    }

    $pdf = new PDF('P', 'mm', 'A4'); #Crio o PDF padrão RETRATO, Medida em Milímetro e papel A$
    $pdf->SetMargins(5, 10, 5); #Seta a Margin Esquerda com 20 milímetro, superrior com 20 milímetro e esquerda com 20 milímetros
    $pdf->SetDisplayMode('default', 'continuous'); #Digo que o PDF abrirá em tamanho PADRÃO e as páginas na exibição serão contínuas
    $pdf->AddPage();


    $pdf = new PDF('P', 'mm', 'A4'); #Crio o PDF padrão RETRATO, Medida em Milímetro e papel A$
    $pdf->SetMargins(5, 10, 5); #Seta a Margin Esquerda com 20 milímetro, superrior com 20 milímetro e esquerda com 20 milímetros
    $pdf->SetDisplayMode('default', 'continuous'); #Digo que o PDF abrirá em tamanho PADRÃO e as páginas na exibição serão contínuas
    $pdf->AddPage();


    $pdf->SetY(35);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(25, 5, iconv('UTF-8', 'windows-1252', "Ficha"), 0, 0, "L", 0);
    $pdf->Ln(8);
    $pdf->Line(5, 41, 200, 41); #Linha na Horizontal

    //primeira linha
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(12, 5, iconv('UTF-8', 'windows-1252', "Nome :"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(40, 5, iconv('UTF-8', 'windows-1252', $nome), 0, 0, "L", 0);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(8, 5, iconv('UTF-8', 'windows-1252', "CPF:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(32, 5, iconv('UTF-8', 'windows-1252', $cpf), 0, 0, "L", 0);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(30, 5, iconv('UTF-8', 'windows-1252', "Data de Nascimento:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(35, 5, iconv('UTF-8', 'windows-1252', $dataNascimento), 0, 0, "L", 0);

    //segunda linha
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(27, 5, iconv('UTF-8', 'windows-1252', "Data de Admissão:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(25, 5, iconv('UTF-8', 'windows-1252', $dataAdmissao), 0, 0, "L", 0);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(14, 5, iconv('UTF-8', 'windows-1252', "Situação:"), 0, 0, "L", 0);
    if ($situacao == 1) {
        $situacao = "Cliente";
    } else {
        $situacao = "Prospect";
    }
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(26, 5, iconv('UTF-8', 'windows-1252', $situacao), 0, 0, "L", 0);
    // $pdf->SetFont('Arial', 'B', 8.5);
    // $pdf->Cell(10, 5, iconv('UTF-8', 'windows-1252', "Cargo:"), 0, 0, "L", 0);
    // $pdf->SetFont('Arial', '', 8);
    // $pdf->Cell(25, 5, iconv('UTF-8', 'windows-1252', $cargo), 0, 0, "L", 0);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Ln(6);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(10, 5, iconv('UTF-8', 'windows-1252', "Endereço:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(60, 5, iconv('UTF-8', 'windows-1252', $logradouroResidencial . ", " . $numeroResidencial . "."), 0, 0, "L", 0);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(10, 5, iconv('UTF-8', 'windows-1252', "Bairro:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(30, 5, iconv('UTF-8', 'windows-1252', $bairroResidencial), 0, 0, "L", 0);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(12, 5, iconv('UTF-8', 'windows-1252', "Estado:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(50, 5, iconv('UTF-8', 'windows-1252', $ufResidencial), 0, 0, "L", 0);

    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(20, 5, iconv('UTF-8', 'windows-1252', "Contatos"), 0, 0, "L", 0);
    $linha = $pdf->Ultimalinha();
    $pdf->Ln(6);
    $pdf->Line(5, $linha + 2, 200, $linha + 2); #Linha na Horizontal
    $pdf->SetFillColor(234, 234, 234);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(11, 5, iconv('UTF-8', 'windows-1252', "Email:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(50, 5, iconv('UTF-8', 'windows-1252', $email), 0, 0, "L", 0);
    $pdf->SetFont('Arial', 'B', 8.5);
    $pdf->Cell(14, 5, iconv('UTF-8', 'windows-1252', "Telefone:"), 0, 0, "L", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(50, 5, iconv('UTF-8', 'windows-1252', $telefone), 0, 0, "L", 0);

    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(30, 5, iconv('UTF-8', 'windows-1252', "Declaração"), 0, 0, "L", 0);
    $linha = $pdf->Ultimalinha();
    $pdf->Ln(6);

    $pdf->Line(5, $linha + 2, 200, $linha + 2); #Linha na Horizontal
    $pdf->SetFont('Arial', 'B', 7);

    $dataAtual = date("d/m/Y");
    $seisDias = date("d");
    $seisMeses = date("m") + 6;
    if ($seisMeses > 12) {
        $seisMeses = date("m") - 6;
    } else {
        $seisMeses * -1;
    }

    // if ($seisMeses > 6) {
    $seisAnos = date("Y") + 1;
    // }
    $pdf->SetFont('Arial', '', 8);
    $pdf->Multicell(0, 3, iconv('UTF-8', 'windows-1252', "Eu $nome, inscrito no CPF de número $cpf, declaro por meio desta, meu desligamento da empresa, em concordância de me dispor como Prospect, por um período de 6 meses. A partir da data de hoje: $dataAtual, até $seisDias/$seisMeses/$seisAnos. Manterei atualizadas as informações que acima deixei disponíveis durante esse período.
 \nDeclaro ainda, que as informações supra, são a expressão da verdade, ciente de que o erro nas mesmas não será notável pela empresa."));

    // $pdf->SetFont('Arial', '', 8);
    // $pdf->Multicell(0, 3, iconv('UTF-8', 'windows-1252', "Declaro que as informações supra, são a expressão da verdade, ciente de que o erro nas mesmas não será notável pela empresa."));

    $pdf->Ln(20);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Assinatura:___________________________________________________________________________."), 0, 0, "C", 0);
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'B', 8);
    $anoAtual = date("Y");
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "Rio de Janeiro, ________ de _________________________________ de $anoAtual "), 0, 0, "C", 0);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Ln(11);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(0, 0, iconv('UTF-8', 'windows-1252', "CTPS :_______________________________."), 0, 0, 'C', 0);
    $pdf->Ln();

    $pdf->SetFillColor(234, 234, 234);
    $pdf->SetFont('Arial', 'B', 8);

    $pdf->SetFont('Arial', '', 8);
    $contador = 0;

    $pdf->Output();
