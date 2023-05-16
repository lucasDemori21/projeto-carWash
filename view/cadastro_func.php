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
    <form class="row g-3 needs-validation" action="../config/create_func.php" method="POST" novalidate>
    <div class="col-md-6">
      <label for="inputEmail" class="form-label">Email</label>
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="example@carwash.com" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-6">
      <label for="inputUser" class="form-label">Nome completo</label>
      <input type="text" class="form-control" id="inputUser" name="inputUser" placeholder="Ex: João Paulo Carlos" required>
    </div>
    <div class="col-md-2">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Ex: 000.000.000-00" maxlength="14" required>
    </div>
    <div class="col-md-2">
      <label for="dateN" class="form-label">Data de nascimento</label>
      <input type="date" class="form-control" id="dateN" name="dateN" placeholder="Ex: 01/01/2000" required>
    </div>
    <div class="col-md-2">
      <label for="idade" class="form-label">Idade</label>
      <input type="number" class="form-control" id="idade" name="idade" placeholder="Ex: 45" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-3">
      <label for="inputCellphone" class="form-label">Celular</label>
      <input type="text" class="form-control" id="inputCellphone" name="inputCellphone" placeholder="(47) 9 9999-9999" maxlength="15" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-3">
      <label for="inputTelephone" class="form-label">Telefone</label>
      <input type="text" class="form-control" id="inputTelephone" name="inputTelephone" placeholder="(47) 3333-3333" maxlength="14" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Crie uma senha</label>
      <input type="password" class="form-control" id="inputPassword4" name="inputPassword" placeholder="*********" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputPassword5" class="form-label">Confime sua senha</label>
      <input type="password" class="form-control" id="inputPassword5" name="inputPassword2" placeholder="*********" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">Cep</label>
      <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Ex: 12345-777" maxlength="9" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-5">
      <label for="inputAddress" class="form-label">Endereço</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-1">
      <label for="inputNumber" class="form-label">Nº</label>
      <input type="text" class="form-control" id="inputNumber" placeholder="   1234" name="inputNumber" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputDistrict" class="form-label">Bairro</label>
      <input type="text" class="form-control" id="inputDistrict" name="inputDistrict" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">Cidade</label>
      <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Ex: São Paulo" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">Estado</label>
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
      <label for="inputFunc" class="form-label">Função</label>
      <select class="form-select" id="inputFunc" name="inputFunc" aria-describedby="validationServer04Feedback" required>
        <option value="" disabled>Selecione</option>
        <option value="Recursos Humanos">Recursos Humanos</option>
        <option value="Encerador">Encerador</option>
        <option value="Lavador">Lavador</option>
        <option value="Gestor">Gestor</option>
      </select>
    </div>
    <div class="col-md-3">
      <label for="inputSalario" class="form-label">Salario</label>
      <input type="text" class="form-control" id="inputSalario" name="inputSalario" placeholder="R$ 1.000,00" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="permissao" class="form-label">Permissão</label>
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
          Agree to terms and conditions
        </label>
        <div class="invalid-feedback">
          You must agree before submitting.
        </div>
      </div>
    </div>
    <input type="hidden" id='sts' name='sts' value="1">
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Cadastrar funcionario</button>
    </div>
  </form>
</div>

</body>

</html>

<?php if (isset($_GET['status']) && $_GET['status'] == 1) { ?>
        <script>
            Swal.fire({
            title: 'Cadastro de funcionario realizado com sucesso!',
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
  const cpfInput = document.getElementById('cpf');

cpfInput.addEventListener('input', () => {
  let value = cpfInput.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{3})(\d)/, '$1.$2'); 
  value = value.replace(/(\d{3})(\d)/, '$1.$2');
  value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
  cpfInput.value = value;
});
const celularInput = document.getElementById('inputCellphone');
const telefoneInput = document.getElementById('inputTelephone');
const cepInput = document.getElementById('inputZip');

celularInput.addEventListener('input', () => {
  let value = celularInput.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{2})(\d)/, '($1) $2');
  value = value.replace(/(\d{5})(\d)/, '$1-$2');
  celularInput.value = value;
});

telefoneInput.addEventListener('input', () => {
  let value = telefoneInput.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{2})(\d)/, '($1) $2');
  value = value.replace(/(\d{4})(\d)/, '$1-$2');
  telefoneInput.value = value;
});

cepInput.addEventListener('input', () => {
  let value = cepInput.value;
  value = value.replace(/\D/g, '');
  value = value.replace(/(\d{5})(\d)/, '$1-$2'); 
  cepInput.value = value;
});

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