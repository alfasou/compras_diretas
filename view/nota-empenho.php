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



// inclui a classe FPDF
require_once 'pdf/fpdf.php';
require_once 'pdf/exfpdf.php';
require_once 'pdf/easyTable.php';

ob_end_clean();
ob_start();

// inclui o arquivo de conexão com o bd (comentado para Andressa visualizar)
// include '../conn/config.php';

// define o local do charset
setlocale(LC_ALL, 'pt_BR');

// define o fuso horário
date_default_timezone_set('America/Sao_Paulo');

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
$table->easyCell('', 'img: ../assets/img/brasao-pref.png, w15; colspan:3; valign:M; align:C; rowspan:4,');
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

// DADOS DO EMPENHO
$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell('Processo: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'NUM_PROCESSO'), 'align:L; colspan:7;');
$table->easyCell('Empenho: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'NUM_EMPENHO'), 'align:L; colspan:7;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell('Objeto: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'DESCR_TIPO_EMPENHO'), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'Órgão: '), 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'COD_GESTORA - NOME_GESTORA'), 'align:L; colspan:17;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell('Modalidade: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'DESCR_MOD_COMPRA'), 'align:L; colspan:7;');
$table->easyCell('Data: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'DT_EMISSAO'), 'align:L; colspan:7;');
$table->printRow();

$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell('Nome do Fornecedor: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'NOME_FORNECEDOR'), 'align:L; colspan:7;');
$table->easyCell('CNPJ/CPF: ', 'font-style:B; align:L; colspan:3;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'CNPJ'), 'align:L; colspan:7;');
$table->printRow();

// ESPAÇAMENTO
$table->rowStyle('min-height:3;');
$table->easyCell('', 'colspan:20');
$table->printRow();

// CABEÇALHO DA TABELA 
$table->rowStyle('min-height:5; font-style:B; font-size:7; bgcolor:#ccc; paddingY:0.5; border:1; valign:M;');
$table->easyCell('#', 'align:C; colspan:1;');
$table->easyCell('COD', 'align:C; colspan:2');
$table->easyCell('ITEM', 'align:C; colspan:8;');
$table->easyCell('UN', 'align:C; colspan:2;');
$table->easyCell('QTD', 'align:C; colspan:2;');
$table->easyCell('VALOR UNIT', 'align:C; colspan:2;');
$table->easyCell('VALOR TOTAL', 'align:C; colspan:3;');
// Repete em todas as páginas = true
$table->printRow(true);

// INÍCIO DA TABELA
$table->rowStyle('min-height:4.5; font-size:6; paddingY:0.5; border:1; valign:M;');
$table->easyCell(iconv('UTF-8', 'windows-1252', '1'), 'align:C; colspan:1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'COD_REDUZIDO'), 'align:C; colspan:2;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'COMPLEMENTO_ITEM'), 'align:L; colspan:8;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'UNIDADE'), 'align:C; colspan:2;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'QT_RECEBIDA'), 'align:C; colspan:2;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'VL_UNITARIO'), 'align:R; colspan:2;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'VL_TOTAL'), 'align:R; colspan:3;');
$table->printRow();

// defino a quebra de páginas em 2cm da borda inferior
$table->endTable(20);

 
$pdf->Output(); 
ob_end_flush();
