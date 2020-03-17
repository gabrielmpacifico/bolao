<?php
session_start();
include 'conn.php';
include 'menu.html';
include 'verificarlogin.php';
include "adminmenu.php";

echo '<div class="main">';
echo '<form method="POST" action="addpartaction.php">';
echo '<div class="nomeinput">';
echo '<input class="nome" type="text" name="nome" placeholder="Nome do participante" required>';
echo '</div>';
echo '<table align="center" border=1 frame=void rules=rows>';
$num = 1;
$sql = "SELECT timemandante,timevisitante FROM bolao.partida;";
$stmt = $conn->prepare($sql);$stmt->execute();
while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    echo '<tr>
    <td align="right" style="width:30%">'.$row->timemandante.'</td>
    <td style="text-align:center;">
    <input style="width:20%" align="right" class="numero" type="text" name="a'.$num.'" required> 
    X 
    <input style="width:20%" class="numero" type="text" name="b'.$num.'" required></td>
    <td align="left" style="width:30%">'.$row->timevisitante.'</td>
    </tr>';
    $num = $num + 1;
}
echo '</table>';
echo '<div class="nomeinput">';
echo '<input id="enviar" class="enviar" type="submit">'; ?>

  <?php if (isset($_SESSION['usuario_existe'])): ?>
    <h5 style="color: red"><br>Nome de participante já cadastrado</h5>
  <?php endif; unset($_SESSION['usuario_existe']); ?>

<?php echo '</div>';
echo '</form>';
echo '</div>';



?>

<style>
  table{
    color:white;
    font-size: 30px;
    width: 700px;
  }
  input.numero{
    width: 50px;
    border-radius: 6px;
  }
  input.nome{
    width: 250px;
    margin-left: auto;
    border-radius: 5px;
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



