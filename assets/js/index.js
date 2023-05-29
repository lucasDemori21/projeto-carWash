var login = document.getElementById('login').value;

if (login == 1) {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Cadastro realizado com sucesso!',
    showConfirmButton: false,
    timer: 2000
  })
}
if (login == 2) {
  Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Login realizado com sucesso!',
    showConfirmButton: false,
    timer: 2500
  })
}

function confirmLogout() {
  Swal.fire({
    title: 'Tem certeza?',
    text: "Você será desconectado da página!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Sim, sair',
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "config/logout.php";
    }
  });
  return false;
}

window.load = graficoPizza();

function graficoPizza() {
  $.ajax({
    method: "POST",
    url: "assets/ajax/consulta_tabelas_ajax.php",
    success: function(obj) {
      var dados = JSON.parse(obj);
      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: [
            'Carros agendados',
            'Carros concluídos'
          ],
          datasets: [{
            data: [dados.agendados, dados.concluidos],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)'
            ],
            hoverOffset: 5
          }],
        },
        options: {
          plugins: {
            legend: {
              position: 'right',
              labels: {
                color: 'white', 
                font: {
                  size: 16, 
                  weight: 'bold'
                }
              }
            }
          },
          aspectRatio: 0,
          layout: {
            padding: 20
          }
        }
      });
      $('#agendados').text(" Carros agendados: " + dados.agendados);
      $('#concluidos').text(" Carros concluidos: " + dados.concluidos);
    }
  })
}

const ctt = document.getElementById('myChartBar');
new Chart(ctt, {
  type: 'bar',
  data: {
    labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
    datasets: [{
      label: 'Faturamento Semestral',
      data: [12, 10, 14, 16, 12, 13],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});