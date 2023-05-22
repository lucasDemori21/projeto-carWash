var status = document.getElementById('status').value;

if (status == 2) {

  Swal.fire({
    position: 'center',
    icon: 'warning',
    title: 'Veículo já possui cadastro!',
    showConfirmButton: false,
    timer: 2000,
  })
  document.getElementById('plate').innerHTML = '';
  document.getElementById('plate').focus();
}
if (status == 1) {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Veículo cadastrado com sucesso!',
    showConfirmButton: false,
    timer: 2000
  })
}


(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()