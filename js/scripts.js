// INÍCIO SCRIPTS DO BOTÃO DE VOLTA AO TOPO

// Seleciona o botão
let myButton = document.getElementById('bTop');

// Quando o usuário desce 20px do topo da página, o botão aparece
window.onscroll = () => {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    myButton.style.display = 'block';
  } else {
    myButton.style.display = 'none';
  }
}

// Quando o usuário clica no botão a página rola de volta para o topo
myButton.addEventListener('click', () => {
  document.body.scrollTop = 0; // Para Safari
  document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE e Opera
});

// FIM SCRIPTS DO BOTÃO DE VOLTA AO TOPO

// INÍCIO SCRIPTS DO TOOLTIP

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl));

// FIM SCRIPTS DO TOOLTIP

// INÍCIO SCRIPTS DO MODAL

// Seleciona o Modal
const modalDetalhes = document.getElementById('modalDetalhes');

if (modalDetalhes) {
  modalDetalhes.addEventListener('show.bs.modal', (event) => {
    // Seleciona o Número do Empenho do link
    const modalLink = event.relatedTarget;

    // Seleciona o título do Modal
    const modalTitle = modalDetalhes.querySelector('.modal-title');

    // Muda o título do Modal para o Número do Empenho
    modalTitle.textContent = modalLink.textContent;
  });
}

// FIM SCRIPTS DO MODAL

// INÍCIO SCRIPTS DO BOTÃO LIMPAR FORMULÁRIO

// Seleciona o botão Limpar
const btnLimpar = document.getElementById('limpar');
// Seleciona o formulário
const searchForm = document.getElementById('searchForm');

// Limpa o formulário ao clicar no botão
btnLimpar.addEventListener('click', () => {
  searchForm.reset();
});

// FIM SCRIPTS DO BOTÃO LIMPAR FORMULÁRIO
