const btnLimpar = document.getElementById('limpar');
const searchForm = document.getElementById('searchForm');

btnLimpar.addEventListener('click', () => {
  searchForm.reset();
});
