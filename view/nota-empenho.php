<?php

/**********************************************************************
 *                           OBSERVAÇÃO!!!                            *
 *                                                                    *
 * Para exibir os acentos corretamente usar:                          *
 *                                                                    *
 *  >>>   iconv('UTF-8', 'windows-1252', [texto])   <<<               *
 *                                                                    *
 * como nos exemplos pré inseridos na tabela                          *
 **********************************************************************/

include_once 'conn/config-geral.php';
include_once 'helper/formatar_docs.php';

// inclui a classe FPDF
require_once 'pdf/fpdf.php';
require_once 'pdf/exfpdf.php';
require_once 'pdf/easyTable.php';

ob_end_clean();
ob_start();

// define o local do charset
setlocale(LC_ALL, 'pt_BR');

// define o fuso horário
date_default_timezone_set('America/Sao_Paulo');

// tabelas
$tabItens = TAB_ITENS;
$tabEmpenhos = TAB_EMPENHOS;
$tabEmpItens = TAB_EMP_ITENS;

// variáveis de data e hora
$dia = date('d/m/Y');
$hora = date('H:i');

$pdf=new exFPDF();
// define formato da página = Orientação Paisagem, Medida em Milímetros, Tamanho A4
$pdf->__construct('P', 'mm', 'A4');
// adiciona página
$pdf->AddPage();
// define fonte e tamanho padrão
$pdf->SetFont('arial','',10,);
// contagem de total de páginas
$pdf->AliasNbPages();


$table=new easyTable($pdf, '%{5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5}', 'width:280; border:0; font-size:8; line-height:1.2; paddingX:0.8');

