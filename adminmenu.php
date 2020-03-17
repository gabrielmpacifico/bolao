<div class="sidenav">
  <a href="panel.php"><h1 align="center" style="color: #0d730d">ADMIN</h1></a>
  <hr>
  <a href="addpart.php">Adicionar participante</a>
  <hr>
  <a href="alterpart.php">Alterar participante</a>
  <hr>
  <a href="addoficiais.php">Adicionar times e placar oficiais</a>
  <hr>
  <a href="attpontos.php">Atualizar pontos</a>
  <hr>
  <a href="logout.php">Sair</a>
  <hr>

  <?php if (isset($_SESSION['usuario_existe'])): ?>
  <a href="javascript:history.go(-1)" style="font-size:20px;color:red;">Nome de participante já cadastrado.<br>Clique aqui para voltar todos os placares inseridos e mudar o nome.</a>
  <?php endif; unset($_SESSION['usuario_existe']); ?>
</div>
<style>
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