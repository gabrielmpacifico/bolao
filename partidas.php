<?php 
include 'conn.php';
include 'menu.html';

echo '<div class="partdiv">';
echo '<h1 class="partnum">RESULTADOS COPA</h1>' ;
echo '</div>' ;

$sql = "SELECT * FROM bolao.partida;";
$stmt = $conn->prepare($sql);$stmt->execute();

$sql = "SELECT * FROM bolao.aposta;";
$stmt2 = $conn->prepare($sql);$stmt2->execute();

while($row = $stmt->fetch(PDO::FETCH_OBJ)){
    echo '</div>';
    echo '<div class="nome">';
    echo '<h5 align="left">'.$row->idpartida.'</h5>';
    echo '<table style="width: 100%;"><tr>
    <td align="left" style="width:40%;"><h1>'.$row->timemandante.'</h1></td>
    <td style="width:20%;"><h1>'.$row->mandante.' x '.$row->visitante.'</h1></td>
    <td align="right" style="width:40%;"><h1>'.$row->timevisitante.'</h1></td>
    </tr></table>';
    $count = 0;
    while($row2 = $stmt2->fetch(PDO::FETCH_OBJ)){
        if($row2->pontosporjogo == 10 && $row->idpartida == $row2->idpartida){
            $count = $count + 1;
        }
    }
    echo '<h5 align="right">Apostas exatas: '.$count.'</h5>';
    echo '</div>';
};

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
    div.partdiv{
        width: 600px;
        height: 80px;
        text-align: center;
        color:#CCCC00;
        margin: auto;
        margin-top: 20px;
        margin-bottom:20px;
        border: 1px solid yellow;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
    }
    h1.partnum{
        line-height:80px;
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