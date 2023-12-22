const modalDetalhes = document.getElementById('modalDetalhes');
if (modalDetalhes) {
  modalDetalhes.addEventListener('show.bs.modal', (event) => {
    // Extrai o Número do Empenho
    const modalNumber = document.querySelector('.numero-empenho');

    // Muda o título do Modal para o Número do Empenho
    const modalTitle = modalDetalhes.querySelector('.modal-title');

    modalTitle.textContent = modalNumber.textContent;
  });
}
