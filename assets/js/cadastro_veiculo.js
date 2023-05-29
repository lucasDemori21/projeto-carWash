function excluirVeiculo(id){
  Swal.fire({
    title: 'Você ter certeza que deseja excluir o cadastro de seu veículo?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Não',
    confirmButtonText: 'Sim',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '../config/delete_car.php?delete=' + id ;
    }
  });
  return false;
}

$('#tableVeiculos').DataTable({
  scrollX: true
});

var status = document.getElementById('status').value;

if (status == 3) {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Veículo excluido com sucesso!',
    showConfirmButton: false,
    timer: 2000
  })
}

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