<?php
require_once 'header.php';
require_once '../config/conexao.php';

$username = $_SESSION['username'];

$sql = "SELECT * FROM usuarios
WHERE username = '" . $username . "' ";

$result = mysqli_query($conn, $sql);
$dados_user = mysqli_fetch_array($result);

?>

<div class="container-detail">
  <form class="row g-3 needs-validation" action="../config/update_dados.php" method="POST" novalidate>
    <div class="col-md-6">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $dados_user[5]; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6">
      <label for="inputUser" class="form-label">Nome de usuario</label>
      <input type="text" class="form-control" id="inputUser" name="inputUser" value="<?php echo $dados_user[4]; ?>" required>
    </div>
    <div class="col-md-2">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $dados_user[1]; ?>" required>
    </div>
    <div class="col-md-2">
      <label for="dateN" class="form-label">Data de nascimento</label>
      <input type="date" class="form-control" id="dateN" name="dateN" value="<?php echo $dados_user[2]; ?>" required>
    </div>
    <div class="col-md-2">
      <label for="idade" class="form-label">Idade</label>
      <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $dados_user[3]; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-3">
      <label for="inputCellphone" class="form-label">Celular</label>
      <input type="text" class="form-control" id="inputCellphone" name="inputCellphone" placeholder="(XX) X XXXX-XXXX" value="<?php echo $dados_user[7]; ?>">
    </div>
    <div class="col-3">
      <label for="inputTelephone" class="form-label">Telefone</label>
      <input type="text" class="form-control" id="inputTelephone" name="inputTelephone" placeholder="(XX) XXXX-XXXX" value="<?php echo $dados_user[8]; ?>">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Atualizar senha</label>
      <input type="password" class="form-control" id="inputPassword4" name="inputPassword4">
    </div>
    <div class="col-md-6">
      <label for="inputPassword5" class="form-label">Confimar nova senha</label>
      <input type="password" class="form-control" id="inputPassword5" name="inputPassword5">
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">Zip</label>
      <input type="text" class="form-control" id="inputZip" name="inputZip" value="<?php echo $dados_user[15]; ?>" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-5">
      <label for="inputAddress" class="form-label">Endereço</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress" value="<?php echo $dados_user[9]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-1">
      <label for="inputNumber" class="form-label">Nº</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="   1234" name="inputNumber" value="<?php echo $dados_user[10]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputComplement" class="form-label">Complemento</label>
      <input type="text" class="form-control" id="inputComplement" placeholder="Apartment, studio, or floor" name="inputComplement" value="<?php echo $dados_user[11]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputDistrict" class="form-label">Bairro</label>
      <input type="text" class="form-control" id="inputDistrict" name="inputDistrict" value="<?php echo $dados_user[12]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">Cidade</label>
      <input type="text" class="form-control" id="inputCity" name="inputCity" value="<?php echo $dados_user[13]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
      <select class="form-select" id="inputState" name="inputState" aria-describedby="validationServer04Feedback" required>
        <?php
        if ($dados_user[14]) {
          echo '<option value="">' . $dados_user[14] . '</option>';
        } else {
          echo '<option value="">Selecione</option>';
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
      <button class="btn btn-primary" type="submit">Atualizar informações</button>
    </div>
  </form>
</div>

</body>

</html>
<?php if (isset($_GET['update']) && $_GET['update'] == 1) { ?>
  <script>
    Swal.fire({
      title: 'Atualizações de cadastro realizado com sucesso!',
      icon: 'success',
      timer: 0
    });
  </script>
<?php } ?>
<script>
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

  const inputCep = document.getElementById('inputZip');

inputCep.addEventListener('input', () => {
  const cep = inputCep.value.replace(/\D/g, '');
  if (cep.length === 8){
    const url = `https://viacep.com.br/ws/${cep}/json/`;
    fetch(url)
      .then(response => response.json())
      .then(data => {
        document.getElementById('inputAddress').value = data.logradouro;
        document.getElementById('inputDistrict').value = data.bairro;
        document.getElementById('inputCity').value = data.localidade;
        document.getElementById('inputState').value = data.uf;
      })
      .catch(error => {
        console.log('Erro');
        console.log(error);
      });
  }
});
</script>