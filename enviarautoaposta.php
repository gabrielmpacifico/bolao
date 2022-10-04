<?php
session_start();
include 'conn.php';
include 'menu.html';

$codigo = $_POST['codigo'];
$codigo = strval($codigo);

$p1 = "";$p2 = "";$p3 = "";$p4 = ""; 
$p1 = substr($codigo, 0, 4);
$p2 = substr($codigo, 4, 4);
$p3 = substr($codigo, 8, 4);
$p4 = substr($codigo, 12, 4);

$codigo = strval($p1) . "-" . strval($p2) . "-" . strval($p3) . "-" . strval($p4);

//2508-8050-4836-8908
//7212-1393-7201-8102

$sql = "SELECT aa.idusers,aa.sn_ativo,u.nome FROM bolao.auto_aposta aa, bolao.users u WHERE aa.hash = '$codigo' AND u.idusers = aa.idusers;";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);

if($row->nome == "" || $row->sn_ativo == "N"){
    $_SESSION['codigoinvalido'] = true;
    header('Location: codigoaa.php');
    exit();
}

?> <h3 align="center" style="font-size:20px;color:yellow;">Após clicar em enviar, não será possível entrar novamente<br>Tenha certeza dos valores inseridos.</h3> <?php
echo '<div class="main">';
echo '<form method="POST" action="addpartaction.php">';
echo '<div class="nomeinput">';
echo '<input class="nome" type="text" name="nome" value="'.$row->nome.'" readonly>';
echo '<input type="hidden" name="autoaposta" value="true">';
echo '<input type="hidden" name="cdautoaposta" value="'.$codigo.'">';
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
echo '<input id="enviar" class="enviar" type="submit">';
echo '</div>';
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