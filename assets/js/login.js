
var erro = document.getElementById('erro').value; 
if(erro == 1){
    document.getElementById('incorrect').style.display = "block";
}
if(erro == 2) {
    document.getElementById('used').style.display = "block";
}
if(erro == 3) {
    document.getElementById('notRegistered').style.display = "block";
}
var sts = document.getElementById('login').value;
if(sts == 1) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Cadastro realizado com sucesso!',
        text: 'Faça o login para continuar.',
        showConfirmButton: false,
        timer: 3000
    })
}

loginButton.onclick = function () {
    document.querySelector("#flipper").classList.toggle("flip");
}

registerButton.onclick = function () {
    document.querySelector("#flipper").classList.toggle("flip");
} 

