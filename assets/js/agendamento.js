$(document).ready(function () {
    var table = $('#table').DataTable({
      paging: false,
      info: false,
      scrollX: true,
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
const forms = document.querySelectorAll('.needs-validation');
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
    url: '../assets/ajax/horarios_ajax.php', 
    method: 'post',
    data:
    {
      date: data
    }
  })
  .done(function(obj){
    $('#hora').removeAttr('disabled');
    $('#hora').append('<option value="">Selecione</option>');
    var dados = JSON.parse(obj);
    if (dados.dados.length > 0) {
      $.each(dados.dados, function(index, horario) {
          var option = '<option value="' + horario + '">' + horario + '</option>';
          $('#hora').append(option);      
      });
    }
  });
}

function carrosCadastrados(){
  const cliente_selecionado = document.getElementById('cliente').value;
  console.log('cliente: ' + cliente);
  $.ajax({
    url: '../assets/ajax/carros_cadastrados_ajax.php', 
    method: 'get',
    data:
    {
      cliente: cliente_selecionado
    }
  })
  .done(function(obj){
    $('#carro').empty();
    $('#carro').append('<option value="">Selecione</option>');
    var dados = JSON.parse(obj);
    console.log(obj);
    if (dados.carros.length > 0) {
      $.each(dados.carros, function(index, carros) {
          var option = '<option value="' + carros.id + '">' + carros.modelo + ' ' + carros.tipo + ' ' + carros.ano + ' - ' + carros.placa + '</option>';
          $('#carro').append(option);      
      });
    }
  });
}

// function cancelarAgendamento(){
//   Swal.fire({
//     title: 'Tem certeza?',
//     text: "Você será desconectado da página!",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     cancelButtonText: 'Cancelar',
//     confirmButtonText: 'Sim, sair!',
//   }).then((result) => {
//     if (result.isConfirmed) {
//       $.ajax({
//         method: 'post',
//         url:
//       })
//     }
//   });
//   return false;
// }
