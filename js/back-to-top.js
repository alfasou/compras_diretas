// Get the button:
let myButton = document.getElementById('bTop');

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    myButton.style.display = 'block';
  } else {
    myButton.style.display = 'none';
  }
}

// When the user clicks on the button, scroll to the top of the document
myButton.addEventListener('click', () => {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
});
