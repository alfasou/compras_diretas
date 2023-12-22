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



/*
 * DATABASE
 */

// CONFIGURAÇÕES DO BANCO DE DADOS #####################################################################################
define('HOST', '127.17.13.128:3307');
define('DB', 'compra_direta');
define('USER', 'luiz');
define('PASS', 'luiz2023');

//define('HOST', 'bey.ima.sp.gov.br');
//define('DB', 'bi_pmc');
//define('USER', 'bi_pmc');
//define('PASS', 'M7I-GIpDEwSe');
//define('PORT', '5432');