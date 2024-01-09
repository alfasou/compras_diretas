<?php
// incluo a classe FPDF
require_once 'pdf/fpdf.php';
require_once 'pdf/exfpdf.php';
require_once 'pdf/easyTable.php';

// definindo o path para as fontes que serão usadas no relatório
//define('FPDF_FONTPATH', 'C:/xampp/htdocs/dev/prefeitura/homologacao/consulta_cnpj/view/pdf/font/');

setlocale(LC_ALL, 'pt_BR');

ob_end_clean();
ob_start();

$pdf=new exFPDF();
$pdf->__construct("P");
$pdf->AddPage(); 
$pdf->SetFont('arial','',10,);

$table=new easyTable($pdf, '%{5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5}', 'width:280; border:0; font-size:8; line-height:1.2; paddingX:0.8');

$table->easyCell('', 'img: ../assets/img/brasao-pref.png, w20; colspan:3; valign:M; align:C; rowspan:4,');
$table->easyCell(iconv('UTF-8', 'windows-1252', '<b>PREFEITURA MUNICIPAL DE CAMPINAS</b>
<s "font-size:10;">Avenida Anchieta, 200 - Centro - Campinas/SP
C.N.P.J. - 51.885.242/0001-40 Inscr. Est.: Isento
Fone: (19) 2116-0555</s>'), 'colspan:14; font-size:11; align:C; valign:T; rowspan:4,');
$table->easyCell('<b>Data:</b> 01/01/2024
<b>Hora:</b> 00:00', 'colspan:3; font-size:9; valign:M; align:L; rowspan:4,');
$table->printRow(true);

$table->rowStyle('min-height:3;');
$table->easyCell('', 'colspan:20');
$table->printRow();
 
$table->rowStyle('min-height:5; font-style:N; font-size:7; bgcolor:#fff; paddingY:0.5; border:1; valign:M;');
$table->easyCell('#', 'align:C;');
$table->easyCell('COD.', 'align:C;');
$table->easyCell('ITEM', 'align:L; colspan:9;');
$table->easyCell('QT 2024', 'align:C;');
$table->easyCell('VALOR 2024', 'align:C; colspan:2;');
$table->easyCell('DATA DESEJADA ', 'align:C; colspan:2;');
$table->easyCell('RENOVACAO ', 'align:C; colspan:2;');
$table->easyCell('PRIORIDADE ', 'align:C; colspan:2;');
$table->printRow();

$table->rowStyle('min-height:3;');
$table->easyCell('', 'colspan:20');
$table->printRow();
 
$table->rowStyle('min-height:5; font-style:B; font-size:7; bgcolor:#ccc; paddingY:0.5; border:1; valign:M;');
$table->easyCell('#', 'align:C;');
$table->easyCell('COD.', 'align:C;');
$table->easyCell('ITEM', 'align:L; colspan:9;');
$table->easyCell('QT 2024', 'align:C;');
$table->easyCell('VALOR 2024', 'align:C; colspan:2;');
$table->easyCell('DATA DESEJADA ', 'align:C; colspan:2;');
$table->easyCell('RENOVACAO ', 'align:C; colspan:2;');
$table->easyCell('PRIORIDADE ', 'align:C; colspan:2;');
$table->printRow();

$table->rowStyle('min-height:4.5; font-size:6; paddingY:0.5; border:1; valign:M;');
$table->easyCell('1', 'align:C;');
$table->easyCell('2', 'align:C;');
$table->easyCell('3', 'align:L; colspan:9;');
$table->easyCell('4', 'align:C;');
$table->easyCell('5', 'align:R; paddingX:3; colspan:2;');
$table->easyCell('6', 'align:C; colspan:2;');
$table->easyCell('7', 'align:C; colspan:2;');
$table->easyCell('8', 'align:C; colspan:2;');
$table->printRow();

$table->rowStyle('min-height:5; align:L; paddingY:1;');
$table->easyCell(iconv('UTF-8', 'windows-1252', 'Fonte: SIM - Sistema de Informações Municipais/AVMB - Consultoria e Assessoria Ltda'), 'colspan:20');
$table->printRow();

$table->endTable(12);

 
$pdf->Output(); 
ob_end_flush();
