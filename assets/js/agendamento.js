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

    var hoje = new Date().toISOString().split("T")[0];
document.getElementById("data").min = hoje;

function calculaIdade() {
  const data = document.getElementById('data').value;
  $.ajax({
    url: '../assets/ajax/teste_ajax.php', 
    method: 'post',
    data:
    {
      date: data
    }
  })
  .done(function(obj){
    $('#hora').empty();
    $('#hora').append('<option value="">Selecione</option>');
    var dados = JSON.parse(obj);
    if (dados.dados.length > 0) {
      $.each(dados.dados, function(index, dado) {
          var option = '<option value="' + dado + '">' + dado + '</option>';
          $('#hora').append(option);      
      });
    }
  });
}