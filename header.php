<?php 
include_once 'sis/crud.php';

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="P&aacute;gina de consultas das Compras Diretas realizadas pela Prefeitura Municipal de Campinas" />
    <meta name="author" content="Andressa de Faria Souza" />

    <title>Compras Diretas - Prefeitura Municipal de Campinas</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.ico" />
    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/bootstrap-icons.min.css" rel="stylesheet" />
   

    <!-- SCSS -->
    <link href="css/scss/style.css" rel="stylesheet" />
    <link href="css/scss/tooltip.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.css" rel="stylesheet">
 




  </head>

  <body id="top">
    <button id="bTop" title="Voltar ao topo"><i class="bi bi-arrow-up-circle-fill"></i></button>

    <main>
      <nav class="navbar navbar-expand-lg nav-top">
        <div class="container">
          <a class="navbar-brand" href="https://campinas.sp.gov.br">
            <img src="img/logo_prefeitura.png" alt="Prefeitura Municipal de Campinas" width="250" height="176.122" />
          </a>

          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-auto me-lg-5">
              <li class="nav-item">
                <a class="nav-link fw-bold" href="https://portal.campinas.sp.gov.br">
                  <i class="bi bi-arrow-90deg-left align-middle"></i>
                  <span class="mx-2">Voltar ao Portal</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link fw-bold" href="https://transparencia.campinas.sp.gov.br" target="_blank" rel="noopener noreferrer">
                  <i class="bi bi-eye align-middle"></i>
                  <span class="mx-2">Transpar&ecirc;ncia</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>