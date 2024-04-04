<?php
/**
 * FUNÇÃO UTILIZADA PARA A FORMATAÇÃO DE CPF E CNPJ
 *
 *
 * MODE DE UTILIZAÇÃO
 * formatCnpjCpf($valor-a-ser-formatado)
 *
 * @param $value
 * @return array|string|string[]|null
 */
function formatCnpjCpf($value)
{
    // constante para determinar o tipo de documento
    $CPF_LENGTH = 11;
    $cnpj_cpf = preg_replace("/\D/", '', $value);

    // verifico se é um CPF e retorno
    if (strlen($cnpj_cpf) === $CPF_LENGTH) {
        return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
    }

    // se não for um CPF retorno o formato de CNPJ
    return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
}