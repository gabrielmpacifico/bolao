<?php
session_start();
include 'menu.html';
?>

<div class="sidenav">
    <hr>
    <a href="#" onclick="regras()">Regras</a>
    <hr>
    <a href="#" onclick="perguntas()">Perguntas frequentes</a>
    <hr>
    <a href="#" onclick="login()">LogIn</a>
    <hr>
    <span style="margin-left: 15px;">V2.3 - GabrielMP</span>
    <hr>
    <?php if (isset($_SESSION['usuario_existe'])): ?>
    Nome de participante já cadastrado.<br>Clique aqui para voltar todos os placares inseridos e mudar o nome.
    <?php endif; unset($_SESSION['usuario_existe']); ?>

    <?php if (isset($_SESSION['loginincorreto'])): ?>
    <h3 style="font-size:20px;color:red;">Usuário ou senha incorreta.</h3>
    <?php endif; unset($_SESSION['loginincorreto']); ?>
    
</div>

<div class="main">
    <div id="regras" style="display: none">
        <h1 align="center" style="color:#CCCC00;">
        REGRAS<br><br><br>
        PONTUAÇÃO<br>
        Acertando o placar do jogo - 10 pontos.<br>
        Acertando o placar do time vencedor - 06 pontos.<br>
        Acertando apenas o empate - 04 pontos.<br>
        Acertando o time vencedor independente do placar - 02 pontos.<br>
        Acertando qualquer placar - 01 pontos.<br><br><br>
        APOSTA<br>
        Valor da aposta por tabela - R$30,00.<br>
        Primeiro lugar - 75% do valor arrecadado.<br>
        Segundo lugar - 20% do valor arrecadado.<br>
        Obs.: 5% do valor arrecadado serão utilizados para as despesas.
        </h1>
    </div>
    <div id="perguntas" style="display: none">
        <h1 align="center" style="color:#CCCC00;"></h1>
    </div>
    <div id="login" style="display: none">
        <?php if (isLoggedIn()): ?>
        <h1>Olá,<a href="panel.php">Painel</a> | <a href="logout.php">Sair</a></h1>
        <?php else: ?>
        Área exclusiva para o(a) administrador(a) do Bolão
        <form method="POST" action="login.php">
        <input type="text" name="usuario">
        <input type="password" name="senha">
        <input type="submit">
        </form>
        <?php endif; ?>
        <?php function isLoggedIn(){
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
        {
            return false;
        }
        return true;
        }
        ?>
    </div>

</div>

<script type="text/javascript">
    function regras(){
        document.getElementById("perguntas").style.display = "none";
        document.getElementById("login").style.display = "none";
        document.getElementById("regras").style.display = "block";
    
    }
    function perguntas(){
        document.getElementById("regras").style.display = "none";
        document.getElementById("login").style.display = "none";
        document.getElementById("perguntas").style.display = "block";
    }
    function login(){
        document.getElementById("regras").style.display = "none";
        document.getElementById("perguntas").style.display = "none";
        document.getElementById("login").style.display = "block";
    }
</script>

<style>
input[type=text]{
    -webkit-appearance: none;
    border: 0 2px 0 0 solid green;
}
hr{
    width: 80%;
}

.sidenav {
  height: 100%; 
  width: 250px; 
  position: fixed; 
  z-index: 1;
  top: 0; 
  left: 0;
  background-color: #e5e619; 
  overflow-x: hidden; 
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #0d730d;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 250px;
  padding: 0px 10px;
}

@media screen and (max-height: 600px) {
  .sidenav {padding-top: 15px;width: 160px;}
  .sidenav a {font-size: 18px;}
  .main {margin-left: 160px;}
}
</style>