// CABEÇALHO
$table->easyCell('', 'img: assets/img/brasao-pref.png, w15; colspan:3; valign:M; align:C; rowspan:4,');
$table->easyCell(iconv('UTF-8', 'windows-1252', '<b>PREFEITURA MUNICIPAL DE CAMPINAS</b>
<s "font-size:9;">Avenida Anchieta, 200 - Centro - Campinas/SP
C.N.P.J. 51.885.242/0001-40 - Inscr. Est.: Isento
Fone: (19) 2116-0555</s>'), 'colspan:14; font-size:10; align:C; valign:T; rowspan:4,');
$table->easyCell('<b>Data: </b>'.$dia. '
<b>Hora: </b>' .$hora, 'colspan:3; font-size:8; valign:M; align:L; rowspan:4,');
$table->printRow();

// ESPAÇAMENTO
$table->rowStyle('min-height:3;');
$table->easyCell('', 'colspan:20');
$table->printRow();

$get = filter_input_array(INPUT_GET, FILTER_DEFAULT);

// armazeno o valor recuperado da URL
$numEmpenho = $get["empId"];

// monto a astring de comando dos dados do empenho
$condEmpenho = "WHERE num_empenho iLIKE '{$numEmpenho}' ";

// executo a string de comando
$sqlEmpenhos = Selecionar($tabItens, $condEmpenho, $conecta);

// executo o laço para pegar os valores da consulta
foreach ($sqlEmpenhos[0] as $resEmp):
    $resData = $resEmp['dt_emissao'];

    // pego somente a data e descarto o horário
    $dataFull = explode(' ', $resData);
    $dataCompleta = $dataFull[0];

    $numProcesso = $resEmp['num_processo'];
    $numEmpenho = $resEmp['num_empenho'];
    $descrTipoEmpenho = $resEmp['descr_tipo_empenho'];
    $descrModCompra = $resEmp['descr_mod_compra'];
    $dtEmissao = $dataCompleta;
    $nomeFornecedor = $resEmp['nome_fornecedor'];
    $cnpj = $resEmp['cgc_fornecedor'];
endforeach;

// DADOS DO EMPENHO
$table->rowStyle('min-height:5; font-style:N; font-size:9; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('NOTA DE EMPENHO'), 'font-style:B; align:C; colspan:20;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#ccc; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Dados do Empenho'), 'font-style:B; align:L; colspan:20;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Processo:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $numProcesso), 'align:L; colspan:12;');
$table->easyCell(utf8_decode('Empenho:'), 'font-style:B; align:L; colspan:2;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $numEmpenho), 'align:L; colspan:3;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Objeto:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $descrTipoEmpenho), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Modalidade:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $descrModCompra), 'align:L; colspan:12;');
$table->easyCell(utf8_decode('Data:'), 'font-style:B; align:L; colspan:2;');
$table->easyCell(date('d/m/Y', strtotime($dtEmissao)), 'align:L; colspan:3;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Fornecedor:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $nomeFornecedor), 'align:L; colspan:12;');
$table->easyCell(utf8_decode('CNPJ/CPF:'), 'font-style:B; align:L; colspan:2;');
$table->easyCell(iconv('UTF-8', 'windows-1252', formatCnpjCpf($cnpj)), 'align:L; colspan:3;');
$table->printRow();

// ESPAÇAMENTO
$table->rowStyle('min-height:3;');
$table->easyCell('', 'colspan:20');
$table->printRow();

// monto a string de comando dos dados do orçamento
$condEmpOrcam = "SELECT e.cod_uo, e.descr_uo, e.cod_ug, e.descr_gestora, ";
$condEmpOrcam .= "e.cod_programa, e.descr_acao, e.cod_fonte, e.descr_fonte, ";
$condEmpOrcam .= "e.cod_despesa, ei.descr_despesa ";
$condEmpOrcam .= "FROM {$tabEmpenhos} AS e ";
$condEmpOrcam .= "INNER JOIN {$tabEmpItens} AS ei ";
$condEmpOrcam .= "ON ei.num_empenho = e.num_empenho ";
$condEmpOrcam .= "AND e.num_empenho iLIKE '{$numEmpenho}' ";

// executo a string de comando
$sqlEmpOrcam = SelecionarFull($condEmpOrcam, $conecta);

// executo o laço para pegar os valores da consulta
foreach ($sqlEmpOrcam[0] as $resOrc):
    $unidadeGestora = $resOrc['cod_ug'] . ' - ' . $resOrc['descr_gestora'];
    $unidadeOrcamentaria = $resOrc['cod_uo'] . ' - ' . $resOrc['descr_uo'];
    $funcProgramatica = $resOrc['cod_programa'] . ' - ' . $resOrc['descr_acao'];
    $subelementoDespesa = $resOrc['cod_despesa'] . ' - ' . $resOrc['descr_despesa'];
    $fonteRecurso = $resOrc['cod_fonte'] . ' - ' .$resOrc['descr_fonte'];
endforeach;

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#ccc; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Dados do Orçamento'), 'font-style:B; align:L; colspan:20;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'Unid. Gestora: '), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $unidadeGestora), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'Unid. Orçamentária: '), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $unidadeOrcamentaria), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Func. Programática:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $funcProgramatica), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Sub-Elemento Desp:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $subelementoDespesa), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Fonte de Recurso:'), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', $fonteRecurso), 'align:L; colspan:17;');
$table->printRow();

// ESPAÇAMENTO
$table->rowStyle('min-height:3;');
$table->easyCell('', 'colspan:20');
$table->printRow();

// CABEÇALHO DA TABELA
$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#ccc; paddingY:0.5; border:1; valign:M;');
$table->easyCell(utf8_decode('Especificações'), 'font-style:B; align:L; colspan:20;');
$table->printRow();
$table->rowStyle('min-height:5; font-style:B; font-size:7; bgcolor:#e6faff; paddingY:0.5; border:1; valign:M;');
$table->easyCell('#', 'align:C; colspan:1;');
$table->easyCell('COD', 'align:C; colspan:2');
$table->easyCell('ITEM', 'align:C; colspan:8;');
$table->easyCell('UNIDADE', 'align:C; colspan:2;');
$table->easyCell('QTD', 'align:C; colspan:2;');
$table->easyCell(utf8_decode('VR UNITÁRIO'), 'align:C; colspan:2;');
$table->easyCell('VR EMPENHO', 'align:C; colspan:3;');
// Repete em todas as páginas = true
$table->printRow(true);

// INÍCIO DA TABELA

// string de comando dos itens do empenho
//$condEmpItens = "SELECT e.vl_empenho, i.cod_reduzido, i.complemento_item, ";
$condEmpItens = "SELECT distinct ON (i.cod_reduzido) cod_reduzido, i.vl_empenho, ";
$condEmpItens .= "i.complemento_item, i.unidade, SUM(i.qt_recebida) AS qt_recebida, vl_unitario ";
$condEmpItens .= "FROM {$tabItens} AS i ";
//$condEmpItens .= "INNER JOIN {$tabItens} AS i ";
//$condEmpItens .= "ON i.num_empenho = e.num_empenho ";
$condEmpItens .= "WHERE i.num_empenho iLIKE '{$numEmpenho}' ";
$condEmpItens .= "GROUP BY i.cod_reduzido, i.vl_empenho, i.complemento_item, i.unidade, i.vl_unitario";

//echo $condEmpItens;
// executo a string de comando
$sqlEmpItens = SelecionarFull($condEmpItens, $conecta);

// variável para o nº do item
$cont = 1;

// executo o laço para pegar os valores da consulta
foreach ($sqlEmpItens[0] as $resItem):
    $codReduzido = $resItem['cod_reduzido'];
    $complementoItem = $resItem['complemento_item'];
    $unidade = $resItem['unidade'];
    $qtRecebida = (($resItem['qt_recebida'] == 0 || empty($resItem['qt_recebida'])) ? 1 : $resItem['qt_recebida']);
    $qtRecebida = round($qtRecebida);
    $vlUnitario = $resItem['vl_unitario'];
    $vlEmpenho = $resItem['vl_empenho'];
    $vlTotal = $resItem['vl_empenho'];
    $vlTotal = round($vlTotal);

    $table->rowStyle('min-height:4.5; font-size:6; paddingY:0.5; border:1; valign:M;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', $cont), 'align:C; colspan:1;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', $codReduzido), 'align:C; colspan:2;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', $complementoItem), 'align:L; colspan:8;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', $unidade), 'align:C; colspan:2;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', (double)$qtRecebida), 'align:C; colspan:2;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', number_format($vlUnitario, 2, ',', '.')), 'align:R; colspan:2;');
    //$table->easyCell(iconv('UTF-8', 'windows-1252', number_format(($qtRecebida > 1 ? ($vlUnitario * $qtRecebida) : $vlTotal), 2, ',', '.')), 'align:R; colspan:3;');
    $table->easyCell(iconv('UTF-8', 'windows-1252', number_format(($vlUnitario * $qtRecebida), 2, ',', '.')), 'align:R; colspan:3;');
    $table->printRow();

    $cont++;
endforeach;

// defino a quebra de páginas em 2cm da borda inferior
$table->endTable(20);

// formato a saída do PDF
$pdf->Output("nota-empenho.pdf", "I");
ob_end_flush();
