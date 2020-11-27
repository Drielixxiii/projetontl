<?php
include "js/repositorio.php";
?>
<div class="table-container">
    <div class="table-responsive" style="min-height: 115px; border: 1px solid #ddd; margin-bottom: 13px; overflow-x: auto;">
        <table id="tableSearchResult" class="table table-bordered table-striped table-condensed table-hover dataTable">
            <thead>
                <tr role="row">
                    <th class="text-left" style="min-width:30px;">Nome</th>
                    <th class="text-left" style="min-width:30px;">CPF</th>
                    <th class="text-left" style="min-width:30px;">Data de admissão</th>
                    <th class="text-left" style="min-width:30px;">Situação</th>
                    <th class="text-left" style="min-width:5px;">PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nome = $_POST['nomeFiltro'];
                $cpf = $_POST['cpfFiltro'];
                $situacao = $_POST['situacaoFiltro'];
                $dataAdmissaoInicial = $_POST['dataAdmissaoInicialFiltro'];
                $dataAdmissaoFinal = $_POST['dataAdmissaoFinalFiltro'];

                $where = "WHERE 0 = 0";


                if ($nome != "") {
                    $where = $where . " AND (nome like '%' + " . "replace('" . $nome . "',' ','%') + " . "'%')";
                }


                if ($cpf) {
                    $where .= " AND cliente.cpf = '$cpf' ";
                }

                if ($situacao != "") {
                    $where .= " AND situacao = $situacao";
                }

                if ($dataAdmissaoInicial != "") {
                    $aux = explode('/', $dataAdmissaoInicial);
                    $data = $aux[2] . '-' . $aux[1] . '-' . $aux[0];
                    $data = "'" . trim($data) . "'";
                    $dataAdmissaoInicial = $data;
                    $where .= " AND cliente.dataAdmissao >= $dataAdmissaoInicial ";
                } else {
                    $dataAdmissaoInicial = 'NULL';
                }

                if ($dataAdmissaoFinal != "") {
                    $aux = explode('/', $dataAdmissaoFinal);
                    $data = $aux[2] . '-' . $aux[1] . '-' . $aux[0];
                    $data = "'" . trim($data) . "'";
                    $dataAdmissaoFinal = $data;
                    $where .= " AND cliente.dataAdmissao <= $dataAdmissaoFinal ";
                } else {
                    $dataAdmissaoFinal = 'NULL';
                }

                $sql = "SELECT codigo, nome, cpf, situacao, dataAdmissao FROM dbo.cliente ";


                $sql = $sql . $where;
                $reposit = new reposit();
                $result = $reposit->RunQuery($sql);

                while (($row = odbc_fetch_array($result))) {

                    $codigo = mb_convert_encoding(+$row['codigo'], 'UTF-8', 'HTML-ENTITIES');
                    $nome = mb_convert_encoding($row['nome'], 'UTF-8', 'HTML-ENTITIES');
                    $cpf = mb_convert_encoding($row['cpf'], 'UTF-8', 'HTML-ENTITIES');
                    $situacao = mb_convert_encoding($row['situacao'], 'UTF-8', 'HTML-ENTITIES');
                    $dataAdmissao = mb_convert_encoding($row['dataAdmissao'], 'UTF-8', 'HTML-ENTITIES');

                    $dataAdmissao = $row['dataAdmissao'];
                    if ((empty($dataAdmissao)) || (!isset($dataAdmissao)) ||  (is_null($dataAdmissao))) {
                        $dataAdmissao = '';
                    } else {
                        $dataAux = new DateTime($dataAdmissao);
                        $dataAdmissao = $dataAux->format('d/m/Y');
                    }

                    echo '<tr >';
                    echo '<td class="text-left"><a href="clienteCadastro.php?id=' . $codigo . '">' . $nome . '</a></td>';
                    echo '<td class="text-left">' . $cpf . '</td>';
                    echo '<td class="text-left">' . $dataAdmissao . '</td>';
                    if ($situacao == 1) { #CLIENTE
                        echo '<td class="text-left" >' . "Cliente" . '</td>';
                    } else {
                        echo '<td class="text-left" style = "color:red">' . "Prospect" . '</td>';
                    }
                    if ($situacao == 1) { #CLIENTE
                        echo '<td class="text-left"><a href="newPDF.php?codigo='  . $codigo . '" target="_blank">
                                       <button type="button" id="btnPDF" class="btn btn-light" aria-hidden="true" title="Gerar PDF">
                                                <span class="fa fa-file-pdf-o"></span>
                                            </button>
                                       </a></td>';
                    } else {
                        echo '<td class="text-left"><a href="newPDF.php?codigo=' . $codigo . '" target="_blank">
                           <button type="button" id="btnPDF" class="btn btn-danger" aria-hidden="true" title="Gerar PDF">
                              <span class="fa fa-file-pdf-o"></span>
                           </button>
                        </a></td>';
                    }
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
    </div>
</div>
<!-- PAGE RELATED PLUGIN(S) -->
<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
<!--script src="js/plugin/datatables/dataTables.tableTools.min.js"></script-->
<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>








<!-- Botão de PDF alternativo e barra de colunas  -->
<link rel="stylesheet" type="text/css" href="js/plugin/Buttons-1.5.2/css/buttons.dataTables.min.css" />

<script type="text/javascript" src="js/plugin/JSZip-2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="js/plugin/pdfmake-0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="js/plugin/pdfmake-0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="js/plugin/Buttons-1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/plugin/Buttons-1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="js/plugin/Buttons-1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/plugin/Buttons-1.5.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        var responsiveHelper_datatable_tabletools = undefined;

        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        /* TABLETOOLS */
        $('#tableSearchResult').dataTable({

            // Tabletools options:
            //   https://datatables.net/extensions/tabletools/button_options
            "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'B'l'C>r>" +
                "t" +
                "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
            "oLanguage": {
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>',
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sLengthMenu": "_MENU_",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            "buttons": [
                //{extend: 'copy', className: 'btn btn-default'},
                //{extend: 'csv', className: 'btn btn-default'},
                // {
                //     extend: 'excel',
                //     className: 'btn btn-default'
                // },
                // {
                //     extend: 'pdf',
                //     className: 'btn btn-default'
                // },
                //{extend: 'print', className: 'btn btn-default'}
            ],
            "autoWidth": true,

            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_tabletools) {
                    responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($(
                        '#tableSearchResult'), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_datatable_tabletools.respond();
            }
        });

        /* END TABLETOOLS */
    });
</script>

<!-- http://dontpad.com/drielen -->