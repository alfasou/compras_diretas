const modalDetalhes = document.getElementById('modalDetalhes');
if (modalDetalhes) {
  modalDetalhes.addEventListener('show.bs.modal', (event) => {
    // Extrai o Número do Empenho
    const modalLink = event.relatedTarget;
    const modalNumber = modalLink.getAttribute('data-bs-content');

    // Muda o título do Modal para o Número do Empenho
    const modalTitle = modalDetalhes.querySelector('.modal-title');

    modalTitle.textContent = modalNumber;
  });
}
