function validarCampos() {
  var usuario = document.getElementById('usuario').value;
  var password = document.getElementById('password').value;

  if (usuario.trim() === '' || password.trim() === '') {
    alert('Por favor, complete todos los campos antes de continuar.');
    return false;
  }
  return true; 
}
