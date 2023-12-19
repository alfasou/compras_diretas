<?php
function contarPalavra($string, $limite, $pointer = NULL) {
    $texto = strip_tags(trim($string));
    $qtde = (int) $limite;

    if (!empty($texto)):
        $arrPalavras = explode(' ', $texto);
        $numPalavras = count($arrPalavras);
        $novoTexto = implode(' ', array_slice($arrPalavras, 0, $qtde));

        $pointer = (empty($pointer) ? ' [...]' : ' ' . $pointer);
        $result = ($qtde < $numPalavras ? $novoTexto . $pointer : $texto);

        return $result;

    else:
        return null;

    endif;
}