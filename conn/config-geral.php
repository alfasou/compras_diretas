<?php

/*
 * BASE URL
 */

// DEFINE A BASE DO SITE  ##############################################################################################
###################################################### HOMOLOGAÇÃO #####################################################
define('APP_BASE', 'http://172.17.13.128/prefeitura/compras_diretas/'); // homologação


####################################################### PRODUÇÃO #######################################################
//define('APP_BASE', 'definir-após-hospedar-no-servidor');
########################################################################################################################



/*
 * TABELAS
 */

define('TAB_ITENS', 'stg_empenho_itens');
define('TAB_EMP_ITENS', 'stg_emp_itens');
define('TAB_EMPENHOS', 'stg_empenhos');
define('TAB_UNIDADE', 'stg_mov_final');



/*
 * DATABASE
 */

// CONFIGURAÇÕES DO BANCO DE DADOS #####################################################################################
//define('HOST', '172.17.13.128');
//define('DB', 'compras_diretas');
//define('USER', 'luiz');
//define('PASS', 'luiz2023');

define('HOST', 'bey.ima.sp.gov.br');
define('DB', 'bi_pmc');
define('USER', 'bi_pmc');
define('PASS', 'M7I-GIpDEwSe');
define('PORT', '5432');