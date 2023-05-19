<?php
session_start();
require_once 'config/conexao.php';

if (!$_SESSION['username']) {
  $status = 1;
  header('Location: login.php?Status=' . $status);
  exit;
}

if ($_SESSION['permissao'] == 1){
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/index.css">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(assets/images/lindo-carro-no-servico-de-lavagem.jpg); background-size: cover;">


  <div class="menuToggle" style="z-index: 1;">
    <input type="checkbox" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling" style="z-index: 10000000;" />
    <span style="z-index: 1000000;"></span>
    <span style="z-index: 1000000;"></span>
    <span style="z-index: 1000000;"></span>
    <ul class="menu">
      <div class="offcanvas offcanvas-start" style="border-right: 1px solid #00E0FF;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <div class="nav-title">
            <h4>Seja bem-vindo: </br></h4>
            <h3><?php echo $_SESSION['username']; ?></h3>
          </div>
        </div>
        <div class="offcanvas-body" style="overflow: hidden;">
          <div class="nav-button">
            <a href="view/workpage.php">
              <button>
                <svg style="margin-right: 7%; margin-top: 1%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pc-display-horizontal" viewBox="0 0 16 16">
                  <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v7A1.5 1.5 0 0 0 1.5 10H6v1H1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5v-1h4.5A1.5 1.5 0 0 0 16 8.5v-7A1.5 1.5 0 0 0 14.5 0h-13Zm0 1h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .5-.5ZM12 12.5a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0Zm2 0a.5.5 0 1 1 1 0 .5.5 0 0 1-1 0ZM1.5 12h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1ZM1 14.25a.25.25 0 0 1 .25-.25h5.5a.25.25 0 1 1 0 .5h-5.5a.25.25 0 0 1-.25-.25Z" />
                </svg>
                <div style="padding-top: 1%;">Gerenciador de agendamentos</div>
              </button>
            </a>
          </div>
          <div class="nav-button">
            <a href="view/home.php">
              <button>
                <svg style="margin-right: 7%; margin-top: 1%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4-week" viewBox="0 0 16 16">
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z" />
                  <path d="M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-2 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                </svg>
                <div style="padding-top: 1%;">Agendar lavação</div>
              </button>
            </a>
          </div>
          <div class="nav-button">
            <a href="index.php"><button>
                <svg style="margin-right: 7%; margin-top: 1%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                  <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                  <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
                </svg>
                <div style="padding-top: 1%;">Dashboard</div>
              </button></a>
          </div>
          <div class="nav-button">
            <a href="view/config.php"><button>
                <svg style="margin-right: 7%; margin-top: 1%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                  <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z" />
                  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z" />
                </svg>
                <div style="padding-top: 1%;">Cadastro de veículo</div>
              </button></a>
          </div>
          <div class="nav-button">
            <a href="view/detalhe.php"><button>
                <svg style="margin-right: 7%; margin-top: 1.2%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
                <div style="padding-top: 1%;">Detalhes</div>
              </button></a>
          </div>
          <div class="nav-button">
            <a href="view/cadastro_func.php">
              <button>
                <svg style="margin-right: 7%; margin-top: 1.2%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                </svg>
                <div style="padding-top: 1%;">Cadastrar funcionario</div>
              </button>
            </a>
          </div>
          <div class="nav-button">
            <a href="view/cadastro_func.php">
              <button>
                <svg style="margin-right: 7%; margin-top: 1.2%; float: left; width: 22px; height: 22px;" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                </svg>
                <div style="padding-top: 1%;">Cadastrar Cliente</div>
              </button>
            </a>
          </div>
          <div class="nav-button-exit">
            <button onclick="return confirmLogout()">Sair</button>
          </div>
        </div>
    </ul>
  </div>
  </div>
  </div>
  <div class="container">
    <div class="telas" id="tela1">
      <canvas id="myChart"></canvas>
    </div>
    <div class="telas" id="tela2">
      <div class="resultado-tela1">
        <div class="color" style="background-color: rgb(255, 99, 132);"></div>
        <label id="agendados"></label>
      </div>
      <div class="resultado-tela1">
        <div class="color" style="background-color: rgb(54, 162, 235);"></div>
        <label id="concluidos"></label>
      </div>
    </div>
    <div class="telas" id="tela3">
      <canvas id="myChartBar"></canvas>
    </div>
    <div class="telas" id="tela4">
      <h2>Faturamento Semestral:</h2>
      <span>R$180.000,00</span>
      <h2>Faturamento Mensal:</h2>
      <span>R$30.000,00</span>
      <h2>Faturamento Medio Mensal:</h2>
      <span>R$30.000,00</span>
    </div>
  </div>
  <input type="hidden" id="login" value="<?php if ($_GET) {
                                            echo @$_GET['login'];
                                          } ?>" />

</body>
</html>

<script>
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
      timer: 2000
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
      confirmButtonText: 'Sim, sair!',
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
      url: "assets/ajax/consulta_tabelas.php",
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
        $('#agendados').text("Carros agendados: " + dados.agendados);
        $('#concluidos').text("Carros concluidos: " + dados.concluidos);
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
        data: [12, 19, 3, 5, 2, 3],
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
</script>

<?php
}
?>