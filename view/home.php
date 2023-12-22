<header>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <h1>
                    <i class="bi bi-bank"></i>
                    <span class="ms-2">Compra Direta</span>
                </h1>
                <div class="block mt-3"></div>
                <div class="block-line"></div>

                <div class="description">
                    <p>
                        As Compras Diretas são feitas através de dispensa de licitação. Neste
                        espaço você consulta a relação dos processos de compras diretas,
                        inexigibilidades e dispensas:
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="busca">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h5 class="my-3 mx-3">
                            <i class="bi bi-search"></i>
                            <span class="ms-2"> Busca Avan&ccedil;ada </span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="my-3 mx-3">
                            <div class="grid">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" required>Processo</span>
                                    <input type="text" id="processo" nome="processo" class="form-control"
                                           aria-label="Processo" aria-describedby="processo"/>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Objeto</span>
                                    <input type="text" id="objeto" name="objeto" class="form-control"
                                           aria-label="Objeto" aria-describedby="objeto"/>
                                </div>

                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="mes">M&ecirc;s</label>
                                    <select class="form-select" id="mes" name="mes">
                                        <?php
                                        // crio uma matriz com os meses do ano
                                        $meses = array(
                                            1 => 'JANEIRO',
                                            2 => 'FEVEREIRO',
                                            3 => 'MARÇO',
                                            4 => 'ABRIL',
                                            5 => 'MAIO',
                                            6 => 'JUNHO',
                                            7 => 'JULHO',
                                            8 => 'AGOSTO',
                                            9 => 'SETEMBRO',
                                            10 => 'OUTUBRO',
                                            11 => 'NOVEMBRO',
                                            12 => 'DEZEMBRO'
                                        );

                                        // recupero o mês da data atual do sistema
                                        $mes = date("m");

                                        // laço para preencher o select com os meses do ano
                                        for ($x = 1; $x <= 12; $x++):
                                            if ($x < 10):
                                                $xx = '0' . $x;
                                            else:
                                                $xx = $x;
                                            endif;

                                            echo "<option value=\"{$x}\">{$meses[$x]}</option>";
                                        endfor;
                                        ?>
                                    </select>

                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="ano">Ano</label>
                                        <select class="form-select" id="ano" name="ano">
                                            <?php
                                            // recupero o ano da data atual do sistema
                                            $ano = date("Y");
                                            $valor = ($ano - 2015) - 1;
                                            ?>

                                            <option value="<?= $ano; ?>"><?= $ano; ?></option>

                                            <?php for ($y = 0; $y <= $valor; $y++): ?>
                                                <?php $ano = $ano - 1; ?>
                                                <option value="<?= $ano; ?>"><?= $ano; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>

                                    <?php
                                    $condorgao = "WHERE status = 1 ";
                                    $condorgao .= "ORDER BY nome ASC";

                                    $sqlorgao = Selecionar("unidade", $condorgao, $conecta);
                                    ?>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="orgao">&Oacute;rg&atilde;o</label>
                                        <select class="form-select" id="orgao" name="orgao">
                                            <?php
                                            foreach ($sqlorgao[0] as $res):
                                                $unidade = $res['nome'];
                                                $gestora = $res['id_gestora'];
                                                ?>
                                                <option value="<?= $gestora ?>"><?= mb_strtoupper($unidade, 'UTF-8') ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Palavra Chave</span>
                                        <input type="text" id="palavra-chave" name="palavra-chave" class="form-control"
                                               aria-label="Palavra Chave" aria-describedby="palavra-chave"/>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="card-footer text-body-secondary">
                        <div class="my-1 mx-3 d-flex justify-content-end">
                            <button type="submit" id="pesquisar" name="pesquisar" class="btn btn-primary me-3">
                                Pesquisar
                            </button>
                            <button type="button" class="btn btn-light">Limpar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="lista">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card table-responsive shadow-lg p-4">
                    <table id="tabelaresultado" class="table table-sm table-striped table-bordered align-middle">
                        <thead class="text-center">
                        <tr>
                            <th>Ano</th>
                            <th>Data</th>
                            <th>&Oacute;rg&atilde;o</th>
                            <th>Processo</th>
                            <th>Empenho</th>
                            <th>Resumo</th>
                            <th>Complemento</th>
                            <th>Modalidade</th>
                            <th>Valor</th>
                            <th>Qtd</th>
                            <th>Un</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- INÍCIO DO MODAL -->
<div
    class="modal fade"
    id="modalDetalhes"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="modalEmpenho"
    aria-hidden="true"
>
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEmpenho"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <!-- AQUI VAI O CONTEÚDO DO MODAL -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- FIM DO MODAL -->