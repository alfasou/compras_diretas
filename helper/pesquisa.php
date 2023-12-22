<?php
include_once "../sis/crud.php";
include_once "../conn/config.php";
include_once 'limitador.php';

// defino a variável que receberá os dados do POST
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// defino a tabela de itens para pesquisa
$tabItens = TAB_ITENS;

// vafriável de controle
$controle = 0;

// armazeno as variáveis com os valores vindos do POST
$processo = $post['processo'];
$objeto = $post['objeto'];
$mes = $post['mes'];

// teste para formatar meses menores que 10
if ($mes < 10):
    $mes = '0' . $mes;
else:
    $mes = $mes;
endif;

$ano = $post['ano'];
$orgao = $post['orgao'];
$palavrachave = $post['palavrachave'];

// defino a data de pesquisa
$datapesquisa = $ano . "-" . $mes;

// variável que conterá a string de comando SQL
$sql = "";

// monto a string de comando
$sql .= "SELECT * FROM {$tabItens} ";
$sql .= "WHERE (";

// testo se o campo não está vazio e atribuo o mesmo a string
if (!empty($processo)):
    $sql .= "num_processo LIKE '%{$processo}%' AND ";

    $controle++;
endif;

// testo se o campo não está vazio e atribuo o mesmo a st
if (!empty($objeto)):
    $sql .= "complemento_item LIKE '%{$objeto}%' AND ";

    $controle++;
endif;

// testo se o campo não está vazio e atribuo o mesmo a st
if (!empty($mes) && !empty($ano)):
    // verifico se é um valor numérico
    if (is_numeric($mes) && is_numeric($ano)):
        $sql .= "dt_emissao LIKE '%{$datapesquisa}%' AND ";

        $controle++;
    endif;
endif;

// testo se o campo não está vazio e atribuo o mesmo a st
if (!empty($orgao)):
    $sql .= "cod_gestora = {$orgao} AND ";

    $controle++;
endif;

// testo se o campo não está vazio e atribuo o mesmo a st
if (!empty($palavrachave)):
    $sql .= "complemento_item LIKE '%{$palavrachave}%' AND ";

    $controle++;
endif;

// retiro os 4 últimos caracteres da string para corrigir a mesma
$sql = substr($sql, 0, -4);

$sql .= "AND (descr_mod_compra LIKE '%compra direta%' ";
$sql .= "OR descr_mod_compra LIKE '%amil%')) ";
$sql .= "GROUP BY num_empenho ";
$sql .= "ORDER BY dt_emissao";

// executo a consulta SQL
$sqlsel = SelecionarFull($sql, $conecta);

// teste para saber se encontrou algum registro
if ($sqlsel[1] > 0):

    // matriz que armazenará os registros encontrados
    $data = [];

    // laço dos registros
    foreach ($sqlsel[0] as $res):

        $resData = $res['dt_emissao'];

        // extraio o ano da data retornada e armazeno em variáveis
        $dataBD = explode('-', $resData);
        $ano = $dataBD[0];

        // pego somente a data e descarto o horário
        $dataFull = explode(' ', $resData);
        $dataCompleta = $dataFull[0];

        // preencho a matriz com os registros retornados da consulta
        $data[] = [
            'ano' => $ano,
            'data_emissao' => $dataCompleta,
            'orgao' => $res['nome_gestora'],
            'processo' => $res['num_processo'],
            'empenho' => '<a href="#" class="numero-empenho link" data-bs-toggle="modal" data-bs-target="#modalDetalhes">' . $res['num_empenho'] . '</a>',
            'resumo' => $res['resumo_empenho'],
            'complemento' => '<span class="tooltip-text" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="' . $res['complemento_item'] . '">' . contarPalavra($res['complemento_item'], 7) . '</span>',
            'modalidade' => $res['descr_mod_compra'],
            'valor' => $res['vl_unitario'],
            'qtd' => $res['qt_recebida'],
            'unidade' => $res['unidade']
        ];
    endforeach;

    // matriz que será retornada via JSON para o DataTable
    $arrayRetorno = [
        'data' => $data,
    ];

    echo json_encode($arrayRetorno);
else: // não encontrou registros
    // crio uma martiz vazia para o retorno
    $erro = [
        'data' => ''
    ];

    echo json_encode($erro);
endif;
?>