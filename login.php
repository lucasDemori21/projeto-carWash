<?php
require_once "config/conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-Br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarWash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(assets/images/lindo-carro-no-servico-de-lavagem.jpg); background-size: cover;">
    <div class="navegacao">
        <nav class="nav-bar">
            <button class="nav-button">Login/Registro</button>
            <button class="nav-button" data-bs-toggle="modal" data-bs-target="#localizacao">Localização</button>
            <button class="nav-button" data-bs-toggle="modal" data-bs-target="#contato">Contato</button>
            <button class="nav-button" data-bs-toggle="modal" data-bs-target="#sobre">Sobre</button>
        <div class="modal fade" id="localizacao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Localização</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                            <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
                            <script>(function () {var setting = {"height":844,"width":1046,"zoom":10,"queryString":"Joinville - SC, Brasil","place_id":"ChIJN6uxnfOj3pQR-ulh8Z2YS7w","satellite":false,"centerCoord":[-26.26356770132399,-48.96288129950751],"cid":"0xbc4b989df161e9fa","lang":"pt","cityUrl":"/brazil/joinville-14537","cityAnchorText":"","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"914957"};var d = document;var s = d.createElement('script');s.src = 'https://1map.com/js/script-for-user.js?embed_id=914957';s.async = true;s.onload = function (e) {window.OneMap.initMap(setting)};var to = d.getElementsByTagName('script')[0];to.parentNode.insertBefore(s, to);})();</script><a href="https://1map.com/pt/map-embed">1 Map</a></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-weight: bold; font-size: 18px; padding-bottom: 7%;">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="contato" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Contato</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="ouvidoria-info">
                            <h3>Informações de contato</h3>
                            <p>Horário de atendimento: Segunda - Sexta das 08:30h às 18h</p>
                            <p>Telefone: (47) 3333-3333</p>
                            <p>Whatsapp: <a href="https://wa.link/n9gqxm" target='blank'> (47) 9 9635-6349</a></p>                 
                            <p>Email: contato@carwash.com</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="font-weight: bold; font-size: 18px; padding-bottom: 7%;">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="sobre" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Sobre</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="accordion w-100" style="z-index: 0;" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item" style="margin-top: 0%; border-radius: 5px; border: none;">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Nossa história
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body" >
                                <strong style="font-size: 20px;">This is the second item's accordion body.</strong><p style="font-size: 18px;">
                                    It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the, though the transition does limit overflow.
                                </p> 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="margin: 5% 0; border-radius: 5px; border: none;">
                        <h2 class="accordion-header" >
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            O que oferecemos?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body" >
                                <strong style="font-size: 20px;">This is the second item's accordion body.</strong><p style="font-size: 18px;">
                                    It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the, though the transition does limit overflow.
                                </p> 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" style="margin-top: 5%; border-radius: 5px; border: none;"> 
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Quem somos?
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body" >
                                <strong style="font-size: 20px;">This is the second item's accordion body.</strong><p style="font-size: 18px;">
                                    It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the, though the transition does limit overflow.
                                </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="font-weight: bold; font-size: 18px; padding-bottom: 7%;" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="flip-container">
            <div class="flipper" id="flipper">
                <div class="front">
                    <h1 class="title">Login</h1>
                    <form action="config/autentica.php" method="post" class="login">
                        <div>
                            <div class="input-login">
                                <label>E-mail</label>
                                <input type="email" id="userLogin" name="userLogin" placeholder="example@gmail.com" required/>
                            </div>
                            <div class="input-login">
                                <label>Senha</label>
                                <input type="password" id="passwordLogin" name="passwordLogin" placeholder="********" autocomplete="off"/>
                            </div>
                            <div id="incorrect" style="display: none;" class="error">
                                <span>Senha incorreta! Tente novamente.</span>
                            </div>
                            <div id="notRegistered" style="display: none;" class="error">
                                <span>Email não registrado!</span>
                            </div>
                        </div> 
                        <button type="submit" name="login" value="Login">Entrar</button>
                    </form>
                    <div class="register-link">
                        <a id="loginButton" href="#">Não possui uma conta? Clique aqui para se cadastrar</a>
                    </div>
                </div>
                <div class="back" >
                    <h1 class="title">Register</h1>
                    <form action="config/registro.php" method="post" class="login" onsubmit="return verificaPassword();">
                        <div>
                            <div class="input-login">
                                <label>Nome de usuário</label>
                                <input type="text" id="userR" name="userR" placeholder="Nome de usuário" required/>
                            </div>
                            <div class="input-login">
                                <label>E-mail</label>
                                <input type="email" id="email" name="email" placeholder="example@gmail.com" required/>
                            </div>
                            <div class="input-login">
                                <label>Crie uma senha</label>
                                <input type="password" id="passwordR" name="passwordR" placeholder="********" autocomplete="off" required/>
                            </div>
                            <div class="input-login">
                                <label>Confirme sua senha</label>
                                <input type="password" id="passwordC" name="passwordC" placeholder="********" autocomplete="off" required/>
                            </div>
                            <div id="used" style="display: none;" class="error">
                                <span>E-mail já registrado! Use outro.</span>
                            </div>
                            <input type="hidden" id='sts' name='sts' value="0">
                        </div>
                        
                        <button type="submit" name="salvar" value="Register">Cadastre-se</button>
                    </form>
                    <div class="register-link">
                        <a id="registerButton" href="#">Já possui uma conta? Clique aqui fazer login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<input type="hidden" id="erro" value="<?php if($_GET){ echo @$_GET['Erro']; }?>"/>
<input type="hidden" id="login" value="<?php if($_GET){ echo @$_GET['login']; }?>"/>
</body>
</html>
<script src="assets/js/login.js"></script>