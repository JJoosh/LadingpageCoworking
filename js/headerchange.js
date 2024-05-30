window.onscroll = function() {
  var header = document.querySelector('.header');
  if (window.pageYOffset > 50) { 
    header.classList.add('active');
  } else {
    header.classList.remove('active');
  }
};


document.addEventListener('DOMContentLoaded', function() {
  var dropdowns = document.querySelectorAll('.dropdown');

  dropdowns.forEach(function(dropdown) {
    var dropdownToggle = dropdown.querySelector('a');
    var dropdownContent = dropdown.querySelector('.dropdown-content');

    dropdown.addEventListener('mouseenter', function() {
      dropdownContent.style.display = 'block';
    });

    dropdown.addEventListener('mouseleave', function() {
      dropdownContent.style.display = 'none';
    });


    dropdownToggle.onclick = function(event) {
      event.preventDefault(); 
      event.stopPropagation(); 


      if (dropdownContent.style.display === 'block') {
        dropdownContent.style.display = 'none';
      } else {

        closeAllDropdowns();
        dropdownContent.style.display = 'block';
      }
    };
  });

  function closeAllDropdowns() {
    document.querySelectorAll('.dropdown-content').forEach(function(content) {
      content.style.display = 'none';
    });
  }


  document.body.addEventListener('click', function(event) {
    if (!event.target.matches('.dropdown a')) {
      closeAllDropdowns();
    }
  });

  closeAllDropdowns();
});

document.addEventListener("DOMContentLoaded", function() {
  let currentIndex = 0;
  const images = document.querySelectorAll('.carousel-image');
  const totalImages = images.length;

  document.querySelector('.next').addEventListener('click', () => {
      images[currentIndex].classList.remove('visible');
      currentIndex = (currentIndex + 1) % totalImages;
      images[currentIndex].classList.add('visible');
  });

  document.querySelector('.prev').addEventListener('click', () => {
      images[currentIndex].classList.remove('visible');
      currentIndex = (currentIndex - 1 + totalImages) % totalImages;
      images[currentIndex].classList.add('visible');
  });
});
