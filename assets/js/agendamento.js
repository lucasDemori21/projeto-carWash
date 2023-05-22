$(document).ready(function () {
    $('#table').DataTable({
      paging: false,
      info: false,
      searching: false,
      dom: '<"toolbar">frtip',
    });
    $('div.toolbar').html('<h3>Seus agendamentos</h3>');
  });
  
  
   var sts = document.getElementById('login').value;
      if(sts == 2) {
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Login realizado com sucesso!',
              showConfirmButton: false,
              timer: 2000
          })
      }
  if(document.getElementById('disp').value == 1){
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Agendamento concluído!',
      showConfirmButton: false,
      timer: 2000
    })
  }
  if(document.getElementById('disp').value == 2){
    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'Horario indisponivel! Escolha outro.',
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