<?php
    require_once '../config/conexao.php';
    require_once 'header.php';

?>

<div class="container-detail">
<h1 class='title'>AGENDE SEU HORÁRIO</h1>
<form class="row g-3 needs-validation" action="../config/cadastro_agendamento.php" method="POST" novalidate>
  <div class="register-link">
    <a href="cadastro_veiculo.php">Não possui seu veículo cadastrado? Clique aqui e cadastre já!</a>
  </div>
<div class="col-md-3">
    <label for="carro" class="form-label">Carro</label>
    <select class="form-select" id="carro" name="carro" required>
    <option selected disabled value="">Selecione</option>
        <?php 
          $id = $_SESSION['id'];
          $sql = "SELECT id_car, modelo, ano, tipo, placa FROM carros
          WHERE id_user = '" . $id . "'";
          $result_car = mysqli_query($conn, $sql);
          while ($car = mysqli_fetch_array($result_car)) {

              ?>
                <option value="<?php echo $car[0]; ?>"><?php echo $car[1] . " " . $car[3] . " " . $car[2] . " - " . $car[4]; ?></option>
              <?php
            
          }
        ?>
    </select>
  </div>
  <div class="col-md-3">
    <label for="func" class="form-label">Funcionario</label>
    <select class="form-select" id="func" name="func" required>
    <option selected disabled value="">Selecione</option>
        <?php 
            $sql = "SELECT id_func, nome_func FROM funcionarios";
            $result_func = mysqli_query($conn, $sql);
            while ($func = mysqli_fetch_array($result_func)) {
                ?>
                <option value="<?php echo $func[0]; ?>"><?php echo $func[1];?></option>
                <?php
            }
        ?>
    </select>
    
  </div>
  <div class="col-md-2">
    <label for="data" class="form-label">Data</label>
    <input type="date" class="form-control" id="data" name="data" required>
    
  </div>
  <div class="col-md-2">
    <label for="hora" class="form-label">Horários disponiveis</label>
    <select class="form-select" id="hora" name="hora" required>
      <option selected disabled value="">Selecione</option>
            <?php 
            $sql = "SELECT hora_disp FROM horarios_disp WHERE hora_disp NOT IN (SELECT hora_disp FROM agendamento)";
            $result_hr = mysqli_query($conn, $sql);
            
            while ($hora = mysqli_fetch_array($result_hr)) {
              ?>
              <option value="<?php echo $hora[0]; ?>"><?php echo $hora[0]; ?></option>
              <?php
            }
            ?>  
          
    </select>
    
  </div>
  <div class="col-md-4">
    <label for="servico" class="form-label">Serviço</label>
    <select class="form-select" id="servico" name="servico" required>
    <option selected disabled value="">Selecione</option>
        <?php 
            $sql = "SELECT id_servico, servico, valor, tempo_servico  FROM servicos;";
            $result_serv = mysqli_query($conn, $sql);

            while ($serv = mysqli_fetch_array($result_serv)) {
                ?>
                <option value="<?php echo $serv[0]; ?>"><?php echo $serv[1] . " - R$" . $serv[2] . ", " . $serv[3] . " minutos"; ?></option>
                <?php
            }
        ?>
    </select>
    
  </div>
  <div class="col-12">
    <div class="form-check">
      <input type="hidden" id=status name="status" value="0">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Agendar Horario</button>
  </div>
 <input type="hidden" value="<?php if (isset($_GET['disponivel']) && $_GET['disponivel'] == 1) { echo $_GET['disponivel']; }?>" id="disp">
 <input type="hidden" id="login" value="<?php if($_GET){ echo @$_GET['login']; }?>"/>
</form>
</div>
<div class="container-detail-table">
<table id="table" class="table" style="width:100%; color: white;">

    <thead>
      <tr>
      <th>Cliente</th>
                <th>Responsavel</th>
                <th>Modelo</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Horario</th>
                <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php
            $id = $_SESSION['id'];
            $i = 0;
            $sql = 'SELECT id_agendamento, u.username, f.nome_func, c.modelo, s.servico, a.data_agen, hora_disp, a.status FROM agendamento AS a
            INNER JOIN funcionarios AS f
            ON a.id_func = f.id_func
            INNER JOIN usuarios AS u
            ON a.id_user = u.id_user
            INNER JOIN servicos AS s
            ON a.id_servico = s.id_servico
            INNER JOIN carros AS c
            ON a.id_car = c.id_car
            WHERE status = 0';
            $result = mysqli_query($conn, $sql);
            while($ag = mysqli_fetch_array($result)){
                
                ?>
                <input type="hidden" id='user-<?php echo $i;?>' value="<?php echo $ag[0];?>">
                <td><?php echo $ag[1];?></td>
                <td><?php echo $ag[2];?></td>
                <td><?php echo $ag[3];?></td>
                <td><?php echo $ag[4];?></td>
                <td><?php echo date('d/m/Y', strtotime($ag[5]));?></td>
                <td><?php echo $ag[6]; ?></td>
                <td>
                Agendado
                </td>
                
                <?php
            echo '</tr>';
            $i++;
            }
            ?>
    </tbody>
  </table>
</div>
</body>
</html>
<script src="../assets/js/agendamento.js">
</script>