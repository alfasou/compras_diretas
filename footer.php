</main>

<footer class="" id="bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-10 my-5">
        <p class="fs-6 text-center">
          2023 <span class="mx-2">&mdash;</span>
          <a href="https://portal.campinas.sp.gov.br/secretaria/administracao" target="_blank" rel="noopener noreferrer"
            >Prefeitura de Campinas - SMA</a
          >
          &copy; Todos os direitos reservados.
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- JAVASCRIPT -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/loadingoverlay.min.js"></script>
<script src="js/modal.js"></script>
<script src="js/modal-docs.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/back-to-top.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.js"></script>



<script type="text/javascript">
            /* Consulta */
            $(document).ready(function() {
                $('#pesquisar').on('click', function(e) {
                    e.preventDefault();
                    

                    // mostro o LoadingOverlay na página toda
                        $.LoadingOverlay("show", {
                        background: "rgba(0, 0, 0, 0.7)",
                        imageColor: "#fff"
                    });

                    let processo;
                    let objeto;
                    let mes;
                    let ano;
                    let orgao;
                    let palavrachave;
                    let paginator;


                    processo = $("#processo").val();
                    objeto = $("#objeto").val();
                    mes = $("#mes").val();
                    ano = $("#ano").val();
                    orgao = $("#orgao").val();
                    palavrachave = $("#palavra-chave").val();
                    paginator = 25;


                    $.post("helper/pesquisa.php",
                        {
                            processo: processo,
                            objeto: objeto,
                            mes: mes,
                            ano: ano,
                            orgao: orgao,
                            palavrachave: palavrachave,
                            paginator: paginator
                        },
                        function (result) {
                            if (result) {
                                // oculto o LoadingOverlay
                                $.LoadingOverlay("hide");

                                var dados;
                                dados = $.parseJSON(result);

                                $.each(dados, function(index, obj) {
                                var row = $('<tr>');
                                 row.append('<td>' + obj.ano + '</td>');
                                 row.append('<td>' + obj.data + '</td>');
                                 row.append('<td>' + obj.orgao + '</td>');
                                 row.append('<td>' + obj.processo + '</td>');
<<<<<<< HEAD
                                 row.append('<td><a href class="numero-empenho" data-bs-toggle="modal" data-bs-target="#modalDetalhes">' + obj.empenho + '</a></td>');
                                 row.append('<td>' + obj.resumo + '</td>');
                                 row.append('<td><a href class="tooltip-text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="luiz">' + obj.complementoreduzido + '</a></td>');
=======
                                 row.append('<td><a href="views/detalhe.php&numempenho='+ obj.empenho+'" target="_blank">' + obj.empenho + '</a></td>');
                                 row.append('<td><a href class="tooltip-text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="MATERIAIS DE CONSUMO: ÁGUA MINERAL GARRAFÃO 20 L - ÁGUA MINERAL DA FONTE, SEM GÁS, ACONDICIONADA EM GARRAFÃO DE 20 L.">' + obj.resumo + '</td>');
                                 row.append('<td><a href class="tooltip-text" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="&Aacute;REA ADMINISTRATIVA - PA&Ccedil;O E DESCENTRALIZADAS">' + obj.complementoreduzido + '</a></td>');
>>>>>>> 6781b05011718984a32f8b3590ff1c9133e01679
                                 row.append('<td>' + obj.modalidade + '</td>');
                                 row.append('<td>' + obj.valor + '</td>');
                                 row.append('<td>' + obj.qtd + '</td>');
                                 row.append('<td>' + obj.unidade + '</td>');

                                
                                $('#tabelaresultado tbody').append(row)})
                                
                            }
                       
                    });
                });
            });
        </script>

</body>
</html>