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
  if (cep.length === 8) {
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

function calculaIdade() {
  d = document.getElementById('dateN').valueAsDate;
  const ano = d.getUTCFullYear();
  const dataAtual = new Date();
  const anoAtual = dataAtual.getFullYear();
  const result = (anoAtual - ano);
  if ((result > 100) || (result < 18)) {
    Swal.fire({
      title: 'IDADE INVÁLIDA',
      text: 'APENAS MAIORES DE 18 ANOS ATÉ 100 ANOS!',
      icon: 'warning',
      timer: 0
    });
    document.getElementById("dateN").value = "";
    document.getElementById("dateN").focus();
  } else {
    document.getElementById("idade").value = result;
  }
}

function verificaPassword() {

  var password = document.getElementById('inputPassword').value;
  var passwordV = document.getElementById('inputPasswordV').value;
  if (password === passwordV) {
    return true;

  } else {
    document.getElementById('passwordR').focus();

    Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'As senhas devem ser idênticas!',
      text: 'Verifique suas senhas.',
      showConfirmButton: false,
      timer: 3000
    })
    console.log('false');
    return false;

  }
}