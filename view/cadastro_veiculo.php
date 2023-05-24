<?php
require_once '../config/conexao.php';
require_once 'header.php';

$id_user = $_SESSION['id'];
$sql = "SELECT permissao FROM funcionarios WHERE id_func = '" . $id_user . "'";
$result = mysqli_query($conn, $sql);
$permissao = mysqli_fetch_array($result);
?>
  <div class="container-detail">
  <h1 class='title'>CADASTRE SEU VEÍCULO</h1>
    <form class="row g-3 needs-validation" action="../config/cadastro_veiculo.php" method="POST" novalidate>
      <div class="col-md-4">
        <label for="model" class="form-label">Modelo</label>
        <input type="text" class="form-control" id="model" name="model" placeholder="Ex: Gol" required>
      </div>
      <div class="col-md-2">
        <label for="mark" class="form-label">Marca</label>
        <select class="form-select" id="mark" name="mark" required>
          <option selected disabled value="">Selecione</option>
          <option value="Chevrolet">Chevrolet</option>
          <option value="Fiat">Fiat</option>
          <option value="Ford">Ford</option>
          <option value="Volkswagen">Volkswagen</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="year" class="form-label">Ano</label>
        <div class="input-group has-validation">
          <select class="form-select" id="year" name="year" required>
            <option selected disabled value="">Selecione</option>
            <?php
            for ($i = 1985; $i <= 2050; $i++) {
              echo "<option value=\"$i\">$i</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="col-md-2">
        <label for="plate" class="form-label">Placa do veículo</label>
        <input type="text" class="form-control" id="plate" name="plate" maxlength="9" placeholder="Ex: LSV4149" required>
      </div>
      <div class="col-md-2">
        <label for="porte" class="form-label">Porte</label>
        <select class="form-select" id="porte" name="porte" required>
          <option selected disabled value="">Selecione</option>
          <option value="Pequeno">Pequeno</option>
          <option value="Médio">Médio</option>
          <option value="Grande">Grande</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="type" class="form-label">Tipo</label>
        <select class="form-select" id="type" name="type" required>
          <option selected disabled value="">Selecione</option>
          <option value="Hatch">Hatch</option>
          <option value="Sedan">Sedan</option>
          <option value="SUV">SUV</option>
        </select>
      </div>
      <?php
      if($_SESSION['permissao'] == 1){
      ?>
      <div class="col-md-2">
        <label for="cliente" class="form-label">Cliente</label>
        <select class="form-select" id="cliente" name="cliente" required>
          <option selected disabled value="">Selecione</option>
          <?php
          $sql = "SELECT us.id_user, us.username FROM usuarios AS us;";
          $result_users = mysqli_query($conn, $sql);

          while ($users = mysqli_fetch_array($result_users)) {
          ?>
            <option value="<?php echo $users[0]; ?>"><?php echo $users[1]; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <?php 
      }
      ?>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Agree to terms and conditions
          </label>
          <div class="invalid-feedback">
            You must agree before submitting.
          </div>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Cadastrar veículo</button>
      </div>
    </form>
    <input type="hidden" id="status" value="<?php if ($_GET) {
                                              echo @$_GET['status'];
                                            } ?>" />
  </div>

  <div class="container-detail-table" style="background: rgba(0, 0, 0, 0.6)">

    <table id="tableVeiculos" class="table" style="width:100%; color: white;">
      <thead>
        <tr>
          <th>Código de cliente</th>
          <th>Cliente</th>
          <th>Carro</th>
          <th>Marca</th>
          <th>Placa</th>
          <th>Ano</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sqlCadastros = "SELECT u.id_user AS id, u.username AS nome, c.modelo AS modelo, 
            c.marca AS marca, c.placa AS placa, c.ano AS ano FROM usuarios AS u 
            INNER JOIN carros AS c ON (u.id_user = c.id_user)";

        if($_SESSION['permissao'] == 0){
          $sqlCadastros .= " WHERE u.id_user = '" . $id_user . "'";
        }

        $resultC = mysqli_query($conn, $sqlCadastros);

        while ($preencher = mysqli_fetch_array($resultC)) {
        ?>
          <tr>
            <td><?php echo $preencher['id']; ?></td>
            <td><?php echo $preencher['nome']; ?></td>
            <td><?php echo $preencher['modelo']; ?></td>
            <td><?php echo $preencher['marca']; ?></td>
            <td><?php echo $preencher['placa']; ?></td>
            <td><?php echo $preencher['ano']; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
<script src="../assets/js/cadastro_veiculo.js"></script>