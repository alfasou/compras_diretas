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
<script src="js/tooltip.js"></script>
<script src="js/back-to-top.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.js"></script>



<script type="text/javascript">
  $(document).ready(function() {
      $('#pesquisar').on('click', function(e) {
          e.preventDefault();

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

          new DataTable('#table1', {
          ajax: 'helper/pesquisa2.php',
          method: 'post',
          dataType: 'json',
          data: 'ano: ano, data: data, orgao: orgao, empenho: empenho, resumo: resumo, complemento: complemento, modalidade: modalidade, qtd: qtd, valor: valor, unidade: unidade',
          columns: [
              { data: 'ano' },
              { data: 'data' },
              { data: 'orgao' },
              { data: 'empenho' },
              { data: 'resumo' },
              { data: 'complemento' },
              { data: 'modalidade' },
              { data: 'qtd' },
              { data: 'valor' },
              { data: 'unidade' }
          ]
        }); 
      });
  });
</script>

</body>
</html>