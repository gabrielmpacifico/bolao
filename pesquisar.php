<?php 
include 'conn.php';
include 'menu.html';

echo '<div class="partdiv">';
echo '<form method="GET" action="pesquisar.php">
<input type="text" name="participante">
<input type="submit">
</form>';
if (isset($_GET['participante'])) {
    if($_GET['participante'] != ""){
        $nomepart = $_GET['participante'];

        $sql = "SELECT pontos FROM bolao.users WHERE nome = :nomepart;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nomepart', $nomepart);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(! $row){
            echo'<h2>Nome não registrado ou digitado de forma incorreta</h2>';;
        }else{
            $sql = "SELECT idusers FROM `bolao`.`users` WHERE nome = :nomepart";
            $stmt0 = $conn->prepare($sql);
            $stmt0->bindParam(':nomepart', $nomepart);
            $stmt0->execute();
            $row0 = $stmt0->fetch(PDO::FETCH_OBJ);
            $idusers = $row0->idusers;

           $sql = "SELECT aposta.idusers,aposta.idpartida,partida.timemandante,aposta.mandante,aposta.visitante,partida.timevisitante,aposta.pontosporjogo FROM bolao.partida INNER JOIN bolao.aposta ON aposta.idpartida = partida.idpartida WHERE aposta.idusers = :idusers ORDER BY aposta.idpartida ASC;"; 
           $stmt2 = $conn->prepare($sql);
           $stmt2->bindParam(':idusers', $idusers);
           $stmt2->execute();

            echo '<h3>'.$nomepart.'</h3>';
            echo '<h3>Pontuação: '.$row->pontos.'</h3>';

            while ($row2 = $stmt2->fetch(PDO::FETCH_OBJ)) {
                echo '</div>';
                echo '<div class="nome">';
                echo '<h5 align="left">'.$row2->idpartida.'</h5>';
                echo '<table style="width: 100%;"><tr>
                <td align="left" style="width:40%;"><h1>'.$row2->timemandante.'</h1></td>
                <td style="width:20%;"><h1>'.$row2->mandante.' x '.$row2->visitante.'</h1></td>
                <td align="right" style="width:40%;"><h1>'.$row2->timevisitante.'</h1></td>
                </tr></table>';

                echo '<h5 align="right">Pontuação na partida: '.$row2->pontosporjogo.'</h5>';
                echo '</div>';
            }
        }
    }else{echo'<h2>Digite o nome do participante</h2>';$nomepart = " ";}
}else{echo'<h2>Digite o nome do participante</h2>';$nomepart = " ";}
echo '</div>' ;





?>

<style>
    div.nome{
        width:800px;
        height:105px;
        border: 1px solid yellow;
        margin: auto;
        color: white;
        margin-bottom:5px;
        color:#CCCC00;
        text-align: center;
        line-height: 100px;
        font-size: 40px;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    form{
        margin-top: 15px;
    }
    div.partdiv{
        width: 400px;
        height: 135px;
        text-align: center;
        color:#CCCC00;
        margin: auto;
        margin-top: 20px;
        margin-bottom:20px;
        border: 1px solid yellow;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    input[type=text]{
        background-color: #CCCC00;
        border-radius: 10px;
    }
    input[type=submit]{
        background-color: #CCCC00;
        border-radius: 10px;
    }
    h2,h3{
        margin-top: 8px;
    }
    h5{
        margin: 0;
    }
    h1{
        margin-bottom: 3px;
    }
</style>

