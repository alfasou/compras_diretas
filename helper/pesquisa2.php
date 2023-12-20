<?php 

include_once "../sis/crud.php";
include_once "../conn/config.php";
include_once 'Limitador.php';
$tabela="stg_empenho_itens";                        
$post=filter_input_array(INPUT_POST, FILTER_DEFAULT);

                        $processo=$post['processo'];
                        $objeto=$post['objeto'];
                        $mes=$post['mes'];
                        $paginator=$post['paginator'];

                        if($mes <10):
                            $mes='0'.$mes;
                        else:
                            $mes= $mes;
                            endif;


                        $ano=$post['ano'];
                        $orgao=$post['orgao'];
                        $palavrachave=$post['palavrachave'];
                        $datapesquisa=$ano."-". $mes;

                        $sql="";

                        $controle=0;

                        $sql.="select * from {$tabela} ";
                        $sql.=" where (";


                        if(!empty($processo)):



                            $sql.="num_processo like '%{$processo}%' and ";

                            $controle=1;


                        endif;

                        if(!empty($objeto)):


                            $sql.="complemento_item like '%{$objeto}%' and ";

                                $controle=1;


                        endif;

                        if(!empty($mes) && !empty($ano)):

                            if(is_numeric($mes) && is_numeric($ano)):

                                $sql.="dt_emissao like '%{$datapesquisa}%' and ";

                                $controle=1;

                            endif;

                        endif;


                        if(!empty($orgao)):



                            $sql.="cod_gestora = {$orgao} and ";

                                $controle=1;



                        endif;

                        if(!empty($palavrachave)):



                            $sql.="complemento_item like '%{$palavrachave}%' and";

                                $controle=1;



                        endif;

                        $sql=substr($sql, 0, -4);

                        $sql.="and descr_mod_compra like '%compra direta%')";
                        $sql.="group by num_empenho ";

                        




                        $sqlsel=SelecionarFull($sql, $conecta);


                        $arrayretorno= array();
                        $retorno= array();

                        $cont= 0;
                        
                        if ($sqlsel[1] >0):
                            foreach ($sqlsel[0] as $res):
                                $resprocesso= $res['num_processo'];
                                $resobjeto= $res['complemento_item'];
                                $resano= $res['ano_orcamento'];
                                $resdata= $res['dt_emissao'];
                                $resorgao= $res['nome_gestora'];
                                $respalavrachave= $res['complemento_item'];
                                $resempenho= $res['num_empenho'];
                                $resresumo= $res['resumo_empenho'];
                                $rescomplemento= $res['complemento_item'];
                                $resmodalidade= $res['descr_mod_compra'];
                                $resqtd= $res['qt_recebida'];
                                $resvalor= $res['vl_unitario'];
                                $resunidade= $res['unidade'];

                                $data= explode('-', $resdata);
                                $ano=$data[0];
                                $datacompleta= explode(' ', $resdata);
                                $sodata= $datacompleta[0];

                                $retorno[] = [
                                    "processo"=> $resprocesso,
                                    "objeto"=> $resobjeto,
                                    "ano"=> $ano,
                                    "data"=> $sodata,
                                    "orgao"=> $resorgao,
                                    "palavrachave"=> $respalavrachave,
                                    "empenho"=> $resempenho,
                                    "resumo"=> $resresumo,
                                    "complemento"=> $rescomplemento,
                                    "complementoreduzido"=> contarPalavra($rescomplemento, 6),
                                    "modalidade"=> $resmodalidade,
                                    "qtd"=> $resqtd,
                                    'valor' => number_format($resvalor, 2, ',', '.'),
                                    'unidade' => $resunidade
                                ];

                            
                                /*$arrayretorno[$cont]["processo"]= $resprocesso;
                                $arrayretorno[$cont]["objeto"]= $resobjeto;
                                $arrayretorno[$cont]["ano"]= $ano;
                                $arrayretorno[$cont]["data"]= $sodata;
                                $arrayretorno[$cont]["orgao"]= $resorgao;
                                $arrayretorno[$cont]["palavrachave"]= $respalavrachave;
                                $arrayretorno[$cont]["empenho"]= $resempenho;
                                $arrayretorno[$cont]["resumo"]= $resresumo;
                                $arrayretorno[$cont]["complemento"]= $rescomplemento;
                                $arrayretorno[$cont]["complementoreduzido"]= contarPalavra($rescomplemento, 6);
                                $arrayretorno[$cont]["modalidade"]= $resmodalidade;
                                $arrayretorno[$cont]["qtd"]= $resqtd;
                                $arrayretorno[$cont]['valor'] = number_format($resvalor, 2, ',', '.');
                                $arrayretorno[$cont]['unidade'] = $resunidade;*/

                            
$cont ++;

                            endforeach;
                           echo '<pre>';
                           echo print_r($retorno);

                            //echo json_encode($arrayretorno);
                         else:
                            return null;
                        endif;


                        


?>