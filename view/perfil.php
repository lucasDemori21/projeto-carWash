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
  <h1 class='title'>ATUALIZAR CADASTRO</h1>
  <form class="row g-3 needs-validation" action="../config/update_dados.php" method="POST" novalidate>
    <div class="col-md-6">
      <label for="inputEmail" class="form-label">EMAIL</label>
      <input type="text" class="form-control" id="inputEmail" name="inputEmail" value="<?php echo $dados_user[5]; ?>" required>
    </div>
    <div class="col-md-6">
      <label for="inputUser" class="form-label">NOME DE USUARIO</label>
      <input type="text" class="form-control" id="inputUser" name="inputUser" value="<?php echo $dados_user[4]; ?>" required>
    </div>
    <div class="col-md-2">
      <label for="cpf" class="form-label">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $dados_user[1]; ?>" placeholder="Ex: 000.000.000-00" maxlength="14" required>
    </div>
    <div class="col-md-2">
      <label for="dateN" class="form-label">DATA DE NASCIMENTO</label>
      <input type="date" class="form-control" id="dateN" name="dateN" onblur="calculaIdade()" value="<?php echo $dados_user[2]; ?>" onblur="teste()" required>
    </div>

    <div class="col-md-2">
      <label for="idade" class="form-label">IDADE</label>
      <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $dados_user[3];?>" readonly>
    </div>

    <div class="col-3">
      <label for="inputCellphone" class="form-label">NÚMERO DE CELULAR</label>
      <input type="text" class="form-control" id="inputCellphone" name="inputCellphone" placeholder="(47) 9 9999-9999" maxlength="15" value="<?php echo $dados_user[7]; ?>">
    </div>
    <div class="col-3">
      <label for="inputTelephone" class="form-label">NÚMERO DE TELEFONE</label>
      <input type="text" class="form-control" id="inputTelephone" name="inputTelephone" placeholder="(47) 3333-3333" maxlength="14" value="<?php echo $dados_user[8]; ?>">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">NOVA SENHA</label>
      <input type="password" class="form-control" id="inputPassword" placeholder="*********" name="inputPassword">
    </div>
    <div class="col-md-6">
      <label for="inputPassword5" class="form-label">CONFIRMAR NOVA SENHA</label>
      <input type="password" class="form-control" id="inputPassworC" placeholder="*********" name="inputPasswordC">
    </div>
    <div class="col-md-3">
      <label for="inputZip" class="form-label">CEP</label>
      <input type="text" class="form-control" id="inputZip" name="inputZip" placeholder="Ex: 12345-777" maxlength="9" value="<?php echo $dados_user[15]; ?>" aria-describedby="validationServer05Feedback" required>
    </div>
    <div class="col-md-5">
      <label for="inputAddress" class="form-label">ENDEREÇO</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress" value="<?php echo $dados_user[9]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-1">
      <label for="inputNumber" class="form-label">Nº</label>
      <input type="text" class="form-control" id="inputNumber" placeholder=" 800" name="inputNumber" value="<?php echo $dados_user[10]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputComplement" class="form-label">COMPLEMENTO</label>
      <input type="text" class="form-control" id="inputComplement" placeholder="Apartment, studio, or floor" name="inputComplement" value="<?php echo $dados_user[11]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputDistrict" class="form-label">BAIRRO</label>
      <input type="text" class="form-control" id="inputDistrict" name="inputDistrict" value="<?php echo $dados_user[12]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">CIDADE</label>
      <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Ex: São-Paulo" value="<?php echo $dados_user[13]; ?>" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label">ESTADO</label>
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
          Corcordo com os termos e condições
        </label>
        <div class="invalid-feedback">
          Você precisa concordar com os termos e condições.
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
        document.getElementById('inputAddress').readonly = true;
        document.getElementById('inputDistrict').readonly = true;
        document.getElementById('inputCity').readonly = true;
        document.getElementById('inputState').readonly = true;
        
      })
      .catch(error => {
        console.log('Erro');
        console.log(error);
      });
  }
});

  function calculaIdade(){

    const data = document.getElementById('dateN');
      d = document.getElementById('dateN').valueAsDate;
      const ano = d.getUTCFullYear();
      const dataAtual = new Date();
      const anoAtual = dataAtual. getFullYear();
  const result = (anoAtual - ano);
  if((result > 100) || (result < 18)){
    Swal.fire({
      title: 'IDADE INVÁLIDA',
      text: 'APENAS MAIORES DE 18 ANOS ATÉ 100 ANOS!',
      icon: 'warning',
      timer: 0
    });
    document.getElementById("dateN").value = "";
    document.getElementById("dateN").focus();
  }else{
    document.getElementById("idade").value = result;
  }

}

</script>