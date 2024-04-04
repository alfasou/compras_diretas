/* Consulta via AJAX */
$(document).ready(function () {
    // constante para traduzir o dataTable
    const DATATABLE_PTBR = {
        sEmptyTable: 'Nenhum registro encontrado',
        sInfo: 'Mostrando de _START_ até _END_ de _TOTAL_ registros',
        sInfoEmpty: 'Mostrando 0 até 0 de 0 registros',
        sInfoFiltered: '(Filtrados de _MAX_ registros)',
        sInfoPostFix: '',
        sInfoThousands: '.',
        sLengthMenu: '_MENU_ resultados por página',
        sLoadingRecords: 'Carregando...',
        sProcessing: 'Processando...',
        sZeroRecords: 'Nenhum registro encontrado',
        sSearch: 'Pesquisar',
        oPaginate: {
            sNext: 'Próximo',
            sPrevious: 'Anterior',
            sFirst: 'Primeiro',
            sLast: 'Último',
        },
        oAria: {
            sSortAscending: ': Ordenar colunas de forma ascendente',
            sSortDescending: ': Ordenar colunas de forma descendente',
        },
        select: {
            rows: {
                _: 'Selecionado %d linhas',
                0: 'Nenhuma linha selecionada',
                1: 'Selecionado 1 linha',
            },
        },
    };

    $('#pesquisar').on('click', function (e) {
        e.preventDefault();

        // mostro o LoadingOverlay na página toda
        $.LoadingOverlay('show', {
            background: 'rgba(0, 0, 0, 0.7)',
            imageColor: '#fff',
        });

        // recebo os valores dos campos do formulário
        let processo = $('#processo').val();
        let objeto = $('#objeto').val();
        let mes = $('#mes').val();
        let ano = $('#ano').val();
        let orgao = $('#orgao').val();
        let palavrachave = $('#palavra-chave').val();

        // teste para saber se todos os campos foram deixados em branco
        if (processo == "" && objeto == "" && mes == 0 && ano == 0 && orgao == 0 && palavrachave == "") {
            // oculto o LoadingOverlay
            $.LoadingOverlay('hide');

            let texto = "<b class=\"text-danger\">";
            texto += "ATEN&Ccedil;&Atilde;O</b><br><br>";
            texto += "&Eacute; obrigat&oacute;rio o preenchimento de algum campo!";

            Swal.fire({
              icon: "danger",
              title: texto,
            })

        } else {

            // inicio o datable e passo todos os parâmetros necessários
            // para o retorno dos registros
            table = $('#tabelaresultado').DataTable({

                oLanguage: DATATABLE_PTBR,
                destroy: true,
                drawCallback: function (settings) {
                    $('[data-bs-toggle="tooltip"]').tooltip('update');

                    // oculto o LoadingOverlay
                    $.LoadingOverlay('hide');
                },
                ajax: {
                    url: 'helper/pesquisa.php',
                    method: 'post',
                    data: function (d) {
                        d.processo = $('#processo').val();
                        d.objeto = $('#objeto').val();
                        d.mes = $('#mes').val();
                        d.ano = $('#ano').val();
                        d.orgao = $('#orgao').val();
                        d.palavrachave = $('#palavra-chave').val();
                    },
                },
                initComplete: function (a) {
                    // oculto o LoadingOverlay
                    $.LoadingOverlay('hide');

                },
                columns: [
                    {data: 'ano'},
                    {data: 'data_emissao'},
                    {data: 'orgao'},
                    {data: 'processo'},
                    {data: 'empenho'},
                    {data: 'resumo'},
                    {data: 'complemento'},
                    {data: 'modalidade'},
                    {data: 'valor'},
                    {data: 'qtd'},
                    {data: 'unidade'},
                ],
                "columnDefs": [
                    {
                        "targets": [0, 9, 10],
                        "className": "dt-center"
                      },
                      {
                        "targets": [8],
                        "className": "dt-body-right",
                     }
                ],
                                
            });

        } // fim IF teste em branco

    });

});
