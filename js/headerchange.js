window.onscroll = function() {
  var header = document.querySelector('.header');
  if (window.pageYOffset > 50) { // Ajusta este valor según el desplazamiento deseado
    header.classList.add('active');
  } else {
    header.classList.remove('active');
  }
};
