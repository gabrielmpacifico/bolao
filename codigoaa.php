<?php
session_start();
include 'conn.php';
include 'menu.html';

echo '<div class="main">';
echo '<form method="POST" action="enviarautoaposta.php">';

echo '<div class="nomeinput">';
echo '<h3 align="center" style="font-size:20px;color:#e5e619;">Codigo de auto aposta, sem o traço</h3>';
echo '<input class="nome" minlength="16" maxlength="16" type="text" name="codigo" placeholder="0000000000000000" required>';
echo '</div>';

echo '<div class="nomeinput">';
echo '<input id="enviar" class="enviar" type="submit">';
echo '</div>';

echo '</form>';
echo '</div>';
?>

<?php if (isset($_SESSION['codigoinvalido'])): ?>
    <h3 align="center" style="font-size:20px;color:red;">Código Inválido (não existente ou já utilizado)</h3>
<?php endif; unset($_SESSION['codigoinvalido']); ?>

<?php if (isset($_SESSION['sucesso'])): ?>
    <h3 align="center" style="font-size:20px;color:yellow;">Aposta enviada com sucesso</h3>
<?php endif; unset($_SESSION['sucesso']); ?>

<style>
  input.nome{
    width: 600px;
    margin-left: auto;
    border-radius: 5px;
    font-size: 35px;
    letter-spacing: 10px;
  }
  div.nomeinput{
    text-align:center;
    margin-left: auto;
    margin-top: 40px;
    margin-bottom: 40px;
  }
  p, input{
    display:inline-block;
    text-align: center;
    background-color: #e5e619;
  }
  input.enviar{
    border-radius: 5px;
    width: 300px;
  }
</style>