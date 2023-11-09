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
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium rem nobis recusandae voluptas alias, nostrum sapiente quaerat
                  aperiam obcaecati, perspiciatis optio minus explicabo in repudiandae ea voluptate laborum numquam fuga?
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
                  <form class="my-3 mx-3">
                    <div class="grid">
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="processo">Processo</span>
                        <input type="text" class="form-control" aria-label="Processo" aria-describedby="processo" />
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="objeto">Objeto</span>
                        <input type="text" class="form-control" aria-label="Objeto" aria-describedby="objeto" />
                      </div>

                      <div class="input-group mb-3">
                        <label class="input-group-text" for="mes">M&ecirc;s</label>
                        <select class="form-select" id="mes">
                          <option value="jan" selected>Janeiro</option>
                          <option value="fev">Fevereiro</option>
                          <option value="mar">Mar&ccedil;o</option>
                          <option value="abr">Abril</option>
                          <option value="mai">Maio</option>
                          <option value="jun">Junho</option>
                          <option value="jul">Julho</option>
                          <option value="ago">Agosto</option>
                          <option value="set">Setembro</option>
                          <option value="out">Outubro</option>
                          <option value="nov">Novembro</option>
                          <option value="dez">Dezembro</option>
                        </select>
                      </div>
                      <div class="input-group mb-3">
                        <label class="input-group-text" for="ano">Ano</label>
                        <select class="form-select" id="ano">
                          <option value="2023" selected>2023</option>
                          <option value="2022">2022</option>
                          <option value="2021">2021</option>
                          <option value="2020">2020</option>
                        </select>
                      </div>

                      <div class="input-group mb-3">
                        <label class="input-group-text" for="orgao">&Oacute;rg&atilde;o</label>
                        <select class="form-select" id="orgao">
                          <option value="sma" selected>Administra&ccedil;&atilde;o</option>
                          <option value="smasdh">Assist&ecirc;ncia Social, Pessoa com Defici&ecirc;ncia e Direitos Humanos</option>
                          <option value="smcgp">Chefia de Gabinete do Prefeito</option>
                          <option value="secom">Comunica&ccedil;&atilde;o</option>
                          <option value="secult">Cultura e Turismo</option>
                          <option value="smdeti">Desenvolvimento Econ&ocirc;mico, Tecnologia e Inova&ccedil;&atilde;o</option>
                          <option value="sme">Educa&ccedil;&atilde;o</option>
                          <option value="smel">Esporte e Lazer</option>
                          <option value="smf">Finan&ccedil;as</option>
                          <option value="smgc">Gest&atilde;o e Controle</option>
                          <option value="smgdp">Gest&atilde;o e Desenvolvimento de Pessoas</option>
                          <option value="sehab">Habita&ccedil;&atilde;o</option>
                          <option value="seinfra">Infraestrutura</option>
                          <option value="smj">Justi&ccedil;a</option>
                          <option value="ouv">Ouvidoria Geral do Munc&iacute;pio</option>
                          <option value="smpdu">Planejamento e Desenvolvimento Urbano</option>
                          <option value="smri">Rela&ccedil;&otilde;es Institucionais</option>
                          <option value="sms">Sa&uacute;de</option>
                          <option value="smcasp">Seguran&ccedil;a P&uacute;blica</option>
                          <option value="smsp">Servi&ccedil;os P&uacute;blicos</option>
                          <option value="smtr">Trabalho e Renda</option>
                          <option value="setransp">Transportes</option>
                          <option value="semurb">Urbanismo</option>
                          <option value="smvds">Verde, Meio Ambiente e Desenvolvimento Sustent&aacute;vel</option>
                        </select>
                      </div>
                      <div class="input-group mb-3">
                        <span class="input-group-text" id="palavra-chave">Palavra Chave</span>
                        <input type="text" class="form-control" aria-label="Palavra Chave" aria-describedby="palavra-chave" />
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-body-secondary">
                  <div class="my-1 mx-3 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary me-3">Pesquisar</button>
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
                <table class="table table-sm table-striped table-bordered align-middle">
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
                  <tbody class="table-group-divider">
                    <tr>
                      <td>2023</td>
                      <td>20/10/2023</td>
                      <td>SMA</td>
                      <td>PMC.2023.00112543-46</td>
                      <td><a href="#" target="_blank">H05724/2023</a></td>
                      <td
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="MATERIAIS DE CONSUMO: ÁGUA MINERAL GARRAFÃO 20 L - ÁGUA MINERAL DA FONTE, SEM GÁS, ACONDICIONADA EM GARRAFÃO DE 20 L."
                      >
                        MATERIAIS DE CONSUMO
                      </td>
                      <td
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        data-bs-custom-class="custom-tooltip"
                        data-bs-title="&Aacute;REA ADMINISTRATIVA - PA&Ccedil;O E DESCENTRALIZADAS"
                      >
                        &Aacute;REA ADMINISTRATIVA
                      </td>
                      <td>N&atilde;o se Aplica</td>
                      <td>R$ 1.380,00</td>
                      <td>1</td>
                      <td>UN</td>
                    </tr>
                  </tbody>
                </table>
                <nav aria-label="Navega&ccedil;&atilde;o da Pesquisa" class="mt-3">
                  <ul class="pagination justify-content-center">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Anterior">
                        <span aria-hidden="true">&laquo;</span>
                      </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Pr&oacute;xima">
                        <span aria-hidden="true">&raquo;</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>