<?php
include_once "../sis/crud.php";
include_once "../conn/config.php";
include_once 'limitador.php';

// defino a variável que receberá os dados do POST
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// defino a tabela de itens para pesquisa
$tabItens = TAB_ITENS;
$tabempenhos = TAB_EMPENHOS;

// variável de controle
$controle = 0;

// armazeno as variáveis com os valores vindos do POST
$processo = $post['processo'];
$objeto = $post['objeto'];
$mes = $post['mes'];

// teste para formatar meses menores que 10
/*if ($mes < 10):
    $mes = '0' . $mes;
else:
    $mes = $mes;
endif;*/

$ano = $post['ano'];
$orgao = $post['orgao'];
$palavrachave = $post['palavrachave'];

// defino a data de pesquisa
//$datapesquisa = $ano . "-" . ( ($mes==00 || $mes==0) ? '' : $mes );
$datapesquisa = $ano . ( ($mes==00 || $mes==0) ? '' : $mes );
$dataAnoMinimo = date('Y') - 5;




/*$arrayempenho = array();
$i = 0;

$sqlempenho = "select num_empenho from stg_empenhos ";
$sqlempenho .= "group by num_empenho";

$selempenhos = SelecionarFull($sqlempenho, $conecta);

if($selempenhos[1] > 0):
    foreach ($selempenhos[0] AS $emp):
        $arrayempenho[] = $emp["num_empenho"];*/








            // variável que conterá a string de comando SQL
            $sql = "";

            // monto a string de comando
            $sql .= "SELECT DISTINCT ON (dt_emissao, num_empenho) num_empenho, num_processo, complemento_item, 
            dt_emissao, ano_orcamento, cod_gestora, nome_gestora, resumo_empenho, 
            descr_mod_compra, vl_unitario, qt_recebida, unidade FROM {$tabItens} ";
            $sql .= "WHERE (";

            // testo se o campo não está vazio e atribuo o mesmo a string
            if (!empty($processo)):
                //$sql .= "num_processo LIKE '%{$processo}%' AND ";
                $sql .= "num_processo iLIKE '%{$processo}%' AND ";

                $controle++;
            endif;

            // testo se o campo não está vazio e atribuo o mesmo a st
            if (!empty($objeto)):
                //$sql .= "complemento_item LIKE '%{$objeto}%' AND ";
                $sql .= "complemento_item iLIKE '%{$objeto}%' AND ";

                $controle++;
            endif;

            if (!empty($mes) && $mes > '00'):
                // verifico se é um valor numérico
                if (is_numeric($mes)):
                    //$sql .= "dt_emissao LIKE '%-{$mes}-%' AND ";
                    $sql .= "extract(month from dt_emissao) = {$mes} AND ";

                    $controle++;
                endif;
            endif;

            if (!empty($ano)):
                // verifico se é um valor numérico
                if (is_numeric($ano)):

                    if($ano != $dataAnoMinimo):
                        $sql .= "extract(year from dt_emissao) >= {$ano} AND ";
                    else:
                        $sql .= "extract(year from dt_emissao) >= {$dataAnoMinimo} AND ";
                    endif;

                    //$sql .= "ano_orcamento >= {$dataAnoMinimo} AND ";
                    
                    $controle++;
                endif;
            endif;

            // testo se o campo não está vazio e atribuo o mesmo a st
            if (!empty($mes) && !empty($ano)):
                // verifico se é um valor numérico
                if (is_numeric($mes) && is_numeric($ano)):
                    //$sql .= "dt_emissao LIKE '%{$datapesquisa}%' AND ";
                    $sql .= "extract(year from dt_emissao) || '' || extract(month from dt_emissao) LIKE '%{$datapesquisa}%' AND ";

                    $controle++;
                endif;
            else:
                //$sql .= "ano_orcamento >= {$dataAnoMinimo} AND ";
                $sql .= "extract(year from dt_emissao) >= {$dataAnoMinimo} AND ";
            endif;

            // testo se o campo não está vazio e atribuo o mesmo a st
            if (!empty($orgao)):
                //$sql .= "cod_gestora = {$orgao} AND ";
                $sql .= "cod_gestora = {$orgao} AND ";

                $controle++;
            endif;

            // testo se o campo não está vazio e atribuo o mesmo a st
            if (!empty($palavrachave)):
                //$sql .= "complemento_item LIKE '%{$palavrachave}%' AND ";
                $sql .= "complemento_item iLIKE '%{$palavrachave}%' AND ";

                $controle++;
            endif;

            if ($controle>0):

                // retiro os 4 últimos caracteres da string para corrigir a mesma
                $sql = substr($sql, 0, -4);

                /*$sql .= "AND (descr_mod_compra LIKE '%compra direta%' ";
                $sql .= "OR descr_mod_compra LIKE '%amil%')) ";
                $sql .= "GROUP BY num_empenho ";
                $sql .= "ORDER BY dt_emissao";*/

                $sql .= "AND (descr_mod_compra iLIKE '%compra direta%' ";
                //$sql .= "AND num_empenho = {$arrayempenho[$i]} ";
                $sql .= "OR descr_mod_compra iLIKE '%amil%')) ";
                //$sql .= "GROUP BY num_empenho, num_processo, complemento_item, dt_emissao, ano_orcamento, cod_gestora, nome_gestora, resumo_empenho, descr_mod_compra, vl_unitario, qt_recebida, unidade ";

                //$sql .= "WITH ROLLUP "; 

                $sql .= "ORDER BY dt_emissao, num_empenho";

                //echo $sql;

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
                            'ano' =>  $ano,
                            'data_emissao' => $dataCompleta,
                            'orgao' => $res['nome_gestora'],
                            'processo' => $res['num_processo'],
                            'empenho' => '<a href="nota-empenho&empId=' . $res['num_empenho'] . '" class="numero-empenho link" target="_blank">' . $res['num_empenho'] . '</a>',
                            'resumo' => '<span class="tooltip-text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="' . $res['resumo_empenho'] . '">' . contarPalavra($res['resumo_empenho'], 7) . '</span>',
                            'complemento' => '<span class="tooltip-text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="' . $res['complemento_item'] . '">' . contarPalavra($res['complemento_item'], 7) . '</span>',
                            'modalidade' => $res['descr_mod_compra'],
                            'valor' => number_format($res ['vl_unitario'], 2, ',', '.'),
                            'qtd' => (($res['qt_recebida'] == 0 || empty($res['qt_recebida'])) ? 1 : round($res['qt_recebida'])),
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

            else:
                // crio uma martiz vazia para o retorno
                $erro = [
                    'data' => ''
                ];

                echo json_encode($erro);
            endif;





            
        /*$i++;
    endforeach;

else:

endif;*/
            ?>