<?php

require_once 'header.php';
require_once 'header.php';
require_once '../config/conexao.php';

$username = $_SESSION['username'];

$sql = "SELECT * FROM usuarios
WHERE username = '" . $username . "' ";

$result = mysqli_query($conn, $sql);
$dados_user = mysqli_fetch_array($result);

    ?>
    
    <div class="container-detail">
    <h1 class='title'>CADASTRO DE FUNCIONÁRIO</h1>
    <form class="row g-3 needs-validation" action="../config/create_func.php" method="POST" novalidate>
    <div class="col-md-6">
      <label for="inputEmail" class="form-label">EMAIL</label>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="example@carwash.com" required>
    </div>
    <div class="col-md-6">
      <label for="inputUser" class="form-label">NOME COMPLETO</label>
      <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Ex: João Paulo Carlos" required>
    </div>
    <div class="col-md-2">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Ex: 000.000.000-00" maxlength="14" required>
    </div>
    <div class="col-md-2">
      <label for="dateN" class="form-label">DATA DE NASCIMENTO</label>
      <input type="date" class="form-control" id="dateN" name="dateN" onblur="calculaIdade()" placeholder="Ex: 01/01/2000" required>
    </div>

    <div class="col-md-2">
      <label for="idade" class="form-label">IDADE</label>
      <input type="text" class="form-control" id="idade" name="idade" readonly>
    </div>
   
    <div class="col-3">
      <label for="inputCellphone" class="form-label">CELULAR</label>
      <input type="text" class="form-control" id="inputCellphone" name="inputCellphone" placeholder="(47) 9 9999-9999" maxlength="15" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-3">
      <label for="inputTelephone" class="form-label">TELEFONE</label>
      <input type="text" class="form-control" id="inputTelephone" name="inputTelephone" placeholder="(47) 3333-3333" maxlength="14" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">CRIE UMA SENHA</label>
      <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="*********" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputPassword5" class="form-label">CONFIRME SUA SENHA</label>
      <input type="password" class="form-control" id="inputPasswordC" name="inputPassword2" placeholder="*********" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">CEP</label>
      <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Ex: 12345-777" maxlength="9" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-5">
      <label for="inputAddress" class="form-label">ENDEREÇO</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-1">
      <label for="inputNumber" class="form-label">Nº</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="   1234" name="inputNumber" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputDistrict" class="form-label">BAIRRO</label>
      <input type="text" class="form-control" id="inputDistrict" name="inputDistrict" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">CIDADE</label>
      <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Ex: São Paulo" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">ESTADO</label>
      <select class="form-select" id="inputState" name="inputState" aria-describedby="validationServer04Feedback" required>
        <?php
        if ($dados_user[14]) {
          echo '<option value="">' . $dados_user[14] . '</option>';
        } else {
          echo '<option value="" disabled>Selecione</option>';
        }
        ?>
        <option value="AC">AC</option>
        <option value="AL">AL</option>
        <option value="AP">AP</option>
        <option value="AM">AM</option>
        <option value="BA">BA</option>-
        <option value="CE">CE</option>
        <option value="DF">DF</option>
        <option value="ES">ES</option>
        <option value="GO">GO</option>
        <option value="MA">MA</option>
        <option value="MS">MS</option>
        <option value="MT">MT</option>
        <option value="MG">MG</option>
        <option value="PA">PA</option>
        <option value="PB">PB</option>
        <option value="PR">PR</option>
        <option value="PE">PE</option>
        <option value="PI">PI</option>
        <option value="RJ">RJ</option>
        <option value="RN">RN</option>
        <option value="RS">RS</option>
        <option value="RO">RO</option>
        <option value="RR">RR</option>
        <option value="SC">SC</option>
        <option value="SP">SP</option>
        <option value="SE">SE</option>
        <option value="TO">TO</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputFunc" class="form-label">FUNÇÃO</label>
      <select class="form-select" id="inputFunc" name="inputFunc" aria-describedby="validationServer04Feedback" required>
        <option value="" disabled>Selecione</option>
        <option value="Recursos Humanos">Recursos Humanos</option>
        <option value="Encerador">Encerador</option>
        <option value="Lavador">Lavador</option>
        <option value="Gestor">Gestor</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputSalario" class="form-label">SALARIO</label>
      <input type="text" class="form-control" id="inputSalario" name="inputSalario" placeholder="R$ 1.000,00" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="permissao" class="form-label">PERMISSÃO</label>
      <select class="form-select" id="permissao" name="permissao" aria-describedby="validationServer04Feedback" required>
        <option value="" disabled>Selecione</option>
        <option value="1">Sim</option>
        <option value="2">Não</option>
      </select>
    </div>

    <div class="col-12">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label" for="invalidCheck">
          Corcordo com os termos e condições  
        </label>
        <div class="invalid-feedback">
          Você precisa concordar com os termos e condições.
        </div>
      </div>
    </div>
    <input type="hidden" id='sts' name='sts' value="1">
    <div class="col-12">
      <button class="btn btn-primary" type="submit">CADASTRAR CLIENTE</button>
    </div>
  </form>
</div>
</body>

</html>

<?php if (isset($_GET['Status']) && $_GET['Status'] == 1) { ?>
        <script>
            Swal.fire({
            title: 'Cadastro de funcionario realizado com sucesso!',
            icon: 'success',
            timer: 0
            });
        </script>
<?php } ?>

<script src="../assets/js/cadastro_funcionario.js"></script>