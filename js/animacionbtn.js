document.getElementById('contactForm').addEventListener('submit', function () {
  var submitButton = document.getElementById('submitButton');
  submitButton.classList.add('loading');
  submitButton.disabled = true;
});