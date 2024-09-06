<?php
include_once 'sis/crud.php';

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <meta name="description"
          content="P&aacute;gina de consultas das Compras Diretas realizadas pela Prefeitura Municipal de Campinas"/>
    <meta name="author" content="Andressa de Faria Souza"/>

    <title>Compras Diretas - Prefeitura Municipal de Campinas</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>

    <!-- BOOTSTRAP -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap-icons.min.css" rel="stylesheet"/>

    <!-- STYLES -->
    <link href="assets/css/style.css" rel="stylesheet"/>

    <!-- ALERTS -->
    <link href="assets/css/sweetalert2.min.css" rel="stylesheet"/>

    <!-- DATATABLE -->
    <link href="assets/libs/datatable/datatables.min.css" rel="stylesheet">

</head>

<body id="top">
<button id="bTop" title="Voltar ao topo"><i class="bi bi-arrow-up-circle-fill"></i></button>

<main>
    <nav class="navbar navbar-expand-lg nav-top shadow mb-0 py-0">
        <div class="container p-0">
            <a class="navbar-brand ms-2" href="https://campinas.sp.gov.br">
                <img src="assets/img/brasao-pref.png" alt="Prefeitura Municipal de Campinas" width="32px" height="32px"/>
                <span class="px-2 navbar-title">Prefeitura Municipal de Campinas</span>
                <span class="px-2 navbar-title-mobile">Campinas</span>
            </a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="https://portal.campinas.sp.gov.br">
                            <i class="bi bi-arrow-90deg-left align-middle"></i>
                            <span class="mx-2">Voltar ao Portal</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="https://transparencia.campinas.sp.gov.br" target="_blank"
                           rel="noopener noreferrer">
                            <i class="bi bi-eye align-middle"></i>
                            <span class="mx-2">Transpar&ecirc;ncia</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>