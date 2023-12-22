<?php

########################################################################
########### FUNÇÃO DE SELEÇÃO DE REGISTROS NO BANCO DE DADOS ###########
########################################################################

########################### UTILIZAÇÃO #################################
## $variavel = Selecionar('nome_tabela', "WHERE ...", $conecta);
##  if ($variavel):
##      foreach($variavel as $res) {
##          echo trim($res['nome_campo']);	
##	}
##  else:
##      echo 'MSG ERRO';
##  endif;
########################################################################

function Selecionar($tabela, $criterio = NULL, $conectar) {
    // monto a string de comando para a seleção
    $sqlSelecionar = "SELECT * FROM {$tabela} {$criterio}";

    // tento executar a string de comando
    try {
        $qrSelecionar = $conectar->prepare($sqlSelecionar);
        $qrSelecionar->execute();

        $resultadoSelecionar = $qrSelecionar->fetchAll(PDO::FETCH_ASSOC);

        // verifico se foi encontrado algum registro
        $contSelecionar = $qrSelecionar->rowCount(PDO::FETCH_ASSOC);

        // retorno o array com os dados encontrados e a qtde de registros encontrados
        return array($resultadoSelecionar, $contSelecionar);
        
    } catch (PDOException $error) {
        return false;
    } // fim TRY
    
} // fim function


########################################################################
########### FUNÇÃO DE SELEÇÃO DE REGISTROS NO BANCO DE DADOS ###########
########################################################################

########################### UTILIZAÇÃO #################################
## $variavel = SelecionarFull($var, $conecta);
##  if ($variavel):
##      foreach($variavel as $res) {
##          echo trim($res['nome_campo']);	
##	}
##  else:
##      echo 'MSG ERRO';
##  endif;
########################################################################

function SelecionarFull($comando, $conectar) {
    // monto a string de comando para a seleção
    $sqlSelecionarFull = $comando;

    // tento executar a string de comando
    try {
        $qrSelecionarFull = $conectar->prepare($sqlSelecionarFull);
        $qrSelecionarFull->execute();

        $resultadoSelecionarFull = $qrSelecionarFull->fetchAll(PDO::FETCH_ASSOC);

        // verifico se foi encontrado algum registro
        $contSelecionarFull = $qrSelecionarFull->rowCount(PDO::FETCH_ASSOC);

        // retorno o array com os dados encontrados e a qtde de registros encontrados
        return array($resultadoSelecionarFull, $contSelecionarFull);
        
    } catch (PDOException $error) {
        return false;
    } // fim TRY
    
} // fim function